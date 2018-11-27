<body>
<?php
session_start();
require("redirect.php");
require("database.php");

$num_sticker = $_POST['stickerNum'] + 1;

$sticker = imagecreatefrompng($_POST['stickerPath']);
$image = imagecreatefromstring(base64_decode(preg_replace('/^data:image\/[a-z]+;base64,/','',$_POST['baseImage'])));

$new = imagecreatetruecolor(120, 120);

imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
imagealphablending($new, false);
imagesavealpha($new, true);

imagecopyresampled($new, $sticker, 0, 0, 0, 0, 120, 120, 120, 120);

$sticker_w = imagesx($sticker);
$sticker_h = imagesy($sticker);

$dime_x = 0;
$dime_y = 0;

imagecopy($image, $sticker, $dime_x, $dime_y, 0, 0, $sticker_w, $sticker_h);
imagepng($image, 'save.png');
$upload = base64_encode(file_get_contents('save.png'));

$query = "INSERT INTO edit (img_name, img_src, img_user, img_sticker) VALUES (?, ?, ?, ?);";
$stmt = $pdo->prepare($query);
$stmt->execute(['name', $upload, 'name', $num_sticker]);
header("Location: ../edit.php?sticker=".$num_sticker);
exit();
?>
</body>