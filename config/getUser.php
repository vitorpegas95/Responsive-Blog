<?php
	require_once "config.php";
		
	$request = Escape($_REQUEST["user"]);
	$delete = Escape($_GET["del"]);
	$html = "";
	
	if($delete == 1)
		$show_details = false;
	else
		$show_details = true;
	
	$u = GetUserDetails($request);
	
	
	if($u["username"] == $request)
	{
		$name = $u["name"];
		$password = $u["password"];
		$email = $u["email"];
		$rights = $u["rights"];
		
		if($show_details)
		{
			$html = '
				<div class="form-group">
					<label for="name" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" autocomplete="off" required name="name" class="form-control" id="name" value="' . $name . '" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="col-lg-2 control-label">Password <small>Leave the current password if not changing.</small></label>
					<div class="col-lg-10">
						<input type="password" required name="password" class="form-control" id="password" value="' . $password . '" autocomplete="off" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="email" autocomplete="off" required name="email" class="form-control" id="email" value="' . $email .'" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="rights" class="col-lg-2 control-label">Rights <small>0-Normal / 1-Admin</small></label>
					<div class="col-lg-10">
						<input type="rights" autocomplete="off" required name="rights" class="form-control" id="rights" value="'.$rights.'" />
					</div>
				</div>
			';
			echo $html;
		}
		else
		{
			echo "User <b>" . $_REQUEST["user"] . "</b> was found! Are you sure you want to delete?";
			echo '<input type="submit" class="btn btn-success pull-right" name="delete_user" value="Delete" />';
		}
	}
	else
	{
		echo "No user found with username: " . $_REQUEST["user"];
	}
?>