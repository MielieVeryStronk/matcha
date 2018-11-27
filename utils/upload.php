<?php
session_start();
require("redirect.php");

$user = $_SESSION['u_name'];
$target_file = addslashes(file_get_contents($_POST['imageValue']));
$filename = $user;
require('database.php');
$query = "DELETE FROM edit;";
$stmt = $pdo->prepare($query);
$stmt->execute();
if(isset($_POST["submit"])) {
    $query = "INSERT INTO img (img_name, img_src, img_user) VALUES ('$filename', '$target_file', '$user');";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    header("Location: ../feed.php");
}
?>