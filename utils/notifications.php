<?php

session_start();
require("redirect.php");
require("database.php");

if ($_POST['submit'] == "false")
{
    $query = "UPDATE users SET user_notify=? WHERE user_name=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([FALSE, $_SESSION['u_name']]);
    header("Location: ../notifications.php");
    exit();
}
elseif ($_POST['submit'] == "true")
{
    $query = "UPDATE users SET user_notify=? WHERE user_name=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([TRUE, $_SESSION['u_name']]);
    header("Location: ../notifications.php");
    exit();
}
else
{
	header("Location: ../notifications.php");
	exit();
}
?>