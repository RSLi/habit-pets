<div class="container">
	<h3>Fixed Nav Bar</h3>
	
	<h2>Sign up a New Account</h2>
	<p style="color: red"><?php if($has_error) echo $error_msg; ?></p>
	<?php echo form_open('signup'); ?>
	
	<h5>Email Address</h5>
	<input type="text" name="email" value="" 
		class="form-control" id="email" size="50" placeholder="Your Email Address"/>
	
	<h5>Username</h5>
	<input type="text" name="username" value=""
		class="form-control" id="username" size="50" placeholder="Name for display"/>
	
	<h5>Password</h5>
	<input type="password" name="password" value=""
		class="form-control" id="pwd" size="50" placeholder="Enter Password"/>
	
	<h5>Password Confirm</h5>
	<input type="password" name="passconf" value=""
		class="form-control" size="50" placeholder="Confirm Password"/>
	
	
	<button type="submit" class="btn btn-default">Sign up and agree to the terms below.</button>
	
	</form>
	
	<br>
	<small>By signing up, you agree to the <a>Terms of Service</a> and <a href="<?php echo site_url('privacy_policy')?>">Privacy Policy</a>.</small>
	
</div>
