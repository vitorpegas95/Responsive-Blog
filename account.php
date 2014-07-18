<?php require_once "config/config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bootstrap Blog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>
		
		
		<!-- Styles Import -->
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	
	<body>
		<?php include "header.php"; ?>
		
		<?php
			if(isset($_GET["action"]))
			{
				$action = Escape($_GET["action"]);
				if(strlen($action) == 128)
				{
					if($action == Hash512("Details Changed!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Your details were successfully changed!</h1>
						</div>";
						
						Redirect("account.php", 2);
					}
				}
			}
		?>
		
		<!-- Content -->
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-default">
						<div class="panel-body">
						<?php
							if(isset($_SESSION["username"]))
							{
								$user = GetUserDetails(Escape($_SESSION["username"]));
								
							}
							else
							{
								Redirect("login.php");
								exit();
							}
						?>
							<h3>Account <?php echo $user["name"]; ?></h3>
							
							<div class="row">
								<div class="col-lg-3">
									<a href="#" class="btn btn-primary" id="account_details">Change Account Details</a>
								</div>
								
								<div class="col-lg-3">
									<a href="#" class="btn btn-primary">Action #2</a>
								</div>
								
								<div class="col-lg-3">
									<a href="#" class="btn btn-primary">Action #3</a>
								</div>
								
								<div class="col-lg-3">
									<a href="#" class="btn btn-primary">Action #4</a>
								</div>
							</div>
							
							<div style="display: none; margin-top: 25px;" id="account_details_panel">
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Change Account Details</h4>
										<form class="form-horizontal" method="POST" action="config/change.php">
							
										<div class="form-group">
											<label for="name" class="col-lg-2 control-label">Name</label>
											<div class="col-lg-10">
												<input type="text" autocomplete="off" required name="name" class="form-control" id="name" value="<?php echo $user["name"]; ?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="username" class="col-lg-2 control-label">Username</label>
											<div class="col-lg-10">
												<input type="text" autocomplete="off" readonly required name="username" class="form-control" id="username" value="<?php echo $user["username"]; ?>"/>
											</div>
										</div>
										
										<div class="form-group">
											<label for="password" class="col-lg-2 control-label">Password</label>
											<div class="col-lg-10">
												<input type="password" required name="password" class="form-control" id="password" value="" autocomplete="off" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="email" class="col-lg-2 control-label">Email</label>
											<div class="col-lg-10">
												<input type="email" autocomplete="off" required name="email" class="form-control" id="email" value="<?php echo $user["email"]; ?>" />
											</div>
										</div>
									
										<input type="submit" class="btn btn-success pull-right" name="change_details" value="Change" />
									
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-3">
					<div class="list-group">
						<?php
							DisplayLatestSideBar();
						?>
					</div>
				</div>
			</div>
		</div>
		
		
		<?php include "footer.php"; ?>
		
		<?php include "contact.php"; ?>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/general.js"></script>
	
	</body>
</html>