<!-- Edit Account Form -->

<form id="signupForm" action="<?=BASE_URL?>/user/update" method="post">
	<div class="form-group col-sm-6 col-md-4 col-lg-3">
		<h3>My Account Edit Form</h3>
		<h4><?php if(isset($_GET['updated'])){echo 'Account Update Successful';}?></h2>
		<label for="displayname">Display Name</label>
		<input class="form-control check" type="text" name="displayname" value="<?php echo $user->get('displayname');?>">
		<label for="signupEmail">Email</label>
		<input class="form-control check" type="email" name="email" value="<?php echo $user->get('email');?>">
		<label for="oldpassword">Old Password</label>
		<input class="form-control check" type="password" name="oldpassword" value="">
		<label for="password">New Password</label>
		<input class="form-control check" type="password" name="password" value="">
		<label for="password2">Retype New Password</label>
		<input class="form-control check" type="password" name="password2" value="">
		<button type="submit" class="btn btn-default">Update</button>
	</div>
</form>