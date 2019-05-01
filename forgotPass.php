<title>Forgot Password</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 border border-dark rounded" style="max-width: 600px">
	<div class="main-wrapper">
		<h2>Reset Password</h2>
		<form action="utils/forgotPass.php" method="POST">
			<div class="form-group text-left">
				<input class="form-control" type="email" name="email" placeholder="email" required>
			</div>
				<button class="btn btn-primary" type="submit" name="submit">Reset Password</button>
		</form>
	</div>
</section>
</body>