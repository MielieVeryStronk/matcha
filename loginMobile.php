<title>Login</title>
<?php
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 border border-dark rounded mt-5 mw-100" style="max-width: 600px">
	<div class="main-wrapper">
	<h2>Login</h2>
<form action="utils/login.php" method="POST">
  <div class="form-group text-left">
    <label for="userBox">Username</label>
    <input type="text" class="form-control" name="username" id="userBox" aria-describedby="emailHelp" placeholder="Enter username" required>
  </div>
  <div class="form-group text-left">
    <label for="passBox">Password</label>
    <input type="password" class="form-control" name="pwd" id="passBox" placeholder="Password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>