<title>Change Email</title>
<?php
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 border border-dark rounded" style="max-width: 600px">
	<div class="main-wrapper">
		<h2>Change Email</h2>
		<form action="utils/changeEmail.php" method="POST">
			<div class="form-group text-left">
				<label for="emailBox">E-mail</label>
				<input type="email" class="form-control" name="newEmail" id="emailBox" aria-describedby="emailHelp" placeholder="E-mail" required>
			</div>
			<div class="form-group text-left">
				<label for="passBox">Password</label>
				<input type="password" class="form-control" name="pwd" id="passBox" aria-describedby="PassHelp" placeholder="Password" required>
			</div>
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
			<button class="btn btn-primary" type="submit" name="submit">Change Email</button>
		</form>
	</div>
</section>
</body>