<title>Login</title>
<?php
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Login</h2>
		<form class="signup-form" action="utils/login.php" method="POST">
			<input type="text" name="username" placeholder="username" required>
			<input type="password" name="pwd" placeholder="password" required>
			<button type="submit" name="submit">Login</button>
		</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>