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
		
		<script>
			function getUser(str)
			{
				var xmlhttp;
				if (str.length==0)
				{ 
					return;
				}
				
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("containerDetails").innerHTML=xmlhttp.responseText;
					}
				}	
					xmlhttp.open("GET","config/getUser.php?del=0&user="+str,true);
					xmlhttp.send();
			}
			
			function deleteUser(str)
			{
				var xmlhttp;
				if (str.length==0)
				{ 
					return;
				}
				
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("deleteConfirm").innerHTML=xmlhttp.responseText;
					}
				}	
					xmlhttp.open("GET","config/getUser.php?del=1&user="+str,true);
					xmlhttp.send();
			}
		</script>
	</head>
	
	<body>
		<?php include "header.php"; ?>
		
		<?php
			if(isset($_SESSION["username"]))
			{
				$user = GetUserDetails(Escape($_SESSION["username"]));
				if($user["rights"] == 0)
				{
					Redirect("index.php?action=" . Hash512("Page not found!"));
				}
			}
			else
			{
				Redirect("index.php?action=" . Hash512("Page not found!"));
			}
		?>
		
		<?php
			if(isset($_GET["action"]))
			{
				$action = Escape($_GET["action"]);
				if(strlen($action) == 128)
				{
					if($action == Hash512("Details Changed!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>User details changed!</h1>
						</div>";
						
						Redirect("admin.php", 1);
					}
					else if($action == Hash512("Blog Config Edited!"))
					{	
						echo "<div class='container' style='margin-top: 100px;'>
									<h1>Blog Configuration changed!</h1>
							</div>";
						
						Redirect("admin.php", 1);
					}
					else if($action == Hash512("User Deleted!"))
					{	
						echo "<div class='container' style='margin-top: 100px;'>
									<h1>The user was deleted from the blog!</h1>
							</div>";
						
						Redirect("admin.php", 1);
					}
					else if($action == Hash512("Post Edited!"))
					{	
						echo "<div class='container' style='margin-top: 100px;'>
									<h1>Article edited!</h1>
							</div>";
						
						Redirect("admin.php", 1);
					}
					else if($action == Hash512("Post Deleted!"))
					{	
						echo "<div class='container' style='margin-top: 100px;'>
									<h1>Article Deleted!</h1>
							</div>";
						
						Redirect("admin.php", 1);
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
							<h3>Admin</h3>
							<?php
								if(isset($_POST["edit_post"]) || isset($_POST["delete_post"]))
								{
									$id = $_POST["id"];
									$article = $db->LoadData("SELECT * FROM `articles` WHERE `id`=?", $id);
									if(isset($_POST["edit_post"]))
									{
										?>
										<form class="form-horizontal" method="POST" action="config/create.php" autocomplete="off" required>
											<div class="form-group">
												<label for="title" class="col-lg-2 control-label">Title</label>
												<div class="col-lg-10">
													<input type="text" name="title" class="form-control" id="title" value="<?php echo $article["title"]; ?>" />
												</div>
											</div>
										
											<div class="form-group">
												<label for="small" class="col-lg-2 control-label">Small Text</label>
												<div class="col-lg-10">
													<textarea name="small" class="form-control" id="small" rows="8"><?php echo $article["small"]; ?></textarea>
												</div>
											</div>
										
											<div class="form-group">
												<label for="message" class="col-lg-2 control-label">Message</label>
												<div class="col-lg-10">
													<textarea name="message" class="form-control" id="message" rows="8"><?php echo $article["message"]; ?></textarea>
												</div>
											</div>
										
											<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
											<input type="submit" class="btn btn-success pull-right" name="edit_article" value="Edit Article" />
										
										</form>
										<?php
									}
									else
									{
										?>
										<form method="POST" action="config/create.php">
											<h4>Are you sure you want to delete '<?php echo $article["title"]; ?>'?</h4>
										
											<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
											<input type="submit" class="btn btn-success pull-right btn-lg" name="delete_article" value="Delete Article" />
											<a href="admin.php" class="btn btn-danger pull-left btn-lg">Go Back</a>
										</form>
										<?php
									}
								}
								else
								{
							?>
							<div class="row">
								<div class="col-lg-3">
									<center><a href="#" class="btn btn-primary" id="account_details">Change User Details</a></center>
								</div>
								
								<div class="col-lg-3">
									<center><a href="#" class="btn btn-primary" id="blog_config">Change Blog Config</a></center>
								</div>
								
								<div class="col-lg-3">
									<center><a href="#" class="btn btn-primary" id="delete_account">Delete Users</a></center>
								</div>
								
								<div class="col-lg-3">
									<center><a href="#" class="btn btn-primary" id="edit_posts">Edit Posts</a></center>
								</div>
							</div>
							
							<div style="display: none; margin-top: 25px;" id="edit_posts_panel">
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Edit Posts</h4>
										<table class="table">
											<tr>
												<td><b>#ID</b></td>
												<td><b>Title</b></td>
												<td><b>Date</b></td>
												<td><b>Options</b></td>
											</tr>
										</table>

										
											<div style="max-height: 400px; overflow: scroll;">
												<table class="table">
													
													<?php
														$posts = $db->Execute("SELECT * FROM `articles`");
														foreach($posts as $p)
														{
															$id = $p["id"];
															$title = $p["title"];
															$date = $p["date"];
															
															echo '<form method="POST" action="admin.php">
															<tr>
																<td>' . $id . '</td>
																<td>' . $title . '</td>
																<td>' . $date . '</td>
																<td>
																	<input type="hidden" name="id" value="'.$id.'">
																	<input type="submit" class="btn btn-default pull-left" name="edit_post" value="Edit"/>
																	<input type="submit" class="btn btn-default pull-right" name="delete_post" value="Delete"/>
																</td>
															</tr></form>
															';
														}
													?>
													
												</table>
											</div>
									</div>
								</div>
							</div>
							
							<div style="display: none; margin-top: 25px;" id="account_details_panel">
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Change Account Details</h4>
										<form class="form-horizontal" method="POST" action="config/change.php">
										
										<div class="form-group">
											<label for="username" class="col-lg-2 control-label">Username</label>
											<div class="col-lg-10">
												<input type="text" autocomplete="off" required name="username" onkeyup="getUser(this.value)" class="form-control" id="username" placeholder="Insert User username here..."/>
											</div>
										</div>
							
										<div id="containerDetails">
											
										</div>
									
										<input type="submit" class="btn btn-success pull-right" name="change_details_admin" value="Change" />
									
									</form>
									</div>
								</div>
							</div>
							
							<div style="display: none; margin-top: 25px;" id="delete_account_panel">
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Delete User</h4>
										<form class="form-horizontal" method="POST" action="config/change.php">
										
										<div class="form-group">
											<label for="username" class="col-lg-2 control-label">Username</label>
											<div class="col-lg-10">
												<input type="text" autocomplete="off" required name="username" onkeyup="deleteUser(this.value)" class="form-control" id="username" placeholder="Insert User username here..."/>
											</div>
										</div>
							
										<div id="deleteConfirm">
											
										</div>
									
									
									</form>
									</div>
								</div>
							</div>
							
							<div style="display: none; margin-top: 25px;" id="blog_config_panel">
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Change Blog Configuration</h4>
										<form class="form-horizontal" method="POST" action="config/change.php">
											<div class="form-group">
												<label for="blog-name" class="col-lg-2 control-label">Blog Name<br><small>The name for your blog.</small></label>
												<div class="col-lg-10">
													<input type="text" required name="name" class="form-control" id="blog-name" value="<?php echo $config["site_name"]; ?>" />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-welcome" class="col-lg-2 control-label">Welcome Message<br><small>A welcome message for your readers.</small></label>
												<div class="col-lg-10">
													<input type="text" required name="welcome" class="form-control" id="blog-welcome" value="<?php echo $config["site_welcome"]; ?>" />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-slogan" class="col-lg-2 control-label">Blog Slogan<br><small>A short message to describe your blog, or a slogan.</small></label>
												<div class="col-lg-10">
													<input type="text" required name="slogan" class="form-control" id="blog-slogan" value="<?php echo $config["site_slogan"]; ?>" />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-results" class="col-lg-2 control-label">Results Limit<br><small>Amount of articles in one page. (You can leave default)</small></label>
												<div class="col-lg-10">
													<input type="text" required name="results" class="form-control" id="blog-results" value="<?php echo $config["results_limit"]; ?>" />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-contact" class="col-lg-2 control-label">About you and/or Blog<br><small>Describe to your readers, you and your blog.</small></label>
												<div class="col-lg-10">
													<textarea name="about" required class="form-control" rows="8"><?php echo $config["site_about"]; ?></textarea>
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-contact" class="col-lg-2 control-label">Contact Email<br><small>Your email where all the contacts are going.</small></label>
												<div class="col-lg-10">
													<input type="email" required name="contact" class="form-control" id="blog-contact" value="<?php echo $config["contact_mail"]; ?>" />
												</div>
											</div>
											<hr>
											<h3>Social Networks</h3>
											<p>Now fill in with your social network websites (full URL with http://). Those you don't use, leave it blank</p>
											
											<div class="form-group">
												<label for="blog-facebook" class="col-lg-2 control-label">Facebook<br><small>Your facebook page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="facebook" class="form-control" id="blog-facebook" value="<?php echo $config["facebook"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-twitter" class="col-lg-2 control-label">Twiiter<br><small>Your Twitter page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="twitter" class="form-control" id="blog-twitter" value="<?php echo $config["twitter"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-google" class="col-lg-2 control-label">Google +<br><small>Your Google+ page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="google" class="form-control" id="blog-google" value="<?php echo $config["google"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-linkedin" class="col-lg-2 control-label">Linkedin<br><small>Your linkedin page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="linkedin" class="form-control" id="blog-linkedin" value="<?php echo $config["linkedin"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-instagram" class="col-lg-2 control-label">Instagram<br><small>Your instagram page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="instagram" class="form-control" id="blog-instagram" value="<?php echo $config["instagram"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-pinterest" class="col-lg-2 control-label">Pinterest<br><small>Your pinterest page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="pinterest" class="form-control" id="blog-pinterest" value="<?php echo $config["pinterest"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-tumblr" class="col-lg-2 control-label">Tumblr<br><small>Your Tumblr page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="tumblr" class="form-control" id="blog-tumblr" value="<?php echo $config["tumblr"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-flickr" class="col-lg-2 control-label">Flickr<br><small>Your flickr page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="flickr" class="form-control" id="blog-flickr" value="<?php echo $config["flickr"]; ?>"/>
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-myspace" class="col-lg-2 control-label">Myspace<br><small>Your myspace page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="myspace" class="form-control" id="blog-myspace" value="<?php echo $config["myspace"]; ?>"  />
												</div>
											</div>
											
											<div class="form-group">
												<label for="blog-askfm" class="col-lg-2 control-label">Askfm<br><small>Your ask.fm page.</small></label>
												<div class="col-lg-10">
													<input type="url" name="askfm" class="form-control" id="blog-askfm" value="<?php echo $config["askfm"]; ?>"  />
												</div>
											</div>
											
										<input type="submit" class="btn btn-success pull-right" name="change_blog_config" value="Change" />
									
									</form>
									</div>
								</div>
							</div>
							<?php
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
		<script src="js/general.js"></script>
	
	</body>
</html>