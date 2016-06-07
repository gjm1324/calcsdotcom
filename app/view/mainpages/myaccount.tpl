<!-- Edit Account Form -->

<form id="signupForm" action="<?=BASE_URL?>/user/update" method="post">
	<div class="form-group col-sm-6 col-md-4 col-lg-3">
		<h3>Signup Form</h3>
		<label for="displayname">Display Name</label>
		<input class="form-control" type="text" name="displayname" value="<?php echo $user->get('displayname');?>">
		<label for="signupEmail">Email</label>
		<input class="form-control" type="email" name="email" value="<?php echo $user->get('email');?>">
		<label for="oldpassword">Password</label>
		<input class="form-control" type="password" name="oldpassword" value="">
		<label for="password">Password</label>
		<input class="form-control" type="password" name="password" value="">
		<label for="password2">Retype Password</label>
		<input class="form-control" type="password" name="password2" value="">
		<button type="submit" class="btn btn-default">Sign Up</button>
	</div>
</form>