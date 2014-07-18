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
							<h3>New Post</h3>
							<form class="form-horizontal" method="POST" action="config/create.php" autocomplete="off" enctype="multipart/form-data">
							
								<div class="form-group">
									<label for="title" class="col-lg-2 control-label">Title</label>
									<div class="col-lg-10">
										<input type="text" required name="title" class="form-control" id="title" placeholder="Article Title" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="image" class="col-lg-2 control-label">Image</label>
									<div class="col-lg-10">
										<input type="file" name="file" id="file" required />
									</div>
								</div>
							
								<div class="form-group">
									<label for="small" class="col-lg-2 control-label">Small Text</label>
									<div class="col-lg-10">
										<textarea name="small" required class="form-control" id="small" rows="8" placeholder="Small message as intro for your article."></textarea>
									</div>
								</div>
							
								<div class="form-group">
									<label for="message" class="col-lg-2 control-label">Message</label>
									<div class="col-lg-10">
										<textarea name="message" required class="form-control" id="message" rows="8" placeholder="Message, you can use HTML elements."></textarea>
									</div>
								</div>
							
								<input type="submit" class="btn btn-success pull-right" name="create_article" value="Post Article" />
							
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