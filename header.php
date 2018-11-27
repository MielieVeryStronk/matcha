<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bc2b2b;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>

<?php		
if (!isset($_SESSION['u_name'])) {
		echo '<a href="signup.php" class="nav-item nav-link text-light" title="Sign Up">Sign Up</a>
		<form class="form-inline my-2 my-lg-0" action="utils/login.php" method="POST">
		<input type="submit" class="btn btn-outline-light my-2 my-sm-0 mr-2" title="login" value="Login" name="submit">
		<input type="password" class="form-control mr-sm-2" title="password" value="" name="pwd" placeholder="Password" tabindex="2">
		<input type="text" class="form-control mr-sm-2" title="username" value="" name="username" placeholder="Username" tabindex="1">
		</form>
		<a href="forgotPass.php" class="nav-item nav-link text-light" title="Sign Up">Forgot Password?</a>';
}
else
{
		echo '<form action="utils/logout.php" method="POST">
				<button class="btn btn-outline-light my-2 my-sm-0" title="logout" value="Logout" name="submit">Logout</button>
			</form>';
		echo '<a href="account.php" class="nav-item" title="Sign Up">Logged in as : ';
		echo $_SESSION['u_name'];
		echo '</a><div class="w3-dropdown-hover w3-hide-small w3-right">
        <button class="w3-button w3-padding-small fa fa-user cam-usr-btn" title="Account Settings"></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="changePass.php" class="w3-bar-item w3-button">Change Password</a>
            <a href="changeUser.php" class="w3-bar-item w3-button">Change Username</a>
            <a href="changeEmail.php" class="w3-bar-item w3-button">Change e-mail</a>
            <a href="notifications.php" class="w3-bar-item w3-button">Notification Settings</a>
    </div>';
}

echo	'</div>
		</div>
		</nav>';
?>

<script>
// Accordion
function myFunction(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-theme-d1";
	} else { 
		x.className = x.className.replace("w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-theme-d1", "");
	}
}

function goToFeed() {
	window.location = "feed.php"
}
</script>