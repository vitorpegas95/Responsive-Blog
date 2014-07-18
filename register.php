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
					if($action == Hash512("Username in use!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>That Username is already being used by other user. Please try a different one.</h1>
						</div>";
					}
					else if($action == Hash512("Email in use!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>That Email is already being used by other user. Please try a different one.</h1>
						</div>";
					}
					else if($action == Hash512("Some error!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>There was an unknown error. The registration is temporarily closed. Please try again later.</h1>
						</div>";
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
							<h3>Register</h3>
							<form class="form-horizontal" method="POST" action="config/auth.php">
							
								<div class="form-group">
									<label for="name" class="col-lg-2 control-label">Name</label>
									<div class="col-lg-10">
										<input type="text" autocomplete="off" required name="name" class="form-control" id="name" placeholder="Your Name" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="username" class="col-lg-2 control-label">Username</label>
									<div class="col-lg-10">
										<input type="text" autocomplete="off" required name="username" class="form-control" id="username" placeholder="Your desired Username (for login)" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="password" class="col-lg-2 control-label">Password</label>
									<div class="col-lg-10">
										<input type="password" autocomplete="off" required name="password" class="form-control" id="password" placeholder="Your password" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="email" class="col-lg-2 control-label">Email</label>
									<div class="col-lg-10">
										<input type="email" autocomplete="off" required name="email" class="form-control" id="email" placeholder="Your email" />
									</div>
								</div>
							
								<input type="submit" class="btn btn-success pull-right" name="register" value="Register" />
							
							</form>
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
	
	</body>
</html>