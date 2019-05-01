<?php
require 'database.php';

if (!isset($_SESSION)) {
session_start();
}

if (!isset($_SESSION['u_name']))
{
    header("Location: /matcha/index.php");
} else if (!checkProfile($_SESSION['u_name'], $pdo)) {
    header("Location: /matcha/profile.php?profile=incomplete");
}

function checkProfile($userName, $pdo) {
    try {
        $query = "SELECT * FROM users WHERE user_name=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userName]);
        $result = $stmt->fetch();
    } catch (PDOException $e) {
        die("data fetch failure".$e->getMessage()."</br>");
    }
    if (isset($result['user_name'])
        && isset($result['user_first'])
        && (strlen($result['user_first']) > 0)
        && isset($result['user_last'])
        && (strlen($result['user_last']) > 0)
        && isset($result['user_email'])
        && (strlen($result['user_email']) > 0)
        && isset($result['user_gender'])
        && isset($result['user_tags'])
        && (strlen($result['user_bio']) > 0)
        && isset($result['user_birth'])
        && isset($result['user_img1'])) {
            return true;
        } else {
            return false;
        }
}
?>