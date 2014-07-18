<?php
/*
	@Author : Vitor Pêgas
	@Date : 30-06-2014
*/

/*
	This is the main configuration file.
	It can handle some globals and it will setup our connections and functions.
	This page is included in all other pages.
*/
session_start();
ob_start();
	
	//include Database Configuration by Alain Bertrand (a_bertrand)
	include_once "dbClass.php";
	//Initiate a Database Connection
	
	$DB_HOST = "localhost";	//Host
	$DB_USER = "root";		//Username
	$DB_PASS = "";			//Password
	$DB_NAME = "bsblog";		//DB Name
	
	
	/*
	$DB_HOST = "localhost";	//Host
	$DB_USER = "";		//Username
	$DB_PASS = "";			//Password
	$DB_NAME = "";		//DB Name
	*/
	
	$db = new Database($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);		//$db will be our database connection.
	$config = $db->LoadData("SELECT * FROM `config`");
	
	
	//Main Config	
	$SITE_NAME = $config["site_name"];
	$SITE_ROOT = "http://127.0.0.1/bsblog/";
	$MAX_SIZE = 5097152;		//2MB
	$ALLOWED = array('jpg', 'png', 'gif');
	$RESULTS_LIMIT = $config["results_limit"];
	$CONTACT_MAIL = $config["contact_mail"];
	
	//include Global Functions
	include_once "functions.php";
	
	if(isset($_GET["page"]))
	{
		if(is_numeric($_GET["page"]))
			$pages = Escape($_GET["page"]);
		else
			Redirect(basename($_SERVER['PHP_SELF']));
	}
	else
	{
		$pages = 1;
	}	
?>