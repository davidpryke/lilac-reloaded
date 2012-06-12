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
 Filename: base_class.php
Description:
The class definition for the updateBase class and iupdateBase interface
*/

require_once(dirname(__FILE__) . '/../../includes/init.inc.php');

interface iupdateBase
{
	public function getInfo();
	public function getUpdates();
	public function executeUpdate();
}

class updateBase implements iupdateBase
{
	public function getInfo()
	{
		return "updateBase-class for lilac-reloaded";
	}
	
	public function getUpdates()
	{
		$updates = array();
		
		$updates[] = "updateBase-class has no updates";
		
		return $updates;
	}
	
	public function executeUpdate()
	{
		return;
	}
}

?>