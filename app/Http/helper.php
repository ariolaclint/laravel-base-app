<?php 
namespace App\Http;

class HelperClass
{
	public static function getRoleName($a)
	{
		$roleNames = array("R01" => "Super Admin", "R02" => "Church Admin", "R03" => "Staff", "R04" => "Priest");
		return $roleNames[$a];
	}
	
}