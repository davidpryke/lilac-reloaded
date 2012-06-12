<?php

/*
 lilac-reloaded - A Nagios Configuration Tool
Copyright (C) 2012 Rene Hadler

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

/*
 Filename: update.php
Description:
The class definition for the lilacUpdate class
*/

require_once('init.inc.php');

class lilacUpdate
{
	private $updateScriptsDir = dirname(__FILE__) . "/../library/update/"
	private $updateSteps = array();
	
	public function __construct()
	{
		parseAvailableSteps();
	}

	public function getCurrentDBVersion()
	{
		if(!class_exists("LilacConfigurationQuery"))
			return 0;

		$lilacDbVersion = LilacConfigurationQuery::create()->findPk("db_build");

		return $lilacDbVersion->getValue();
	}

	public function getCurrentAPPVersion()
	{
		return LILAC_VERSION_BUILD;
	}
	
	public function getNextUpdateStep()
	{
		$currentVersion = getCurrentDBVersion();
		
		foreach($updateSteps as $step)
		{
			if(int($currentVersion) < int($step))
				return $step;
		}
			
		return -1;
	}
	
	private function &getUpdateObject()
	{
		$updateVersion = getNextUpdateStep();
		if($updateVersion == -1)
			return -1;
		
		require_once($updateScriptsDir . $updateVersion . ".php");
		
		$obj = new updateLilac();
		return $obj;
	}
	
	private function parseAvailableSteps()
	{
		while(false !== ($entry = readdir($updateScriptsDir))) 
		{
			$matches = array();
			if(preg_match("/^([0-9]{2,9}).php$/", $entry, $matches)) 
			{
				$updateSteps[] = $matches[1];
	        }
		}
		
		sort($updateSteps, SORT_NUMERIC);
	}
}

?>