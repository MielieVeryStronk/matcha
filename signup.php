<title>Signup</title>
<?php
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 border border-dark rounded" style="max-width: 600px">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form action="utils/signup.php" method="POST">
		<div class="form-group text-left">
			<label for="userBox">First Name</label>
			<input type="text" class="form-control" name="first" id="userBox" aria-describedby="userHelp" placeholder="First Name" required>
		</div>
		<div class="form-group text-left">
			<label for="userBox">Last Name</label>
			<input type="text" class="form-control" name="last" id="userBox" aria-describedby="userHelp" placeholder="Last Name" required>
		</div>
		<div class="form-group text-left">
			<label for="userBox">Username</label>
			<input type="text" class="form-control" name="username" id="userBox" aria-describedby="userHelp" placeholder="Username" required>
		</div>
			<?php
			if ($_GET['signup'] == 'invalid')
			{
				echo '<p class="signup-err w3-text-theme">Names can only contain letters.</p>';
			}
			elseif ($_GET['signup'] == 'usertaken')
			{
				echo '<p class="signup-err w3-text-theme">Username / email taken.</p>';
			}
			?>
			<div class="form-group text-left">
				<label for="emailBox">E-mail</label>
				<input type="email" class="form-control" name="email" id="emailBox" aria-describedby="emailHelp" placeholder="E-mail" required>
			</div>
			<div class="form-group text-left">
				<label for="passBox">Password</label>
				<input type="password" class="form-control" name="pwd" id="passBox" aria-describedby="PassHelp" placeholder="Password" required>
			</div>
			<div class="form-group text-left">
				<label for="passConBox">Confirm Password</label>
				<input type="password" class="form-control" name="pwdConfirm" id="passConBox" aria-describedby="PassConHelp" placeholder="Confirm Password" required>
			</div>
			<?php
			if ($_GET['signup'] == 'pwdinvalid')
			{
				echo '<p class="signup-err w3-text-theme">Password must be at least 8 characters long and contain at least one number.</p>';
			}
			elseif ($_GET['signup'] == 'pwdmatch')
			{
				echo '<p class="signup-err w3-text-theme">Passwords do not match.</p>';
			}
			elseif ($_GET['signup'] == 'success')
			{
				echo '<p class="signup-err w3-text-theme">Signup successful, please check your emails to validate account.</p>';
			}
			?>
			<button class="btn btn-primary" type="submit" name="submit">Sign up</button>
			</div>
		</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>