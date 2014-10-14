<?php require_once "config/config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $SITE_NAME; ?></title>
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
					if($action == Hash512("Message Sent!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Message Sent! Thank you.</h1>
						</div>";
						
						Redirect("index.php", 2);
					}
					else if($action == Hash512("Wrong Info!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Your login information doesn't match with our records. Please try again.</h1>
						</div>";
						
						Redirect("login.php", 2);
					}
					else if($action == Hash512("Welcome Back!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Welcome back!</h1>
						</div>";
						
						Redirect("index.php", 2);
					}
					else if($action == Hash512("Success Registration!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Your account is now created!</h1>
						</div>";
						
						Redirect("index.php", 2);
					}
					else if($action == Hash512("Page not found!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>The requested page was not found! If you clicked a link inside our blog, please report the broken link using our contact form.</h1>
						</div>";
						
						Redirect("index.php", 4);
					}
					else if($action == Hash512("Article Created!"))
					{
						echo "<div class='container' style='margin-top: 100px;'>
							<h1>Your article was successfully created!</h1>
						</div>";
						
						Redirect("article.php", 1);
					}
					
					
				}
			}
		?>	
		
		<!-- Jumbotron -->
		<div class="container" style="margin-top: 100px;">
			<div class="jumbotron text-center">
				<h1><?php echo $config["site_welcome"]; ?></h1>
				<p><?php echo $config["site_slogan"]; ?></p>
			</div>
		</div>

		<!-- Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
			<?php
				$query = "SELECT * FROM `articles` ORDER BY `date` DESC";
				$result = $db->Execute($query);
				$num_rows = $result->NbRows;
				if($num_rows > 0)
				{
					if(($num_rows%$RESULTS_LIMIT)<>0)
						$pmax = floor($num_rows / $RESULTS_LIMIT) + 1;
					else
						$pmax = floor($num_rows / $RESULTS_LIMIT);
						
					
					$newResult = $db->Execute(($query . " LIMIT " . (($pages - 1) * $RESULTS_LIMIT) . ", ?"), $RESULTS_LIMIT);
					foreach($newResult as $article)
					{
						$id = $article["id"];
						$title = $article["title"];
						$date = $article["date"];
						$small = $article["small"];
						$img = $article["img"];
						
						
						echo '
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="page-header">
											<h3>' . $title . ' <small>Posted on ' . $date . '</small></h3>
										</div>
										
										
										<p>
											<img class="featuredImg" src="' . $img . '" width="20%" style="float:left; margin-right: 10px;"/>
											<p>' . $small . '
										</p>
										<a href="article.php?id=' . $id . '" class="btn btn-default pull-right">Read More</a>
									</div>
									
								</div>
							</div>
						</div>';
					}
					
					echo '<div class="container">';
					if($pages > 1)
						echo '<a class="btn btn-default" href="index.php?page=' . ($pages - 1) . '" title="Previous Page"> << </a>';
					else
						echo "";
						
					$pid = 1;
					while($pid <= $pmax)
					{
						$paging = "<a class='btn btn-default' href='index.php?page=" . $pid . "' title='Page " . $pid . " of " . $pmax . "'>" . $pid . "</a>";
						echo $paging;
						$pid ++;
					}
					
					if($pages < $pmax)
						echo "<a class='btn btn-default' href='index.php?page=" . ($pages+1) . "' title='Next Page'> >> </a>";
					else
						echo "";
						
					echo "<a class='btn btn-default' href='index.php?page=" . $pmax . "' title='Last Page'> Last </a>";
					
					echo '</div>';
				}
			?>
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