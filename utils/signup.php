<?php

if (isset($_POST['submit']))
{
	include_once 'database.php';

	$first = $_POST['first'];
	$last = $_POST['last'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$pwdConfirm = $_POST['pwdConfirm'];
	$hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	
	if (empty($username) || empty($hashedPwd) || empty($email))
	{
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else
	{
		if (!preg_match("/^[a-zA-Z]*$/", $username) || !preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else
		{
			if (strlen($_POST['pwd']) < 8)
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}
			if (!preg_match("#[0-9]+#", $_POST['pwd']))
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}
			if (!preg_match("#[a-zA-Z]+#", $_POST['pwd']))
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}     
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../signup.php?signup=email");
				exit();
			}
			if ($pwd != $pwdConfirm)
			{
				header("Location: ../signup.php?signup=pwdmatch");
				exit();
			}
			else
			{
				$query = "SELECT * FROM `users` WHERE user_name=:username OR user_email=:email";
				$stmt = $pdo->prepare($query);
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
				$result = $stmt->fetch();
				if ($result)
				{
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else
				{
					$verify_hash = md5(rand(1000, 9999));
					$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_pwd=?, user_verify_hash=?";
					$stmt = $pdo->prepare($query);
					$stmt->execute([$first, $last, $username, $email, $hashedPwd, $verify_hash]);
					header("Location: ../signup.php?signup=success");
					$subject = 'Matcha Signup Verification';
					$message = '
					Thanks for signing up!
					Your account has been created.

					Please click this link to activate your account:
					http://localhost:8080/Matcha/utils/verify.php?email='.$email.'&hash='.$verify_hash;
					$headers = 'From:noreply@Matcha.enikel' . "\r\n";
					mail($email, $subject, $message, $headers);
					exit();
				}
			}
		}
	}
}
else
{
	header("Location: ../signup.php");
	exit();
}