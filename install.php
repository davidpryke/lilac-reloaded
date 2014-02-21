<?php
/*
 Lilac - A Nagios Configuration Tool
Copyright (C) 2014 Rene Hadler
Copyright (C) 2007 Taylor Dondich

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Lilac Installer Script
 */
require_once('includes/init.inc.php');

// Check to see if we're being called from CLI mode, to check if we can run PHP scripts via cli
if(isset($argv) && sizeof($argv) > 0) {
	// We need to make sure we can do the things we need in CLI mode.
	$results = array();
	$results['mysql'] = extension_loaded("pdo_mysql");
	$results['json'] = function_exists("json_encode");
	$results['simplexml'] = function_exists("simplexml_load_file");
	$results['pcntl'] = function_exists("pcntl_fork");
	$results['xml'] = function_exists("xml_parse");

	// memory limit check
	$memoryLimit = ini_get("memory_limit");	

	// Default to true
	$results['memorylimit'] = true;
	// It's in bytes, unless it's using some shorthand.
	if(preg_match("/^(\d+)([a-zA-Z])$/", $memoryLimit, $matches)) {
		// Using shorthand, convert to bytes
		if($matches[2] == 'm' || $matches[2] == 'M') {
			// Megabytes
			$memorySize = (1048576 * $matches[1]);
		}
		else if($matches[2] == 'K' || $matches[2] == 'k') {
			$memorySize = (1024 * $matches[1]);
		}
		else if($matches[2] == 'g' || $matches[2] == 'G') {
			$memorySize = (1073741824 * $matches[1]);
		}
		else {
			// Unknown shorthand
			$results['memorylimit'] = false;
		}
	}
	else if($memoryLimit != "-1") {
		$memorySize = $memoryLimit;
	}
	if($memoryLimit != "-1" && $memorySize < 67108864) {
		// Memory set is less than 64megs.  This probably won't do.
		$results['memorylimit'] = false;
	}
	$results['memorysize'] = $memoryLimit;
	if(function_exists("json_encode")) {
		print(json_encode($results));
	}
	else {
		print("fail");
	}
	die();
}

if(!isset($_POST['stage'])) {
	$stage = "1";
}
else {
	$stage = $_POST['stage'];
}


if($stage == 2) {
	$error = false;
	if(!isset($_POST['mysqlRootUsername'])) {
		$mysqlRootUsername = 'root';
		$mysqlRootPassword = '';
		$mysqlHostname = 'localhost';
		$mysqlPort = '3306';
		$mysqlUsername = '';
		$mysqlPassword = '';
		$mysqlDatabase = 'lilac';
		$mysqlPopulate = true;
		$mysqlKeepDatabase = false;
		$mysqlCreateUserDatabase = false;
	}
	else {
		$mysqlRootUsername = trim($_POST['mysqlRootUsername']);
		$mysqlRootPassword = trim($_POST['mysqlRootPassword']);
		$mysqlHostname = trim($_POST['mysqlHostname']);
		$mysqlPort = trim($_POST['mysqlPort']);
		$mysqlUsername = trim($_POST['mysqlUsername']);
		$mysqlPassword = trim($_POST['mysqlPassword']);
		$mysqlDatabase = trim($_POST['mysqlDatabase']);
		$mysqlPopulate = (isset($_POST['mysqlPopulate'])) ? trim($_POST['mysqlPopulate']) : false;
		$mysqlKeepDatabase = (isset($_POST['mysqlKeepDatabase'])) ? trim($_POST['mysqlKeepDatabase']) : false;
		$timezone = trim($_POST['timezone']);
		
		if(isset($_POST['mysqlCreateUserDatabase'])) {
			$mysqlCreateUserDatabase = true;
		}
		else {
			$mysqlCreateUserDatabase = false;
		}
		// Check for required parameters
		if($mysqlCreateUserDatabase) {
			if(empty($mysqlRootUsername)) {
				$error = "MySQL Administrator username cannot be blank if you want to create user and database.";
			}
		}
		if(!$error) {
			if(empty($mysqlHostname)) {
				$error = "MySQL Hostname cannot be blank.";
			}
			else if(empty($mysqlPort)) {
				$error = "MySQL Port cannot be blank.";
			}
			else if(empty($mysqlUsername)) {
				$error = "MySQL Username cannot be blank.";
			}
			else if(empty($mysqlDatabase)) {
				$error = "MySQL Database cannot be blank.";
			}
		}
		
		if(!$error) {
			// Okay, breathe, we're going to do the grunt of the work now.
			// Check to see if we need to create the user and database
			if($mysqlCreateUserDatabase) {
				// Attempt to connect as admin
				$dbConn = @mysql_connect($mysqlHostname . ":" . $mysqlPort, $mysqlRootUsername, $mysqlRootPassword);
				if(!$dbConn) {
					$error = "Failed to connect to MySQL server with Administrator login.";
				}
				else {
					if(!mysql_select_db("mysql", $dbConn)) {
						$error = "Failed creating user and database.  Check your Admin credentials.  Error was: <em>" . mysql_error($dbConn) . "</em>";
					}
					else {
						// Create database
						if(!mysql_query("create database " . $mysqlDatabase, $dbConn)) {
							$error = "Failed to create database.  Error was: <em>" . mysql_error($dbConn) . "</em>";
						}
						else {
							// Okay, db is selected, let's grant privileges.
							//
							// NOTE TO SELF.  TICKET #10
							//
							// k
							if(in_array(strtolower($mysqlHostname), array('127.0.0.1', 'localhost'))) {
								// Assign rights to localhost
								if(!mysql_query("grant all privileges on " . $mysqlDatabase . ".* to '" . $mysqlUsername . "'@localhost identified by '" . $mysqlPassword . "'")) {
									$error = "Failed to create user.  Error was: <em>" . mysql_error($dbConn) . "</em>";
								}
							}
							else {
								// Assign rights via our hostname
								if(!mysql_query("grant all privileges on " . $mysqlDatabase . ".* to '" . $mysqlUsername . "'@'" . $_SERVER['SERVER_NAME'] . "' identified by '" . $mysqlPassword . "'")) {
									$error = "Failed to create user.  Error was: <em>" . mysql_error($dbConn) . "</em>";
								}
							}
							mysql_query("flush privileges");
						}
					}
				}
			}
			if(!$error && $mysqlPopulate) {
				// Okay, we need to populate the database.  Attempt to connect as our user.
				$dbConn = @mysql_connect($mysqlHostname . ":" . $mysqlPort, $mysqlUsername, $mysqlPassword);
				if(!$dbConn) {
					$error = "Failed to connect to MySQL server with " . $mysqlUsername . " user.";
				}
				else {
					// Select db.
					if(!mysql_select_db($mysqlDatabase, $dbConn)) {
						$error = "Failed to use " . $mysqlDatabase . " database.  Check your User credentials.  Error was: <em>" . mysql_error($dbConn) . "</em>";
					}
					else {
						// Load the data
						exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/schema.sql", $output, $retVal);
						if($retVal != 0) {
							$error = "Failed to import database schema. Make sure the mysql binary is in the search path for the web user.";
						}
						else {
							// Import labels
							exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/lilac-nagios-en-label.sql", $output, $retVal);
							if($retVal != 0) {
								$error = "Failed to import Nagios labels.  Error was: <br />" . str_replace("\n", "<br />", $output[count($output)]);
							}
							else {
								// Import Seed
								exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/seed.sql", $output, $retVal);
								if($retVal != 0) {
									$error = "Failed to import seed data.  Error was: <br />" . str_replace("\n", "<br />", $output[count($output)]);
								}
							}
						}
					}
				}
			}
			else if(!$error) {
				$dbConn = @mysql_connect($mysqlHostname . ":" . $mysqlPort, $mysqlUsername, $mysqlPassword);
				// Select db.
				if(!mysql_select_db($mysqlDatabase, $dbConn)) {
					$error = "Failed to use " . $mysqlDatabase . " database.  Check your User credentials.  Error was: <em>" . mysql_error($dbConn) . "</em>";
				}
				else if(!$mysqlKeepDatabase) {
					// Load the data
					exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/schema.sql", $output, $retVal);
					if($retVal != 0) {
						$error = "Failed to import database schema. Make sure the mysql binary is in the search path for the web user.";
					}
					else {
						// Import labels
						exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/lilac-nagios-en-label.sql", $output, $retVal);
						if($retVal != 0) {
							$error = "Failed to import Nagios labels.  Error was: <br />" . str_replace("\n", "<br />", $output[count($output)]);
						}
					}
				}
			}
			
			
			
			// Insert some basic SQL stuff
			if(!$error) {
				if(!mysql_select_db($mysqlDatabase, $dbConn)) {
					$error = "Failed to use " . $mysqlDatabase . " database.  Check your User credentials.  Error was: <em>" . mysql_error($dbConn) . "</em>";
				}
				else {
					// Insert Build number information
					mysql_query("INSERT INTO `lilac_configuration` (`key` , `value`) VALUES ('db_build', '" . LILAC_VERSION_BUILD . "');", $dbConn);
					
					exec("mysql -h " . $mysqlHostname . " -P " . $mysqlPort . " -u " . $mysqlUsername . " -p'" . $mysqlPassword . "' " . $mysqlDatabase . " < " . dirname(__FILE__) . "/sqldata/lilac-base.sql", $output, $retVal);
					if($retVal != 0) {
						$error = "Failed to import Nagios Base.  Error was: <br />" . str_replace("\n", "<br />", $output[count($output)]);
					}
				}
			}
			
			
			// Create PDO connection to perform upgrades
			try {
				$dbConn = new PDO("mysql:host=" . $mysqlHostname . ";port=" . $mysqlPort . ";dbname=" . $mysqlDatabase, $mysqlUsername, $mysqlPassword);
			} catch(PDOException $e) {
				$error = "Failed to connect to MySQL server with " . $mysqlUsername . " user:" . $e->getMessage();
			}

			if(!$error) {
				// Okay, write to the configuration file!
				$conf = file_get_contents(dirname(__FILE__) . "/includes/lilac-conf.php.dist");
				$conf = str_replace("%%DSN%%", "mysql:host=" . $mysqlHostname . ";port=" . $mysqlPort . ";dbname=" . $mysqlDatabase, $conf);
				$conf = str_replace("%%USERNAME%%", $mysqlUsername, $conf);
				$conf = str_replace("%%PASSWORD%%", $mysqlPassword, $conf);	
				$conf = str_replace("%%TIMEZONE%%", "date_default_timezone_set('" . $timezone . "');", $conf);			
				// We have the new conf
				$ret = file_put_contents(dirname(__FILE__) . "/includes/lilac-conf.php", $conf);
				if($ret == false) {
					$error = "Failed to write to includes/lilac-conf.php.  Check that the web user can write to the includes directory and try again.";
				}
				
				if(!$error)
					$success = "Completed Database Setup.";
			}
		}
	}
}

if(file_exists(dirname(__FILE__) . "/NOTICE")) {
	// Notice exists, we should display it here.
	$noticeContents = file_get_contents(dirname(__FILE__) . "/NOTICE");
	$warning = $noticeContents;
}

print_header("Installer");

if($stage == 1) {
	$fatalErrors = false;
	// Dependency checking
	print_window_header("Dependency Checks");
	?>
	<div class="notice">
	<strong>Note:</strong> Lilac supports Nagios 3.x only.  It is possible to import Nagios 2.x configuration files, but Lilac will only export to Nagios 3.x.
	</div>
	<div class="checks">
	<?php
	if(false === ($fp = @fopen(dirname(__FILE__) . "/includes/lilac-conf.php", "w+"))) {
		$fail = true;
	}
	else {
		$fail = false;
	}
	if($fp)
		fclose($fp);	
	?>	
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	Configuration File Writable
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		<p>The Lilac installer requires that it write to the configuration file at <em><?php echo dirname(__FILE__) . "/includes/lilac-conf.php";?></em>. It is 
	   recommended that you change the permissions of the includes directory so the web user can write to it. Following steps are possible:</p>
        <p>
           - Temporary set the file permission of directory <em><?php echo dirname(__FILE__) . "/includes";?></em> to 777. After installation set back to defaults.<br />
           - Temporary set the owner permission of directory <em><?php echo dirname(__FILE__) . "/includes";?></em> to the webserveruser. After installation set back to defaults.<br />
           - Create the file <em><?php echo dirname(__FILE__) . "/includes/lilac-conf.php";?></em> by yourself and change owner to webserveruser.<br />
        </p>
       </div>	
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
	
	<?php
	// PHP VERSION CHECK
	if(version_compare(PHP_VERSION, '5.2.0', '<') || !class_exists("DateTime")) {
		$fail = true;
	}
	else {
		$fail = false;
	}
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP Version 5.2 or Better
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP Version 5.2 or greater is required for Lilac.  Download the latest at <a href="http://www.php.net">The PHP Group's Website</a> or 
		check with your operating system distribution. (Version 5.2 also provides the class DateTime, which is also required).
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
	<?php
	$fail = get_magic_quotes_gpc();
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	Magic Quotes GPC Set to Disabled
	</div>
	<?php
	if($fail) {
		?>
			<div class="error">
			Magic Quotes GPC is set to enabled in your PHP configuration.  Lilac will not work with Magic Quotes GPC set to enabled.  Please disable it in your PHP configuration. Refer to <a href="http://www.php.net/manual/en/security.magicquotes.disabling.php">Disabling Magic Quotes</a> for more information.
			</div>
			<?php
	}
	if($fail) $fatalErrors = true;
	?>
	<?php
	// Pear Library Installed Check
	$fail = @include_once('PEAR.php');
	if($fail === false) {
		$fail = true;
	}
	else {
		$fail = false;
	}
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP Pear Library Installed
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's PEAR library must be loaded.  Please refer to <a href="http://pear.php.net">PHP's PEAR Homepage</a> for more information.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>

	<?php
	// PDO MYSQL Extension Installed Check
	$fail = !extension_loaded("pdo_mysql");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP PDO MySQL Extension Loaded
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's PDO MySQL extension must be loaded.  This is not the same as the MySQLi extension.  Please refer to <a href="http://us3.php.net/manual/en/ref.pdo.html">PHP's PDO documentation</a> for more information.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
	<?php
	// MySQL Executable Located
	exec("which mysql", $output, $retVal);
	if($retVal != 0) {
		$fail = true;
	}
	else {
		$fail = false;
	}
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	MySQL Client Executable
	</div>
	<?php
	if($fail) {
		?>
		<div class="notice">
		The Lilac installer needs the MySQL client binary to be installed and executable by the webserver if you need to populate the Lilac database.  Install the MySQL command line utility.
		</div>
		<?php
	}
	
	if($fail) $fatalErrors = true;
	?>
	<?php
	// Nmap Executable Located
	exec("which nmap", $output, $retVal);
	if($retVal != 0) {
		$fail = true;
	}
	else {
		$fail = false;
	}
	?>
	<div class="<?php if($fail) echo "warning"; else echo "success";?>">
	NMAP Executable
	</div>
	<?php
	if($fail) {
		?>
		<div class="notice">
		Not a fatal error, Lilac  needs the NMAP binary to be installed and executable by the webserver to perform auto-discovery tasks.  Install the NMAP command line utility. If you are not going to perform auto-discovery tasks, you can ignore this and continue.  If you choose to do auto-discovery tasks in the future, you must have NMAP installed.
		</div>
		<?php
	}	
	?>		
	<?php
	// Curl extension
	$fail = !function_exists("curl_init");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP Curl Support
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's Curl support is not available.  Curl is required for for Lilac to call internal webservices..  For more information, refer to <a href="http://www.php.net/manual/en/curl.setup.php">PHP'S Curl Extension setup guide</a> for more information on how to install it.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>

	<?php
	// SimpleXML extension
	$fail = !function_exists("simplexml_load_file");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP SimpleXML Support
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's SimpleXML support is not available.  SimpleXML is required for parsing XML documents and is used by Lilac's Autodiscovery system.  For more information, refer to <a href="http://www.php.net/manual/en/simplexml.setup.php">PHP'S SimpleXML Extension setup guide</a> for more information on how to install it.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
	<?php
	// PHP POSIX Functions Installed Check
	$fail = !function_exists("posix_getpid");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP POSIX Support
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's POSIX support is not available.  POSIX support is required for the importer/exporter/autodiscovery to function.  For instructions, refer to <a href="http://us3.php.net/manual/en/posix.setup.php">PHP's POSIX Extension setup guide</a> for more information on how to install it.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>

	<?php
	// PHP JSON Functions Installed Check
	$fail = !function_exists("json_encode");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP JSON Support
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's JSON support is not available.  JSON support is automatically provided in PHP 5.2.0.  For previous versions of PHP, refer to <a href="http://us3.php.net/manual/en/json.setup.php">PHP's JSON Extension setup guide</a> for more information on how to install it.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
    
	<?php
	// PHP XML Functions Installed Check
	$fail = !function_exists("xml_parse");
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP XML Support
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		PHP's XML support is not available. See <a href="http://www.php.net/manual/en/book.xml.php">XML Parser</a> how to enable it.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>
    
	<?php
	// Able to call PHP via command line
	$cliOutput = array();
	$retVal = '';
	$result = exec("php " . dirname(__FILE__) . "/install.php", $cliOutput, $retVal);
	$fail = $retVal != 0;
	
	?>
	<div class="<?php if($fail) echo "failure"; else echo "success";?>">
	PHP Command Line Interface (CLI) Available
	</div>
	<?php
	if($fail) {
		?>
		<div class="error">
		Lilac must be able to run command line PHP script to import and export configurations.  Please make sure PHP's command line interface 
		is installed and the PHP binary is in the search path for the web user.  Refer to <a href="http://www.php.net">The PHP Group's Homepage</a> for more information.
		</div>
		<?php
	}
	if($fail) $fatalErrors = true;
	?>		
	<div class="checks">
		<?php
		// CLI JSON Support
		$clisupport = @json_decode($cliOutput[0], true);
		
		if($clisupport === false) {
			$fail = true;
		}
		else {
			$fail = false;
		}			
		?>
		<div class="<?php if($fail) echo "failure"; else echo "success";?>">
		CLI JSON Support
		</div>
		<?php
		if($fail) {
			?>
			<div class="error">
			JSON Support must be provided to PHP's command line interface.  This is automatically provided in PHP 5.2.0 and above.  For previous versions of PHP, refer to <a href="http://us3.php.net/manual/en/json.setup.php">PHP's JSON Extension setup guide</a> for more information on how to install it.
			</div>
			<?php
		}
		if($fail) $fatalErrors = true;
		?>

		<?php
		// Memory Limit Check
		$fail = !$clisupport['memorylimit'];
		?>
		<div class="<?php if($fail) echo "warning"; else echo "success";?>">
		CLI Memory Limit For Scripts: <?php echo $clisupport['memorysize']; ?> 
		</div>
		<?php
		if($fail) {
			?>
			<div>
			Not Really an Error, but a note, PHP's Memory Limit for the command line scripts must be set to either -1 (Unlimited) or to a reasonable amount according to the size of your configuration.  Suggested amount is 64M.  Refer to <a href="http://www.php.net/manual/en/ini.core.php#ini.memory-limit">php.ini directives</a> for more information on how to change this value.
			</div>
			<?php
		}
		?>	
		<?php
		// CLI PCNTL Support
		$fail = !$clisupport['pcntl'];
		?>
		<div class="<?php if($fail) echo "failure"; else echo "success";?>">
		CLI Process Control Support
		</div>
		<?php
		if($fail) {
			?>
			<div class="error">
			PHP must have Process control compiled in in order to properly import/export and auto-discover.  For more information on how to install process control for PHP, refer to <a href="http://www.php.net/manual/en/pcntl.setup.php">PHP's PCNTL Installation documentation</a>.
			</div>
			<?php
		}
		if($fail) $fatalErrors = true;
		?>	

		<?php
		// CLI MySQL Support
		$fail = !$clisupport['mysql'];
		?>
		<div class="<?php if($fail) echo "failure"; else echo "success";?>">
		CLI PDO MySQL Support
		</div>
		<?php
		if($fail) {
			?>
			<div class="error">
			MySQL Support must be provided to PHP's command line interface.  This is not the same as the MySQLi extension.  Please refer to <a href="http://us3.php.net/manual/en/ref.pdo.html">PHP's PDO documentation</a> for more information.
			</div>
			<?php
		}
		if($fail) $fatalErrors = true;
		?>	
        
		<?php
		// CLI XML Support
		$fail = !$clisupport['xml'];
		?>
		<div class="<?php if($fail) echo "failure"; else echo "success";?>">
		CLI XML Support
		</div>
		<?php
		if($fail) {
			?>
			<div class="error">
			XML Support must be provided to PHP's command line interface.  See <a href="http://www.php.net/manual/en/book.xml.php">XML Parser</a> how to enable it.
			</div>
			<?php
		}
		if($fail) $fatalErrors = true;
		?>	

		<?php
		// SimpleXML extension
		$fail = !function_exists("simplexml_load_file");
		?>
		<div class="<?php if($fail) echo "failure"; else echo "success";?>">
		CLI SimpleXML Support
		</div>
		<?php
		if($fail) {
			?>
			<div class="error">
			PHP's SimpleXML support is not available for PHP's command line interface.  SimpleXML is required for parsing XML documents and is used by Lilac's Autodiscovery system.  For more information, refer to <a href="http://www.php.net/manual/en/simplexml.setup.php">PHP'S SimpleXML Extension setup guide</a> for more information on how to install it.
			</div>
			<?php
		}
		if($fail) $fatalErrors = true;
		?>
		</div>


	</div>	
	<?php
	if($fatalErrors) {
		?>
		<div class="error">
		You must resolve the issues above before continuing the installation.  <a href="install.php">Refresh The Page</a> to perform the checks again.
		</div>
		<?php
	}
	else {
		?>
		<form action="install.php" method="post">
		<input type="hidden" name="stage" value="2" />
		<input class="submit" type="submit" value="Continue To Configuration..." />
		</form>
		<?php
	}
	print_window_footer();
	
	?>
	<?php
}
else if($stage == 2 && empty($success)) {
	print_window_header("MySQL Database Setup");
	?>
	<script type="text/javascript">
			$(document).ready(function() {
			<?php
			if($mysqlCreateUserDatabase) {
				?>
				$("#createdb").attr("checked", true);
				$("#mysqladminform").css("display", "block");
				<?php
			}
			else {
				?>
				$("#createdb").attr("checked", false);
				<?php
			}
			?>
			// do stuff when DOM is ready
				$("#createdb").click(function(){
					if(this.checked) {
						$("#mysqladminform").show('fast');
					}
					else {
						$("#mysqladminform").hide('fast');
					}
					
				});
			});
	</script>
	
	Lilac needs credentials to connect to your MySQL server.  The user should have all privileges on the Lilac database (except for grant).  If 
	you do not know how to create a MySQL user and database, you can provide your MySQL root credentials to create the user and database.
	<form action="install.php" method="post">
		<input type="hidden" name="stage" value="2" />
		
        <p>
		   	<input type="checkbox" name="mysqlCreateUserDatabase" id="createdb"><label for="createdb">Create Database And User For Me</label>
		</p>
	<fieldset id="mysqladminform" style="display: none;">
		<legend>MySQL Administrator Credentials</legend>
		<p>
			<label for="mysqlRootUsername">Admin Username:</label> <input type="text" id="mysqlRootUsername" name="mysqlRootUsername" value="<?php echo $mysqlRootUsername;?>" />
		</p>
		<p>
			<label for="mysqlRootPassword">Admin Password:</label> <input type="password" id="mysqlRootPassword" name="mysqlRootPassword" value="<?php echo $mysqlRootPassword;?>" />
		</p>
	</fieldset>
	<fieldset id="mysqlform">
		<legend>MySQL Connection Information</legend>
		<p>
			<label for="mysqlHostname">Host/Port: </label><input type="text" id="mysqlHostname" name="mysqlHostname" value="<?php echo $mysqlHostname;?>" /> <input type="text" id="mysqlPort" name="mysqlPort" length="6" value="<?php echo $mysqlPort;?>" style="width: 80px;" />
		</p>
		<p>
			<label for="mysqlUsername">Username: </label><input type="text" id="mysqlUsername" name="mysqlUsername" value="<?php echo $mysqlUsername;?>" />
		</p>
		<p>
			<label for="mysqlPassword">Password: </label><input type="password" id="mysqlPassword" name="mysqlPassword" value="<?php echo $mysqlPassword;?>" />
		</p>
		<p>
			<label for="mysqlDatabase">Database: </label><input type="text" id="mysqlDatabase" name="mysqlDatabase" value="<?php echo $mysqlDatabase;?>" />
		</p>
	</fieldset>
		<p>
		<input type="checkbox" <?php if($mysqlPopulate) echo "checked=\"checked\"" ;?> name="mysqlPopulate" id="populatedb"><label for="populatedb">Populate Database With Sample Data (Uncheck if you want to keep existing data or upgrading) <strong>Warning:</strong> This will remove any existing data!  You should back-up any existing data.</label><br>
		<input type="checkbox" <?php if($mysqlKeepDatabase) echo "checked=\"checked\"" ;?> name="mysqlKeepDatabase" id="keepdb"><label for="keepdb">Check if you want to keep your current database schema and data</label>
		</p>
        <p>
            <select id="timezone" name="timezone" style="margin-left: 20px; margin-right: 10px;">
                <?php
				$guessTimezone = date_default_timezone_get();
				
                $timezone_identifiers = DateTimeZone::listIdentifiers();
                $continent = "";
                foreach($timezone_identifiers as $value) {
                    if(preg_match( '/^(Africa|America|Antartica|Arctic|Asia|Atlantic|Australia|Europe|Indian|Pacific)\//', $value)) {
                        $ex = explode("/", $value); 
                        if($continent != $ex[0]) {
                            if($continent != "") echo '</optgroup>';
                            echo '<optgroup label="' . $ex[0] . '">';
                        }
               
                        $city = $ex[1];
                        $continent = $ex[0];
						
						if($value == $guessTimezone)
							echo '<option value="' . $value . '" selected>' . $city . '</option>';  
						else
                        	echo '<option value="' . $value . '">' . $city . '</option>';               
                    }
                }
                ?>
                </optgroup>
            </select>
            <label for="populatedb">Select your proper timezone (Guessed value: <?php echo $guessTimezone; ?>)</label>
        </p>
        <p style="margin-top: 10px;">
			<input class="submit"  type="submit" value="Continue" />
        </p>
	<?php
	print_window_footer();
}
else if($stage == 2 && $success) {
	// OMGZ!
	print_window_header("Installation Complete");
	?>
		<b>Congratulations!</b>
		<p style="margin: 15px;">
		Your lilac installation is now complete.  You should remove the <em>install.php</em> script as it is no longer needed.  You should also remove the write privileges to the <em>includes</em> directory if set.
		</p>
		
		<p style="margin: 15px;">
		<b>Important: </b> In almost all cases the next step is now to import your existing Nagios configuration, even if there is only the default configuration of Nagios set yet.<br>
		This will import important configuration settings of Nagios like default paths and parameters. Please click the following link to go to the "Import" site. 
		</p>
		
	<p>
	<a href="import.php">Import Nagios settings</a>
	</p>
	
		<p style="margin: 15px;">
		If you know what you doing you can skip the "Import" step and click the following link to go to the main site. You can import your configuration at any time later
		</p>

	<p>
	<a href="index.php">Launch Lilac Now</a>
	</p>
	<?php
	print_window_footer();
}

print_footer();


// Install utility functions

function print_window_header($title = null, $type = "top") {
	?>
	<div class="roundedcorner_lilac_box">
	   <div class="roundedcorner_lilac_top"><div></div></div>
	      <div class="roundedcorner_lilac_content">
	      <?php
	      if(!empty($title)) {
	      	?>
	      	<h2><?php echo $title;?></h2>
	      	<?php
	      }
	      ?>
			<div class="roundedcorner_inner_box">
			   <div class="roundedcorner_inner_top"><div></div></div>
			      <div class="roundedcorner_inner_content">
	      
	      
	      
	<?php
}

function print_window_footer() {
	?>
			      </div>
			   <div class="roundedcorner_inner_bottom"><div></div></div>
			</div>		
	
	      </div>
	   <div class="roundedcorner_lilac_bottom"><div></div></div>
	</div>	
	<?php
}
	

// Used if frames not used
function print_header($title = null) {
	global $success;
	global $error;
	global $warning;
	
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	    <title><?php echo LILAC_NAME . " "; echo LILAC_VERSION;?><?php if($title) print(" - " . $title);?></title>
	    <link rel="stylesheet" type="text/css" href="style/reset.css">	    
	    <link rel="stylesheet" type="text/css" href="style/lilac.css">
		<link rel="stylesheet" type="text/css" href="style/install.css">
	    <link rel="stylesheet" type="text/css" href="style/flexigrid.css">
	    <link rel="stylesheet" type="text/css" href="style/jquery.tooltip.css">
	 	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	 	<script type="text/javascript" src="js/jquery.tooltip.min.js"></script>
	 	<script type="text/javascript" src="js/jquery.timers.js"></script>
	 	<script type="text/javascript" src="js/flexigrid.js"></script>

	</head>	    
	
	
	<body>
	<script language="javascript">
	function form_element_switch(element, checkbox) {
		if(checkbox.checked) {
			element.readOnly = false;
			element.disabled = false;
		}
		else {
			element.readOnly = true;
			element.disabled = true;
		}
	}
		
	function confirmDelete() {
		return confirm("Do you really want to delete this Object?");
  }

	</script>

	<div id="header">
		<h1><div class="title"><?php echo LILAC_NAME; ?></div></h1>
	</div>
	<div id="main">
	<?php
	if(!empty($success) || !empty($error) || !empty($warning)) {
		?>
		<script type="text/javascript">
		 $(document).ready(function() {
			$("#statusmsg").show("slow").fadeIn("slow");
		 });		
		</script>
		<?php
	}
	if(!empty($success)) {
		// We want to show a success state.
		?>
		<div id="statusmsg" class="roundedcorner_success_box" style="display: none;">
		   <div class="roundedcorner_success_top"><div></div></div>
		      <div class="roundedcorner_success_content">
		      <?php echo $success; ?>
		      </div>
		   <div class="roundedcorner_success_bottom"><div></div></div>
		</div>	
		<?php
	}
	else if(!empty($error)) {
		// We want to show a error state.
		?>
		<div id="statusmsg" class="roundedcorner_error_box" style="display: none;">
		   <div class="roundedcorner_error_top"><div></div></div>
		      <div class="roundedcorner_error_content">
		      <?php echo $error; ?>
		      </div>
		   <div class="roundedcorner_error_bottom"><div></div></div>
		</div>	
		<?php
	}
	else if(!empty($warning)) {
		// We want to show a warning state.
		?>
		<div id="statusmsg" class="roundedcorner_warning_box" style="display: none;">
		   <div class="roundedcorner_warning_top"><div></div></div>
		      <div class="roundedcorner_warning_content">
		      <?php echo $warning; ?>
		      </div>
		   <div class="roundedcorner_warning_bottom"><div></div></div>
		</div>	
		<?php
	}

}

function print_footer() {
	global $output_config;
	?>
	</div>
	</body>
	</html>
	<?php
}
