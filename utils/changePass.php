<?php

session_start();
require("redirect.php");

if (isset($_POST['submit']))
{
	include_once 'database.php';

    $email = $_SESSION['u_email'];
	$oldPwd = $_POST['oldPwd'];
    $newPwd = $_POST['newPwd'];
    $hashedNew = password_hash($_POST['newPwd'], PASSWORD_DEFAULT);
    
	
	if (empty($oldPwd) || empty($newPwd) || empty($email))
	{
		header("Location: ../changePass.php?change=empty");
		exit();
	}
	else
	{
        if (strlen($newPwd) < 8)
        {
            header("Location: ../changePass.php?change=pwdinvalid");
            exit();
        }
        if (!preg_match("#[0-9]+#", $newPwd))
        {
            header("Location: ../changePass.php?change=pwdinvalid");
            exit();
        }
        if (!preg_match("#[a-zA-Z]+#", $newPwd))
        {
            header("Location: ../changePass.php?change=pwdinvalid");
            exit();
        }
        else
        {
            $query = "SELECT * FROM `users` WHERE user_email=:email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            var_dump($result);
            if (password_verify($_POST['oldPwd'], $result['user_pwd']))
            {
                $query = "UPDATE users SET user_pwd=? WHERE user_email=?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$hashedNew, $email]);
                header("Location: ../changePass.php?change=success");
                exit();
            }
            else
            {
                header("Location: ../changePass.php?change=oldinvalid");
                exit();
            }
		}
	}
}
else
{
	header("Location: ../changePass.php");
	exit();
}