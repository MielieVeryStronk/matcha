<title>Change Email</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/changeEmail.php" method="POST">
			<input type="password" name="pwd" placeholder="password" required>
			<input type="email" name="newEmail" placeholder="new email" required>
            <?php
			if ($_GET['change'] == 'email')
			{
				echo '<p class="signup-err w3-text-theme">Email is invalid.</p>';
			}
			elseif ($_GET['change'] == 'pwdinvalid')
			{
				echo '<p class="signup-err w3-text-theme">Password is incorrect.</p>';
			}
			elseif ($_GET['change'] == 'usertaken')
			{
				echo '<p class="signup-err w3-text-theme">Email Taken.</p>';
			}
			elseif ($_GET['change'] == 'success')
			{
				echo '<p class="signup-err w3-text-theme">Email changed successfully, please verify your account again.</p>';
			}
			?>
			<button type="submit" name="submit">Change Email</button>
		</form>
	</div>
</section>
</body>