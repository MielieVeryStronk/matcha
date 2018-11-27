<title>Change Username</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/changeUser.php" method="POST">
			<input type="password" name="pwd" placeholder="password" required>
			<input type="text" name="newUser" placeholder="new username" required>
            <?php
			if ($_GET['change'] == 'invalid')
			{
				echo '<p class="signup-err w3-text-theme">Username can only contain letters.</p>';
			}
			elseif ($_GET['change'] == 'pwdinvalid')
			{
				echo '<p class="signup-err w3-text-theme">Password is incorrect.</p>';
			}
			elseif ($_GET['change'] == 'usertaken')
			{
				echo '<p class="signup-err w3-text-theme">Username Taken.</p>';
			}
			elseif ($_GET['change'] == 'success')
			{
				echo '<p class="signup-err w3-text-theme">Username changed successfully, username will change on next login.</p>';
			}
			?>
			<button type="submit" name="submit">Change Username</button>
		</form>
	</div>
</section>
</body>