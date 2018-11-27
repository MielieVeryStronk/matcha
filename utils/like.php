<?php
session_start();
require("redirect.php");
require 'database.php';

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM likes WHERE lke_user=? AND lke_img=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
    $result = $stmt->fetchAll();
    if ($result) {
        $query = "DELETE FROM likes WHERE lke_user=? AND lke_img=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
    } else {
        $query = "INSERT INTO likes (lke_user, lke_img) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
    }
    header("Location: ../feed.php");
} else {
    header("Location: ../feed.php?errlike");
}
?>