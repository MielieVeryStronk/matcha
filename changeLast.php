<title>Last Name</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 border border-dark rounded" style="max-width: 600px">
	<div class="main-wrapper">
		<h2>Last Name</h2>
		<form action="utils/changeLast.php" method="POST">
        <div class="form-group text-left">
				<label for="passBox">Password</label>
				<input type="password" class="form-control" name="pwd" id="passBox" aria-describedby="PassHelp" placeholder="Password" required>
			</div>
			<div class="form-group text-left">
				<label for="lastBox">New Last Name</label>
				<input type="text" class="form-control" name="newFirst" id="lastBox" aria-describedby="PassHelp" placeholder="New Last Name" required>
			</div>
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
			<button class="btn btn-primary" type="submit" name="submit">Change</button>
		</form>
	</div>
</section>
</body>