<title>Signup</title>
<?php
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/signup.php" method="POST">
			<input type="text" name="username" placeholder="username" required>
			<?php
			if ($_GET['signup'] == 'invalid')
			{
				echo '<p class="signup-err w3-text-theme">Username can only contain letters.</p>';
			}
			elseif ($_GET['signup'] == 'usertaken')
			{
				echo '<p class="signup-err w3-text-theme">Username / email taken.</p>';
			}
			?>
			<input type="email" name="email" placeholder="e-mail" required>
			<input type="password" name="pwd" placeholder="password" required>
			<input type="password" name="pwdConfirm" placeholder="confirm password" required>
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
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>