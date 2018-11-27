<title>Change Password</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/changePass.php" method="POST">
			<input type="password" name="oldPwd" placeholder="old password" required>
			<input type="password" name="newPwd" placeholder="new password" required>
            <?php
			if ($_GET['change'] == 'pwdinvalid')
			{
				echo '<p class="signup-err w3-text-theme">Password must be at least 8 characters long and contain at least one number.</p>';
			}
			elseif ($_GET['change'] == 'oldinvalid')
			{
				echo '<p class="signup-err w3-text-theme">Old password is incorrect.</p>';
			}
			elseif ($_GET['change'] == 'success')
			{
				echo '<p class="signup-err w3-text-theme">Password changed successfully.</p>';
			}
			?>
			<button type="submit" name="submit">Change Password</button>
		</form>
	</div>
</section>
</body>