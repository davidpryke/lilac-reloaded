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
 Filename: 54.php
Description:
The class definition and methods for the updateLilac class
*/

require_once "base_class.php";

class updateLilac extends updateBase
{
	private $ut_version = 54;
	
	public function getInfo()
	{
		return "updateLilac-class for updating lilac-reloaded to version " . $ut_version;
	}
	
	public function getUpdates()
	{
		$updates = array();
	
		$updates[] = "Updating configuration file lilac-conf.php to new format";
		$updates[] = "Updating database to new configuration store, adding new required fields";
	
		return $updates;
	}
	
	public function executeUpdate()
	{
		return;
	}
} 

?>