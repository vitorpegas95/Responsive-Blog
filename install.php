<?php
	require_once "config/dbClass.php";
	require_once "config/functions.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Blog Installation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>
		
		
		<!-- Styles Import -->
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	
	<body>
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<a href="install.php" class="navbar-brand">Installation</a>
			</div>
		</div>
		
		<!-- Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
						<?php
							if(isset($_POST["database_details"]))
							{
							
								echo '<div class="page-header">
									<h3>Blog Installation Step 2</h3>
								</div>';
								$DBhost = $_POST["host"];
								$DBname = $_POST["name"];
								$DBuser = $_POST["user"];
								$DBpassword = $_POST["password"];
								
								$db = new Database($DBhost, $DBuser, $DBpassword, $DBname);
								
								if(strlen($db->error) > 0)
									$error = (strpos($db->error, "Unknow") !== false);
								else
									$error = "Database already Exists!";
								
								if(!$error)
								{
									echo "<h4>There was an error with your connection. Please check your details and try again!</h4>";
									echo "<p>Error message: " . $db->error . "</p>";
									echo "<a href='install.php' class='btn btn-danger'>Try Again</a>";
									exit;
								}
								else
								{
									$conn = new mysqli($DBhost, $DBuser, $DBpassword);
									if(strlen($error) == 1)
									{
										//Create the Database
										$conn->query("CREATE DATABASE " . $DBname . ";");
										$conn->close();
										$db = new Database($DBhost, $DBuser, $DBpassword, $DBname);
									}
									
									$path_to_file = 'config/config.php';
									$file_contents = file_get_contents($path_to_file);
									$file_contents = str_replace("DATABASE_NAME", $DBname,$file_contents);
									file_put_contents($path_to_file,$file_contents);
									
									echo "<h4>Hurray you made it through!</h4>";
									echo "<p>The Database is now UP and running. Here is a list (for nerds) of the queries:</p>";
									echo "<ul>";
									echo "<li>Created Database: " . ((strlen($error) == 1) ? "true" : "false") . "</li>";
									echo "<li>Created Table `users` : true</li>";
									echo "<li>Created Table `config` : true</li>";
									echo "<li>Created Table `articles` : true</li>";
									echo "<li>Created Table `navbar` : true</li>";
									echo "<li>--------------</li>";
									echo "</ul>";
									
									echo "<p>Database stuff is now over. Now we need to fill it with your configurations.</p>";
									echo "<p>Please fill the next form with your desired configuration for your blog:</p>";
									
									?>
									
									<form class="form-horizontal" method="POST" action="install.php">
										
										<div class="form-group">
											<label for="blog-name" class="col-lg-2 control-label">Blog Name<br><small>The name for your blog.</small></label>
											<div class="col-lg-10">
												<input type="text" required name="name" class="form-control" id="blog-name" placeholder="My Blog" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-welcome" class="col-lg-2 control-label">Welcome Message<br><small>A welcome message for your readers.</small></label>
											<div class="col-lg-10">
												<input type="text" required name="welcome" class="form-control" id="blog-welcome" value="" placeholder="Welcome to My Blog!" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-slogan" class="col-lg-2 control-label">Blog Slogan<br><small>A short message to describe your blog, or a slogan.</small></label>
											<div class="col-lg-10">
												<input type="text" required name="slogan" class="form-control" id="blog-slogan" value="" placeholder="This is where i post stuff about me. This is my Blog!" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-results" class="col-lg-2 control-label">Results Limit<br><small>Amount of articles in one page. (You can leave default)</small></label>
											<div class="col-lg-10">
												<input type="text" required name="results" class="form-control" id="blog-results" value="15" placeholder="Articles per page (Ex: 15)" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-contact" class="col-lg-2 control-label">About you and/or Blog<br><small>Describe to your readers, you and your blog.</small></label>
											<div class="col-lg-10">
												<textarea name="about" required class="form-control" rows="8" placeholder="About you and/or your blog..."></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-contact" class="col-lg-2 control-label">Contact Email<br><small>Your email where all the contacts are going.</small></label>
											<div class="col-lg-10">
												<input type="email" required name="contact" class="form-control" id="blog-contact" value="" placeholder="contact@yoursite.com" />
											</div>
										</div>
										<hr>
										<h3>Social Networks</h3>
										<p>Now fill in with your social network websites (full URL with http://). Those you don't use, leave it blank</p>
										
										<div class="form-group">
											<label for="blog-facebook" class="col-lg-2 control-label">Facebook<br><small>Your facebook page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="facebook" class="form-control" id="blog-facebook" value="" placeholder="http://www.facebook.com/myfacebook" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-twitter" class="col-lg-2 control-label">Twiiter<br><small>Your Twitter page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="twitter" class="form-control" id="blog-twitter" value="" placeholder="http://www.twitter.com/mytwitter" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-google" class="col-lg-2 control-label">Google +<br><small>Your Google+ page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="google" class="form-control" id="blog-google" value="" placeholder="http://www.plus.google.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-linkedin" class="col-lg-2 control-label">Linkedin<br><small>Your linkedin page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="linkedin" class="form-control" id="blog-linkedin" value="" placeholder="http://www.linkedin.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-instagram" class="col-lg-2 control-label">Instagram<br><small>Your instagram page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="instagram" class="form-control" id="blog-instagram" value="" placeholder="http://www.instagram.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-pinterest" class="col-lg-2 control-label">Pinterest<br><small>Your pinterest page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="pinterest" class="form-control" id="blog-pinterest" value="" placeholder="http://www.pinterest.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-tumblr" class="col-lg-2 control-label">Tumblr<br><small>Your Tumblr page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="tumblr" class="form-control" id="blog-tumblr" value="" placeholder="http://www.tumblr.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-flickr" class="col-lg-2 control-label">Flickr<br><small>Your flickr page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="flickr" class="form-control" id="blog-flickr" value="" placeholder="http://www.flickr.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-myspace" class="col-lg-2 control-label">Myspace<br><small>Your myspace page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="myspace" class="form-control" id="blog-myspace" value="" placeholder="http://www.myspace.com/" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="blog-askfm" class="col-lg-2 control-label">Askfm<br><small>Your ask.fm page.</small></label>
											<div class="col-lg-10">
												<input type="url" name="askfm" class="form-control" id="blog-askfm" value="" placeholder="http://www.ask.fm/" />
											</div>
										</div>
										
										<input type="hidden" name="host" value="<?php echo $DBhost; ?>"/>
										<input type="hidden" name="name" value="<?php echo $DBname; ?>"/>
										<input type="hidden" name="user" value="<?php echo $DBuser; ?>"/>
										<input type="hidden" name="password" value="<?php echo $DBpassword; ?>"/>
										<input type="submit" class="btn btn-primary" name="initial_config" value="Next" />
									</form>
									<?php
								}
							}
							else if(isset($_POST["initial_config"]))
							{
								echo '<div class="page-header">
									<h3>Blog Installation Step 3</h3>
								</div>';
								
								echo "<h3>Almost there! Your blog is now filled with your details, but you still need to create your Admin account.</h3>";
								echo "<p>The Admin account will be used to manage your blog, post new articles, manage users in your blog, create pages, etc.</p>";
								
								$DBhost = $_POST["host"];
								$DBname = $_POST["name"];
								$DBuser = $_POST["user"];
								$DBpassword = $_POST["password"];
								
								$db = new Database($DBhost, $DBuser, $DBpassword, $DBname);
								
								if($db->error)
								{
									echo "<h3>Ops, it appears we have an error.</h3>";
									echo "<p>Error Message: " . $db->error ."</p>";
									echo "<a href='install.php' class='btn btn-danger'>Try Again</a>";
									exit;
								}
								else
								{
									$site_name = $_POST["name"];
									$site_welcome = $_POST["welcome"];
									$site_slogan = $_POST["slogan"];
									$results_limit = $_POST["results"];
									$contact_email = $_POST["contact"];
									$site_about = $_POST["about"];
									
									$facebook = $_POST["facebook"];
									$twitter = $_POST["twitter"];
									$google = $_POST["google"];
									$linkedin = $_POST["linkedin"];
									$instagram = $_POST["instagram"];
									$pinterest = $_POST["pinterest"];
									$tumblr = $_POST["tumblr"];
									$flickr = $_POST["flickr"];
									$myspace = $_POST["myspace"];
									$askfm = $_POST["askfm"];
									
									$db->Execute("INSERT INTO 
									`config`(`site_name`, `site_welcome`, `site_slogan`, `site_about`, `results_limit`, `contact_mail`, `facebook`, `twitter`, `google`, `linkedin`, `instagram`, `pinterest`, `tumblr`, `flickr`, `myspace`, `askfm`) 
									VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $site_name, $site_welcome, $site_slogan, $site_about, $results_limit, $contact_email, 
									$facebook, $twitter, $google, $linkedin, $instagram, $pinterest, $tumblr, $flickr, $myspace, $askfm);
									
									?>
									
									<form class="form-horizontal" method="POST" action="install.php">
										<div class="form-group">
											<label for="adm-name" class="col-lg-2 control-label">Admin Name<br><small>Your name.</small></label>
											<div class="col-lg-10">
												<input type="text" required name="name" class="form-control" id="adm-name" placeholder="My Name" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="adm-username" class="col-lg-2 control-label">Admin Username<br><small>The username you will use to login.</small></label>
											<div class="col-lg-10">
												<input type="text" required name="username" class="form-control" id="adm-username" placeholder="Username" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="adm-password" class="col-lg-2 control-label">Admin Password<br><small>Your password.</small></label>
											<div class="col-lg-10">
												<input type="password" required name="password" class="form-control" id="adm-password" placeholder="Choose a strong password!" />
											</div>
										</div>
										
										<div class="form-group">
											<label for="adm-email" class="col-lg-2 control-label">Admin Email<br><small>Your Email.</small></label>
											<div class="col-lg-10">
												<input type="email" required name="email" class="form-control" id="adm-email" placeholder="admin@yoursite.com" />
											</div>
										</div>
									
									
										<input type="hidden" name="host" value="<?php echo $DBhost; ?>"/>
										<input type="hidden" name="name" value="<?php echo $DBname; ?>"/>
										<input type="hidden" name="user" value="<?php echo $DBuser; ?>"/>
										<input type="hidden" name="password" value="<?php echo $DBpassword; ?>"/>
										<input type="submit" class="btn btn-primary" name="admin_details" value="Next" />
									</form>
									
									<?php
									
								}
								
							}
							else if(isset($_POST["admin_details"]))
							{
								echo '<div class="page-header">
									<h3>Success!</h3>
								</div>';
							
								$name = Escape($_POST["name"]);
								$username = Escape($_POST["username"]);
								$password = Hash512(Escape($_POST["password"]));
								$email = Escape($_POST["email"]);
								
								$DBhost = $_POST["host"];
								$DBname = $_POST["name"];
								$DBuser = $_POST["user"];
								$DBpassword = $_POST["password"];
								
								$db = new Database($DBhost, $DBuser, $DBpassword, $DBname);
								
								if($db->error)
								{
									echo "<h3>Ops, it appears we have an error.</h3>";
									echo "<p>Error Message: " . $db->error ."</p>";
									echo "<a href='install.php' class='btn btn-danger'>Try Again</a>";
									exit;
								}
								else
								{
									$db->Execute("INSERT INTO `users`(`username`, `name`, `email`, `password`, `rights`) VALUES (?,?,?,?,?)", $username, $name, $email, $password, 1);
									
									echo "<h3>SUCCESS! Your blog is now ready for you!</h3>";
									
									$my_file = 'install.php';
									//unlink($my_file);
									
									echo "<p>You can now visit your new blog.</p>";
									echo "<a href='index.php' class='btn btn-success'>Click Here to End the Installation</a>";
								}
							}
							else
							{
						?>
								<div class="page-header">
									<h3>Welcome to your blog installation!</h3>
								</div>
								
								<p>BsBlog is a free blog tool designed to be responsive, 
								using Bootstrap as framework and MySQL as Database driver 
								you can run your blog easily and get visits from Mobile, Desktop, Tablets 
								and all of sorts of devices, all this for <strong>free</strong>!</p>
								
								<p>To help you setup your blog, it's our install script that will ask you for the necessary details
								and it will do all the work! Please follow the instructions on this page to successfully install your blog!</p>
								
								<hr>
								
								<h3>Installing</h3>
								<p>The first step is done, you are on this page and this page will setup everything you need to move forward!</p>
								<p>Now you need to setup your Database Connection. To do so, all you have to do is provide the Database details in the following form:</p>
								
								<form class="form-horizontal" method="POST" action="install.php">
									<div class="form-group">
										<label for="db-host" class="col-lg-2 control-label">Database Host <br><small>If not sure, leave the default.</small></label>
										<div class="col-lg-10">
											<input type="text" required name="host" class="form-control" id="db-host" value="localhost" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="db-name" class="col-lg-2 control-label">Database Name <br><small>If not sure, leave the default.</small></label>
										<div class="col-lg-10">
											<input type="text" required name="name" class="form-control" id="db-name" value="bsblog" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="db-user" class="col-lg-2 control-label">Database Username <br><small>If not sure, leave the default.</small></label>
										<div class="col-lg-10">
											<input type="text" required name="user" class="form-control" id="db-user" value="root" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="db-password" class="col-lg-2 control-label">Database Password <br><small>If not sure, leave the default.</small></label>
										<div class="col-lg-10">
											<input type="text" name="password" class="form-control" id="db-password" value="" />
										</div>
									</div>
								
									<input type="submit" class="btn btn-primary" name="database_details" value="Next" />
								</form>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>