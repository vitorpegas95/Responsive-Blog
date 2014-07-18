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
							<?php
								if(isset($_GET["id"]))
								{
									if(is_numeric($_GET["id"]))
									{
										$id = Escape($_GET["id"]);
										$get = $db->LoadData("SELECT * FROM `articles` WHERE `id`=?", $id);
										if(isset($get["id"]))
										{
											$id = $get["id"];
											$title = $get["title"];
											$date = $get["date"];
											$small = $get["small"];
											$message = $get["message"];
											$img = $get["img"];
											
											?>
												<div class="page-header">
													<h3><?php echo $title . "&nbsp; <small>" . $date . "</small>"; ?></h3>
												</div>
												
												<img class="featuredImg" src="<?php echo $img; ?>" width="100%"/>
											<?php
											
												echo "<p>" . $message . "</p>";
										}
										else
										{
											?>
											<div class="page-header">
												<h3>Post Not Found</h3>
											</div>
											
											<img class="featuredImg" src="img/image.jpg" width="100%"/>
											
											<a href="index.php" class="btn btn-danger">Back to Blog</a>
											<?php
										}
									}
								}
								else
								{
									$last = $db->LoadData("SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 0,1");
									$id = $last["id"];
									$title = $last["title"];
									$date = $last["date"];
									$small = $last["small"];
									$message = $last["message"];
									$img = $last["img"];
									
									?>
										<div class="page-header">
											<h3><?php echo $title . "&nbsp; <small>" . $date . "</small>"; ?></h3>
										</div>
										
										<img class="featuredImg" src="<?php echo $img; ?>" width="100%"/>
									<?php
									
										echo "<p>" . $message . "</p>";
								}
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