<!-- FOOTER -->
<div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container">
		<p class="navbar-text pull-left">&copy; Vitor P&ecirc;gas 2014 - <a target="_blank" href="http://www.oryzhon.com/vitor">Vitor P&ecirc;gas</a></p>
	
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse2">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	
		<div class="collapse navbar-collapse navHeaderCollapse2">
			<?php
				if($config["facebook"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-primary pull-right">Facebook</a>';
				if($config["twitter"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-info pull-right">Twitter</a>';
				if($config["google"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-warning pull-right">Google+</a>';
				if($config["linkedin"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Linkedin</a>';
				if($config["instagram"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Instagram</a>';
				if($config["pinterest"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Pinterest</a>';
				if($config["tumblr"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Tumblr</a>';
				if($config["flickr"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Flickr</a>';
				if($config["myspace"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">MySpace</a>';
				if($config["askfm"] != null)
					echo '<a href="#" style="margin-right: 5px;" class="navbar-btn btn btn-default pull-right">Ask.fm</a>';
				
				
			?>
		</div>
	</div>
</div>
