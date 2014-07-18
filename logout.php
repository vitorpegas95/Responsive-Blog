<?php
	include "config/config.php";
	session_destroy();
	unset($_SESSION["username"]);
	Redirect("index.php");
?>	