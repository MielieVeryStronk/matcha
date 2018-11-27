<?php
session_start();
require("utils/redirect.php");
require("utils/database.php");
include_once("header.php");
include_once("stylesheets.php");

if (isset($_POST['imageValue']) && !isset($_POST['notUpload']))
{
    $preview = preg_replace('/^data:image\/[a-z]+;base64,/','',$_POST['imageValue']);
    $query = "INSERT INTO edit (img_name, img_src, img_user, img_sticker) VALUES (?, ?, ?, ?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['name', $preview, 'name', '0']);
} elseif (!isset($_POST['notUpload'])) {
    $numOfSticker = $_GET['sticker'];
    $query = "SELECT * FROM edit WHERE img_sticker=?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$numOfSticker]);
    $result = $stmt->fetch();
    $preview = $result['img_src'];
} else {
    $preview = $_POST['imageValue'];
}
    $query = "SELECT * FROM edit";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
<title>Edit Photo</title>
<body class="w3-theme-l5">
<div class="w3-container w3-content" style="max-width:1400px;margin-top:150px">
    <div class="w3-col m7">
        <div class="w3-container w3-card w3-white w3-round w3-margin w3-padding">
		<img class="preview" style="margin:5px" id="preview" src="data:image/png;base64,<?php echo $preview ?>" height="240" alt="Image preview...">
        <form id="stickerForm" class="w3-form" action="utils/edit.php" method="POST">
        <div class="w3-container w3-card w3-white w3-round w3-margin w3-padding">
            <img src="resources/stickers/doge.png" class="sticker-item" onclick="addSticker('../resources/stickers/doge.png')">
            <img src="resources/stickers/grumpy.png" class="sticker-item" onclick="addSticker('../resources/stickers/grumpy.png')">
            <img src="resources/stickers/mj.png" class="sticker-item" onclick="addSticker('../resources/stickers/mj.png')">
            <img src="resources/stickers/pepe.png" class="sticker-item" onclick="addSticker('../resources/stickers/pepe.png')">
            <img src="resources/stickers/rollsafe.png" class="sticker-item" onclick="addSticker('../resources/stickers/rollsafe.png')">
            <img src="resources/stickers/salt.png" class="sticker-item" onclick="addSticker('../resources/stickers/salt.png')">
        </div>
            <input type="hidden" id="stickerPath" name="stickerPath" value=""/>
            <input type="hidden" id="stickerNum" name="stickerNum" value="<?php echo $_GET['sticker']?>"/>
            <input type="hidden" id="baseImage" name="baseImage" value=""/>
        </form>
        <form action="utils/upload.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="baseImageTwo" name="imageValue" value=""/>
        <?php if ($_GET['sticker'] > 0) { ?>
		    <button type="submit" name="submit" value="submit" id="confirmBtn" class="w3-button w3-theme-d2 w3-margin-bottom confirm-btn"><i class="fa fa-check"></i>  Confirm</button> 
        <?php } ?>
        </form>
        </div>
        <?php
            foreach($result as $edit)
            {
                echo '<form id="editForm'.$edit["img_id"].'" action="edit.php" method="POST">
		            <input type="hidden" id="editValue" name="imageValue" value="'.$edit["img_src"].'"/>
		            <input type="hidden" id="editValue" name="notUpload" value="true"/>
                    <img class="w3-margin" width="140" src=data:image/png;base64,'.$edit["img_src"].' class="sticker-item" onclick="editPrev('.$edit["img_id"].')")>
                    </form>';
            }
        ?>
    </div>
</div>

<script>
    document.getElementById('baseImageTwo').value = document.getElementById('preview').src;
function addSticker(sticker) {
    document.getElementById('stickerPath').value = sticker;
    document.getElementById('baseImage').value = document.getElementById('preview').src;
    document.getElementById('stickerForm').submit();
}

function editPrev(pic) {
    document.getElementById('editForm' + pic).submit();
}
</script>

</body>