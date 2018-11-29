<title>Profile</title>
<?php
echo '<body';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 border border-dark rounded pt-3" style="max-width: 600px">
	<div class="main-wrapper">
		<form action="utils/profile.php" method="POST">
<!-- First Name -->
        <div class="form-group text-left">
            <label for="firstBox">First Name</label>
            <input type="text" class="form-control" name="newFirst" id="firstBox" aria-describedby="PassHelp" placeholder="First Name" required>
        </div>
<!-- Last Name -->
        <div class="form-group text-left">
            <label for="lastBox">Last Name</label>
            <input type="text" class="form-control" name="newFirst" id="lastBox" aria-describedby="PassHelp" placeholder="Last Name" required>
        </div>
<!-- Username -->
        <div class="form-group text-left">
            <label for="passBox">Username</label>
            <input type="text" class="form-control" name="newUser" id="userBox" aria-describedby="PassHelp" placeholder="Username" required>
        </div>
<br />

<!-- Sexual Preference -->
<div class="text-left">
<h4>Sexual Preference:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexRadio" id="sexRadio1" value="1">
  <label class="form-check-label" for="sexRadio1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexRadio" id="sexRadio2" value="2">
  <label class="form-check-label" for="sexRadio2">
    Female
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexRadio" id="sexRadio3" value="0">
  <label class="form-check-label" for="sexRadio3">
    Both
  </label>
</div>
</div>
<br />

<!-- Gender -->
<div class="text-left">
<h4>Gender:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genderRadio" id="genderRadio1" value="1">
  <label class="form-check-label" for="sexRadio1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genderRadio" id="genderRadio2" value="2">
  <label class="form-check-label" for="sexRadio2">
    Female
  </label>
</div>
</div>
<br />
<?php $minDate = strtotime(date('Y-m-d', time()).'-18 years'); ?>
<!-- Birthday -->
<div class="text-left">
<h4>Birth Date:</h4>
    <div class="input-group date">
        <input class="form-control" type="date" name="birthDate" id="datePicker" max="<?php echo date('Y-m-d', $minDate); ?>" value="">
    </div>
</div>
<br />

<!-- Bio -->
<div class="text-left">
<h4>Bio:</h4>
    <div class="input-group date">
        <textarea class="form-control border rounded" name="bio" id="bioText"></textarea>
    </div>
</div>


<!-- End Form -->
    </form>
	</div>
</section>
</body>