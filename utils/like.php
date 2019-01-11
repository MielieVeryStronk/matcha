<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM likes WHERE lke_user=? AND lke_profile=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
    $result = $stmt->fetchAll();
    if ($result) {
        try {
            $query = "DELETE FROM likes WHERE lke_user=? AND lke_profile=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
            $query = 'UPDATE users SET user_likes=user_likes - 1 WHERE user_name=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_POST['id']]);
        } catch (PDOException $e) {
            die("like delete failed".$e->getMessage()."</br>");
        }
    } else {
        try {
            $query = "INSERT INTO likes (lke_user, lke_profile) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['u_name'], $_POST['id']]);
            $query = 'UPDATE users SET user_likes=user_likes + 1 WHERE user_name=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_POST['id']]);
        } catch (PDOException $e) {
            die("like create failed".$e->getMessage()."</br>");
        }
    }
    header("Location: ../matches.php");
} else {
    header("Location: ../matches.php?errlike");
}
?>