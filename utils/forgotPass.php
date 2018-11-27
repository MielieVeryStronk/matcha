<?php
require 'database.php';
$pass = randomPassword();
$hash = password_hash($pass, PASSWORD_DEFAULT);
$email = $_POST['email'];
$query = "SELECT * FROM `users` WHERE user_email=:email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch();
if ($result)
{   
    $query = "UPDATE `users` SET user_pwd=? WHERE user_email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$hash, $email]);
    $subject = 'Matcha Password Reset';
    $message = '
    Your password has been reset.

    Here is your new password: '.$pass.'
    Please login and change your password to something you can remember.';
    $headers = 'From:noreply@Matcha.enikel' . "\r\n";
    mail($email, $subject, $message, $headers);
    header("Location: ../index.php?passwordreset");
    exit();
}
else
{
    header("Location: ../index.php?usernotfound");
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
?>