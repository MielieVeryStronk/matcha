<?php

session_start();
require("redirect.php");

if (isset($_POST['submit']))
{
	include_once 'database.php';

    $email = $_SESSION['u_email'];
    $pwd = $_POST['pwd'];
    $newEmail = $_POST['newEmail'];    
	
	if (empty($newEmail) || empty($pwd) || empty($email))
	{
		header("Location: ../changeEmail.php?change=empty");
		exit();
	}
	else
	{
        if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../changeEmail.php?change=email");
            exit();
        }
        else
        {
            $query = "SELECT * FROM `users` WHERE user_name=:username";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $newEmail);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result)
            {
                header("Location: ../changeEmail.php?change=usertaken");
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
                    $query = "UPDATE users SET user_email=? WHERE user_email=?";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$newEmail, $email]);
                    $verify_hash = md5(rand(1000, 9999));
					$query = "UPDATE users SET user_verify_hash=?, user_valid=? WHERE user_email=?";
					$stmt = $pdo->prepare($query);
					$stmt->execute([$verify_hash, false, $newEmail]);
					$subject = 'Matcha Email Changed';
					$message = '
					Your email has been changed.

					Please click this link to activate your account:
					http://localhost:8080/Matcha/verify.php?email='.$newEmail.'&hash='.$verify_hash;
					$headers = 'From:noreply@Matcha.enikel' . "\r\n";
					mail($newEmail, $subject, $message, $headers);
                    header("Location: ../changeEmail.php?change=success");
                    exit();
                }
                else
                {
                    header("Location: ../changeEmail.php?change=pwdinvalid");
                    exit();
                }
            }
		}
	}
}
else
{
	header("Location: ../changeEmail.php");
	exit();
}