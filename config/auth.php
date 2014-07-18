<?php
	include "config.php";
	
	if(isset($_POST["login"]))
	{
		$username = Escape($_POST["username"]);
		$password = Escape($_POST["password"]);
		
		$password_h = Hash512($password);
		$getUser = $db->LoadData("SELECT * FROM `users` WHERE `username`=? AND `password`=?", $username, $password_h);
		
		if($getUser["username"] == $username)
		{
			$_SESSION["username"] = $username;
			Redirect("../index.php?action=" . Hash512("Welcome Back!"));
		}
		else
		{
			Redirect("../index.php?action=" . Hash512("Wrong Info!"));
		}
	}
	else if(isset($_POST["register"]))
	{
		$name = Escape($_POST["name"]);
		$username = Escape($_POST["username"]);
		$password = Hash512(Escape($_POST["password"]));
		$email = Escape($_POST["email"]);
		
		$isUser = $db->LoadData("SELECT * FROM `users` WHERE `username`=?", $username);
		if($isUser["username"] == $username)	//Username already exists
		{
			Redirect("../register.php?action=" . Hash512("Username in use!"));
		}
		else
		{
			$isUser = $db->LoadData("SELECT * FROM `users` WHERE `email`=?", $email);
			if($isUser["email"] == $email)	//Email already exists
			{
				Redirect("../register.php?action=" . Hash512("Email in use!"));
			}	
			else	//User is good to go
			{
				$reg = $db->Execute("INSERT INTO `users`(`username`, `name`, `email`, `password`) VALUES (?, ?, ?, ?)", $username, $name, $email, $password);
				if($reg)
				{
					$_SESSION["username"] = $username;
					Redirect("../index.php?action=" . Hash512("Success Registration!"));
					
				}
				else
				{
					Redirect("../register.php?action=" . Hash512("Some error!"));
				}
			}
		}
	}
	else
	{
		Redirect("../index.php");
	}
?>