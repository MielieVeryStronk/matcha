<title>Profile</title>
<?php
echo '<body';
include_once 'stylesheets.php';
include_once 'header.php';
include_once 'utils/database.php';
$query = "SELECT * FROM users WHERE user_email=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['u_email']]);
$result = $stmt->fetch();
?>

<section class="container text-center w-75 mt-5 mb-5 border border-dark rounded pt-3" style="max-width: 600px">
	<h1>Profile</h1>
  <div class="main-wrapper">
    <?php if (isset($_GET['profile'])){ ?>
      <p style="color: red;">Profile is incomplete. You must fill all fields and have at least one profile image to start matching!</p>
     <?php }?>
		<form action="utils/profile.php" method="POST" enctype="multipart/form-data">
<!-- First Name -->
        <div class="form-group text-left">
            <label for="firstBox">First Name</label>
            <input type="text" class="form-control" name="first" id="firstBox" aria-describedby="PassHelp" value="<?php echo $result['user_first'] ?>" required>
        </div>
<!-- Last Name -->
        <div class="form-group text-left">
            <label for="lastBox">Last Name</label>
            <input type="text" class="form-control" name="last" id="lastBox" aria-describedby="PassHelp" value="<?php echo $result['user_last'] ?>" required>
        </div>
<!-- Username -->
        <div class="form-group text-left">
            <label for="passBox">Username</label>
            <input type="text" class="form-control" name="username" id="userBox" aria-describedby="PassHelp" value="<?php echo $result['user_name'] ?>" required>
        </div>
<br />

<!-- Location -->
<!-- <h4>Location:</h4>
        <div class="form-group text-left">
            <label for="passBox">Location</label>
            <input type="Location" class="form-control" name="username" id="userBox" aria-describedby="PassHelp" value="<?php echo $result['user_name'] ?>" required>
        </div>
<br /> -->

<!-- Sexual Preference -->
<div class="text-left">
<h4>Sexual Preference:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexpref" id="sexRadio0" value="0">
  <label class="file-label" for="sexRadio0">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexpref" id="sexRadio1" value="1">
  <label class="file-label" for="sexRadio1">
    Female
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexpref" id="sexRadio2" value="2">
  <label class="file-label" for="sexRadio2">
    Both
  </label>
</div>
</div>
<br />

<!-- Gender -->
<div class="text-left">
<h4>Gender:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="genderRadio0" value="0">
  <label class="file-label" for="sexRadio0">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="1">
  <label class="file-label" for="sexRadio1">
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
        <input class="form-control" type="date" name="birthDate" id="datePicker" max="<?php echo date('Y-m-d', $maxDate); ?>" value="<?php echo $result['user_birth'] ?>">
    </div>
</div>
<br />

<!-- Bio -->
<div class="text-left">
<h4>Bio: <p id="bioHead"></p></h4>
    <div class="input-group date">
        <textarea maxlength="240" class="form-control border rounded" name="bio"><?php echo $result['user_bio'] ?></textarea>
    </div>
</div>
<br />

<!-- Images -->
<div class="text-left w-100 container">
<h4>Images:</h4>
  <div class="row w-100 text-center">
  <div class="col-sm-12 imgUp">
    <label class="imgLabel1">
        <div class="imagePreview1" <?php if ($result['user_img1']) { echo 'style="background: url(data:image/png;base64,'.$result["user_img1"].'); background-size: cover;";'; } ?>></div>
				<input type="file" name="img1" class="uploadFile img" value="" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-8 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2" <?php if ($result['user_img2']) { echo 'style="background: url(data:image/png;base64,'.$result["user_img2"].'); background-size: cover;";'; } ?>></div>
				<input type="file" name="img2" class="uploadFile img" value="" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2" <?php if ($result['user_img3']) { echo 'style="background: url(data:image/png;base64,'.$result["user_img3"].'); background-size: cover;";'; } ?>></div>
				<input type="file" name="img3" class="uploadFile img" value="" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2" <?php if ($result['user_img4']) { echo 'style="background: url(data:image/png;base64,'.$result["user_img4"].'); background-size: cover;";'; } ?>></div>
				<input type="file" name="img4" class="uploadFile img" value="" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
  <div class="col-sm-3 imgUp">
    <label class="imgLabel2">
        <div class="imagePreview2" <?php if ($result['user_img5']) { echo 'style="background: url(data:image/png;base64,'.$result["user_img5"].'); background-size: cover;";'; } ?>></div>
				<input type="file" name="img5" class="uploadFile img" value="" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
  </div><!-- col-4 -->
 </div><!-- row -->
</div>

<!-- Tags -->

<div class="text-left w-100 container">
<h4>Tags: </h4>
<div class="tag-box border border-light rounded text-center" id="tagBox">
<?php
$query = "SELECT * FROM tags";
$stmt = $pdo->prepare($query);
$stmt->execute();
$tags = $stmt->fetchAll();
foreach($tags as $tag)
{
  echo ' <div class="btn btn-danger mt-1" id="tag'.$tag['tag_id'].'" onclick="addRemoveTag('.$tag['tag_id'].')">
  # 
  '.$tag['tag_name'].'
  </div>';
}
?>
</div>
<br />
<h4>Your Tags: </h4>
<div class="tag-box border border-light rounded text-center" id="yourTags">
<?php
foreach($tags as $tag)
{
  echo ' <div class="u-tag" id="uTag'.$tag['tag_id'].'" onclick="addRemoveTag('.$tag['tag_id'].')">
  # 
  '.$tag['tag_name'].'
  </div>';
}
?>
<!-- Hidden input for tags -->
<input type="hidden" id="tagInput" name="tags" value="<?php echo $result['user_tags'] ?>">
</div>
<div>

<!-- Submit -->
<div class="text-center">
  <input class="btn btn-outline-danger mt-3" type="submit" name="submit" value="Submit">
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

function addRemoveTag(id) {
  var tagInput = document.getElementById('tagInput');
  var arr = tagInput.value.split(",");
  console.log(arr);
  var find = arr.indexOf(id);
  if (find == -1) {
    // Add
    tagInput.value = tagInput.value + "," + id;
    document.getElementById('uTag' + id).style.display = "inline-block";
    document.getElementById("uTag" + id).className = "btn btn-danger mt-1";
    document.getElementById('tag' + id).style.display = "none";
  } else {
    // Remove
    tagInput.value.replace("," + id, "");
    document.getElementById('uTag' + id).style.display = "none";
    document.getElementById("uTag" + id).className = "u-tag";
    document.getElementById('tag' + id).style.display = "inline-block";
  }
}

var tagInput = document.getElementById('tagInput');
var arr = tagInput.value.split(",");
arr.forEach(displayTags);
function displayTags(id) {
  if (id) {
    document.getElementById('tag' + id).style.display = "none";
    document.getElementById("uTag" + id).className = "btn btn-danger mt-1";
    document.getElementById('uTag' + id).style.display = "inline-block";
  }
}

var sexPref = <?php echo $result['user_sex_pref'] ?>;
var genderPref = <?php echo $result['user_gender'] ?>;
document.getElementById("sexRadio" + sexPref).setAttribute("checked", "checked");
document.getElementById("genderRadio" + genderPref).setAttribute("checked", "checked");
</script>