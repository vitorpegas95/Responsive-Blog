<?php
require_once "config/config.php";

if(isset($_POST["contact"]))
{
	$name = Escape($_POST["name"]);
	$email = Escape($_POST["email"]);
	$message = nl2br(Escape($_POST["message"]));
	$message = "Message from: " . $name . " ( ".$email." )<br>" . $message;
	
	mail($config["contact_mail"], ("Message from " . $config["site_name"]), $message);
	
	Redirect("index.php?action=" . Hash512("Message Sent!"));
}
else
{
?>
<!-- MODAL -->
<div class="modal fade" id="contact" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<p>Contact me</p>
			</div>
			<form class="form-horizontal" method="POST" action="contact.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="contact-name" class="col-lg-2 control-label">Name</label>
						<div class="col-lg-10">
							<input type="text" required name="name" class="form-control" id="contact-name" placeholder="Your Name" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact-email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input type="email" required name="email" class="form-control" id="contact-email" placeholder="Your Email" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="contact-message" class="col-lg-2 control-label">Message</label>
						<div class="col-lg-10">
							<textarea name="message" required class="form-control" rows="8" placeholder="Your Message..."></textarea>
						</div> 
					</div>
				</div>
				
				<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<input type="submit" class="btn btn-primary" name="contact" value="Send" />
				</div>
			</form>
		</div>
	</div>
</div>
<?php
}
?>
