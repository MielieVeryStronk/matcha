<?php
session_start();
?>
<title>Matcha</title>
<body class="w3-theme-d3 landing-back">

<!-- Navbar -->
<?php
	include_once 'stylesheets.php';
	include_once 'header.php';
?>



<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;height:100%">    
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
</footer>
 
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

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else { 
		x.className = x.className.replace(" w3-show", "");
	}
}

function goToFeed() {
	window.location = "feed.php"
}
</script>

</body>
