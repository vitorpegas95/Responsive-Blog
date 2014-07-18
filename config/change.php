<?php
	include "config.php";
	
	if(isset($_POST["change_details"]))
	{
		$name = Escape($_POST["name"]);
		$password = Escape($_POST["password"]);
		$email = Escape($_POST["email"]);
		$username = Escape($_POST["username"]);
		
		$password_h = Hash512($password);
		
		$db->Execute("UPDATE `users` SET `name`=?, `password`=?, `email`=? WHERE `username`=?", $name, $password_h, $email, $username);
		
		Redirect("../account.php?action=" . Hash512("Details Changed!"));
		
	}
	else if(isset($_POST["change_details_admin"]))
	{
		$name = Escape($_POST["name"]);
		$password = Escape($_POST["password"]);
		$email = Escape($_POST["email"]);
		$username = Escape($_POST["username"]);
		$rights = Escape($_POST["rights"]);
		
		
		if(strlen($password) != 128)
			$password = Hash512($password);
		
		$db->Execute("UPDATE `users` SET `name`=?, `password`=?, `email`=?, `rights`=? WHERE `username`=?", $name, $password, $email, $rights, $username);
		
		Redirect("../admin.php?action=" . Hash512("Details Changed!"));
	}
	else if(isset($_POST["change_blog_config"]))
	{
		$site_name = $_POST["name"];
		$site_welcome = $_POST["welcome"];
		$site_slogan = $_POST["slogan"];
		$results_limit = $_POST["results"];
		$contact_email = $_POST["contact"];
		$site_about = $_POST["about"];
		
		$facebook = $_POST["facebook"];
		$twitter = $_POST["twitter"];
		$google = $_POST["google"];
		$linkedin = $_POST["linkedin"];
		$instagram = $_POST["instagram"];
		$pinterest = $_POST["pinterest"];
		$tumblr = $_POST["tumblr"];
		$flickr = $_POST["flickr"];
		$myspace = $_POST["myspace"];
		$askfm = $_POST["askfm"];
		
		$db->Execute("UPDATE `config` SET `site_name`=?,`site_welcome`=?,`site_slogan`=?,`site_about`=?,`results_limit`=?,`contact_mail`=?,`facebook`=?,`twitter`=?,
		`google`=?,`linkedin`=?,`instagram`=?,`pinterest`=?,`tumblr`=?,`flickr`=?,`myspace`=?,`askfm`=? WHERE 1", 
		$site_name, $site_welcome, $site_slogan, $site_about, $results_limit, $contact_email, 
		$facebook, $twitter, $google, $linkedin, $instagram, $pinterest, $tumblr, $flickr, $myspace, $askfm);
		
		Redirect("../admin.php?action=" . Hash512("Blog Config Edited!"));
	}
	else if(isset($_POST["delete_user"]))
	{
		$username = Escape($_POST["username"]);
		
		$db->Execute("DELETE FROM `users` WHERE `username`=?", $username);
		
		Redirect("../admin.php?action=" . Hash512("User Deleted!"));
	}
	else
	{
		Redirect("../index.php");
	}
?>