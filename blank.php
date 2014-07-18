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
		
		<!-- Content -->
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3>About</h3>
							<?php
								echo $config["site_about"];
							?>
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