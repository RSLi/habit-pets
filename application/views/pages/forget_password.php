<br><br><br><br><br><br>
<div class="container">
	<p>If you forget your password, we can send you a new one through the email you use to log in. Type in your email below and check your email in several minutes. Also check the spam and ads boxes in case your email account automatically marked our email.</p>
	
	<form role="form" method="post" action="<?php echo site_url('users_main/forget_password')?>">
		<div class="form-group">
	      <label for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter email">
	    </div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>