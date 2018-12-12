<?php
session_start();
require("redirect.php");
require('database.php');

if(isset($_POST["submit"])) {
    // Images
    $image1 = base64_encode(file_get_contents($_FILES['img1']['tmp_name']));
    $image2 = base64_encode(file_get_contents($_FILES['img2']['tmp_name']));
    $image3 = base64_encode(file_get_contents($_FILES['img3']['tmp_name']));
    $image4 = base64_encode(file_get_contents($_FILES['img4']['tmp_name']));
    $image5 = base64_encode(file_get_contents($_FILES['img5']['tmp_name']));

    // Profile Info
    try {
        $query = "UPDATE users SET user_first=?, user_last=?, user_name=?, user_sex_pref=?, user_gender=?, user_tags=?, user_birth=?, user_bio=?, user_img1=?, user_img2=?, user_img3=?, user_img4=?, user_img5=? WHERE user_name=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_POST['first'], $_POST['last'], $_POST['username'], $_POST['sexpref'], $_POST['gender'], $_POST['tags'], $_POST['birthDate'], $_POST['bio'], $image1, $image2, $image3, $image4, $image5, $_SESSION['u_name']]);
    } catch (PDOException $e) {
        die("table USERS create failure".$e->getMessage()."</br>");
    }
    header("Location: ../profile.php");
}
?>