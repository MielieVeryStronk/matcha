<?php

session_start();
require("redirect.php");

if (isset($_POST['submit']))
{
	include_once 'database.php';

    $email = $_SESSION['u_email'];
    $pwd = $_POST['pwd'];
    $newLast = $_POST['newLast'];  
	
	if (empty($newLast) || empty($pwd) || empty($email))
	{
		header("Location: ../changeUser.php?change=empty");
		exit();
	}
	else
	{
        if (!preg_match("/^[a-zA-Z]*$/", $newLast))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
        else
        {
                $query = "SELECT * FROM `users` WHERE user_email=:email";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch();
                if (password_verify($_POST['pwd'], $result['user_pwd']))
                {
                    $query = "UPDATE users SET user_last=? WHERE user_email=?";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$newLast, $email]);
                    header("Location: ../changeUser.php?change=success");
                    exit();
                }
                else
                {
                    header("Location: ../changeUser.php?change=pwdinvalid");
                    exit();
                }
		}
	}
}
else
{
	header("Location: ../changeUser.php");
	exit();
}