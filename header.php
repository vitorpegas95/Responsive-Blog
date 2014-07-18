<!-- fixed will be position: fixed -->
<!-- static will be position: absolute -->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		
		<!-- Logo -->
		<a href="index.php" class="navbar-brand"><?php echo $SITE_NAME; ?></a>
		
		<!-- Navigation -->
		<!-- Navigation Button for Mobile -->
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<!-- Navigation Menu -->
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav navbar-right">
				<?php
					$menu = $db->Execute("SELECT * FROM `navbar`");
					foreach($menu as $l)
					{
						$id = $l->id;
						$label = $l->label;
						$link = $l->link;
						$drop = $l->dropdown;
						
						if($link == "#" && $drop == 0)
						{
							echo '<li class="dropdown">';
							echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $label . '<b class="caret"></b></a>';
							echo '<ul class="dropdown-menu">';
							
							$dropdown = $db->Execute("SELECT * FROM `navbar` WHERE `dropdown`=?", $id);
							foreach($dropdown as $d)
							{
								echo '<li><a href="' . $d->link . '">' . $d->label . '</a></li>';
							}
							
							echo '</ul>
							</li>';
						}
						else if($drop == 0)
						{
							if (strpos($link, '#') !== FALSE && strlen($link) > 1) 
							{
								echo '<li><a href="' . $link . '" data-toggle="modal">' . $label . '</a></li>';
							}
							else
							{
								if($link == basename($_SERVER['PHP_SELF']))
								{
									echo '<li class="active"><a href="' . $link . '">' . $label . '</a></li>';
								}
								else
								{
									echo '<li><a href="' . $link . '">' . $label . '</a></li>';
								}
							}
						}
					}
					
					if(isset($_SESSION["username"]))
					{
						$getUserInfo = $db->LoadData("SELECT * FROM `users` WHERE `username`=?", Escape($_SESSION["username"]));
						if($getUserInfo["rights"] == 1)
						{
							echo "<li><a href='create.php'>New Post</a></li>";
							echo "<li><a href='admin.php'>Admin</a></li>";
						}
						
						echo "<li><a href='account.php'>" . $_SESSION["username"] . "</a></li>";
						echo "<li><a href='logout.php'>Logout</a></li>";
					}
					else
					{
						echo "<li><a href='login.php'>Login</a></li>";
						echo "<li><a href='register.php'>Register</a></li>";
					}
				?>
			</ul>
		</div>
	</div>
</div>