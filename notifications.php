<title>Change Notifications</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="utils/notifications.php" method="POST">
            <button type="submit" name="submit" value="true">Notifications On</button>
		</form>
		<form class="signup-form" action="utils/notifications.php" method="POST">
            <button type="submit" name="submit" value="false">Notifications Off</button>
		</form>
	</div>
</section>
</body>