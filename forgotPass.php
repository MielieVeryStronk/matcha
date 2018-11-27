<title>Forgot Password</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/forgotPass.php" method="POST">
			<input type="email" name="email" placeholder="email" required>
			<button type="submit" name="submit">Reset Password</button>
		</form>
	</div>
</section>
</body>