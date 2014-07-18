<?php
	require_once "config.php";
	if(isset($_POST["create_article"]))
	{
		$file = $_FILES["file"];
		$file_name = $file["name"];
		$file_tmp = $file["tmp_name"];
		$file_size = $file["size"];
		
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$file_is_good = false;
		
		if(in_array($file_ext, $ALLOWED))
		{
			if($file_size <= $MAX_SIZE)
			{
				$file_name_new = uniqid('picture', true);
				$file_destination = '../uploads/images/' . $file_name_new. '.' . $file_ext;
				$real_file_dest = 'uploads/images/' . $file_name_new. '.' . $file_ext;
				
				if(move_uploaded_file($file_tmp, $file_destination))
				{
					$file_is_good = true;
				}
				else
				{
					Debug("Error moving");
				}
			}
		}
		
		$title = Escape($_POST["title"]);
		$small = Escape($_POST["small"]);
		$message = nl2br($_POST["message"]);
		
		
		
		$db->Execute("INSERT INTO `articles`(`title`, `message`, `img`, `small`, `author`) VALUES (?,?,?,?,?)", $title, $message, $real_file_dest, $small, $_SESSION["username"]);
		
		Redirect("../index.php?action=" . Hash512("Article Created!"));
		
	}
	else if(isset($_POST["edit_article"]))
	{
		$id = $_POST["id"];
		$title = $_POST["title"];
		$small = $_POST["small"];
		$message = $_POST["message"];
		
		$db->Execute("UPDATE `articles` SET `title`=?,`message`=?,`small`=? WHERE `id`=?", $title, $message, $small, $id);
		Redirect("../admin.php?action=" . Hash512("Post Edited!"));
	}
	else if(isset($_POST["delete_article"]))
	{
		$id = $_POST["id"];
		$db->Execute("DELETE FROM `articles` WHERE `id`=?", $id);
		Redirect("../admin.php?action=" . Hash512("Post Deleted!"));
	}
	else
	{
		Redirect("../index.php?action=" . Hash512("Page not found!"));
	}
?>