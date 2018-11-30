<title>Profile</title>
<?php
echo '<body';
include_once 'stylesheets.php';
include_once 'header.php';
?>
<section class="container text-center w-75 mt-5 mb-5 border border-dark rounded pt-3" style="max-width: 600px">
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
  <label class="file-label" for="sexRadio1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexRadio" id="sexRadio2" value="2">
  <label class="file-label" for="sexRadio2">
    Female
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexRadio" id="sexRadio3" value="0">
  <label class="file-label" for="sexRadio3">
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
  <label class="file-label" for="sexRadio1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genderRadio" id="genderRadio2" value="2">
  <label class="file-label" for="sexRadio2">
    Female
  </label>
</div>
</div>
<br />
<?php $maxDate = strtotime(date('Y-m-d', time()).'-18 years'); ?>
<!-- Birthday -->
<div class="text-left">
<h4>Birth Date:</h4>
    <div class="input-group date">
        <input class="form-control" type="date" name="birthDate" id="datePicker" max="<?php echo date('Y-m-d', $maxDate); ?>" value="">
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
<br />

<!-- Images -->
<div class="text-left w-100 container">
<h4>Images:</h4>
  <div class="row w-100 text-center">
  <div class="col-sm-12 imgUp">
    <label class="imgLabel1">
        <div class="imagePreview1"></div>
				<input type="file" name="img1" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-8 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2"></div>
				<input type="file" name="img2" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2"></div>
				<input type="file" name="img3" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2"></div>
				<input type="file" name="img4" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2"></div>
				<input type="file" name="img5" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
 </div><!-- row -->
</div>




<!-- End Form -->
    </form>
	</div>
</section>
</body>

<script>
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview1').css("background-image", "url("+this.result+")");
uploadFile.closest(".imgUp").find('.imagePreview2').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script>