<!-- Signup Form -->

<form id="signupForm" action="<?=BASE_URL?>/user/signup" method="post">
	<div class="form-group col-sm-6 col-md-4 col-lg-3">
		<h3>Signup Form</h3>
		<label for="signupEmail">Email</label>
		<input class="form-control" type="email" name="email" placeholder="ex. math-is-life@calcs.com">
		<label for="signupPassword">Password</label>
		<input class="form-control" type="password" name="password" placeholder="ex. Password123!">
		<label for="signupPassword2">Retype Password</label>
		<input class="form-control" type="password" name="password2" placeholder="ex. Password123!">
		<label for="signupDisplayname">Display Name</label>
		<input class="form-control" type="text" name="displayname" placeholder="ex. John Smith">
		<button type="submit" class="btn btn-default">Sign Up</button>
	</div>
</form>