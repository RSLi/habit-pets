<?php
if(isset($_SESSION['uid']))
{
	redirect('users_main','refresh');
}
?>
<style>
#index-box {

}
#index-logo {
	background-color: #fff;
	background-image: url("/images/habitpets_logo.jpg");
	background-size: 75% auto;
	background-repeat: no-repeat;
	height: 400px;
}
</style>
<div class="container">
	<h3>Fixed Nav Bar</h3>
	<div class="row">
		<!--[if lt IE]>
			<div class="alert alert-danger">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Warning!</strong> This website does not support IE8 and older browsers. Chrome and other modern browsers are highly recommended
			  </div>
		<![endif]-->
	</div>
	<div class="row" id="index-box">
		<div id="index-logo" class="col-md-8"></div>

		<div class="col-md-4">
			<br /> <br /> <br />
			<h2>Log in</h2>
			<p style="color: red"><?php if($has_error) echo $error_msg; ?></p>
			<form role="form" method="post" action=<?php echo site_url('users_main/index')?>>
				<div class="form-group">
					<label for="email">Email:</label> <input type="email"
						name="email" value="" class="form-control" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label> <input type="password"
						name="password" class="form-control" id="pwd" placeholder="Enter password">
				</div>

				<button type="submit" class="btn btn-default">Log in</button>
			</form>
			<a href=<?php echo site_url('signup')?>>Sign up a new account</a>
		</div>


	</div>

	<hr>

</div>
