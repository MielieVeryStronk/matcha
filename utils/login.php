<?php

session_start();

if (isset($_POST['submit']))
{
	require 'database.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

	if (empty($username) || empty($hashedPwd))
	{
		header("Location: ../index.php?login=empty");
		exit();
	}
	else 
	{
		$query = "SELECT * FROM `users` WHERE user_name=:username";
		$stmt = $pdo->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetch();
	
		if (password_verify($_POST['pwd'], $result['user_pwd']) && $result['user_valid'] == true)
		{
			$_SESSION['u_id'] = $result['user_id'];
			$_SESSION['u_name'] = $result['user_name'];
			$_SESSION['u_email'] = $result['user_email'];
			header("Location: ../feed.php?login=success");
			exit();
		}
		else
		{
			header("Location: ../index.php?login=error2");
			exit();
		}
	}
}
else
{
	header("Location: ../index.php?login=error3");
	exit();
}
