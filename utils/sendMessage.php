<?php
session_start();
require("redirect.php");
require 'database.php';

if (strlen($_POST['msg']) > 0) {
    $msg = htmlentities($_POST['msg']);
    $query = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message) VALUES (:to_user, :from_user, :msg)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['to_user'=> $_POST['to_user'], 'from_user'=>$_SESSION['u_name'], 'msg'=>$_POST['msg']]);
    // $query = "SELECT * FROM img WHERE img_id=?";
    // $stmt = $pdo->prepare($query);
    // $stmt->execute([$_POST['id']]);
    // $result = $stmt->fetch();
    // $userNotify = $result['img_user'];
    $query = "SELECT * FROM users WHERE user_name=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute($_POST['to_user']);
    $result = $stmt->fetch();
    if ($result['user_notify'] == true)
    {
        $subject = 'Someone just messaged you!';
        $message = $_SESSION['u_name']." sent you a message: \r\n".$msg;
        $headers = 'From:noreply@Matcha.enikel' . "\r\n";
        mail($result['user_email'], $subject, $message, $headers);
    }
    header("Location: ../feed.php");
}
else {
    header("Location: ../feed.php?msgerrlength");
}
?>