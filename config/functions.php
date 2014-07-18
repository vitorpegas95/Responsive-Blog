<?php
/*
	Here we have some global functions that will be used through the website.
*/
	
	//Hash string with sha512
	function Hash512($string)
	{
		return hash("sha512", $string);
	}
	
	//Debug Output
	function DebugOutput($var)
	{
		echo '<pre>', print_r($var, true), '</pre>';
	}
	
	//XSS Security
	function Escape($t)
	{
		return htmlentities($t, ENT_QUOTES);
	}
	
	function Redirect($url, $time = 0)
	{
		echo "
			<div class='container'>
				<p>If your Browser doesn't redirect you. <a href='".$url."'>Click Here</a></p>
			</div>
		";
		echo '<meta HTTP-EQUIV="REFRESH" content="' . $time . '; url=' . $url . '">';
	}
	
	function Debug($dbgText)
	{
		echo "<p>[DEBUG] " . $dbgText . "</p>";
	}
	
	function DisplayLatestSideBar()
	{
		global $db;
		
		$query = "SELECT * FROM `articles` ORDER BY `date` DESC";
		$result = $db->Execute($query);
		
		$newResult = $db->Execute(($query . " LIMIT 0, 7"));
		foreach($newResult as $article)
		{
			$id = $article["id"];
			$title = $article["title"];
			$date = $article["date"];
			$small = substr($article["small"], 0, 100) . "...";
			$img = $article["img"];
			
			
			echo '
			<a href="article.php?id=' . $id . '" class="list-group-item" style="margin-bottom: 15px;">
				<h4 class="list-group-item-heading">' . $title . '</h4>
				<p class="list-group-item-text">' . $small . '</p>
			</a>
			';
		}
	}
	
	function GetUserDetails($username)
	{
		global $db;
		$user = $db->LoadData("SELECT * FROM `users` WHERE `username`=?", $username);
		return $user;
	}
?>