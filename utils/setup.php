<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "aassdd";
$dbName = "Matcha";
$dbCharset = "utf8mb4";
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

try {
	$dsn = "mysql:host=".$dbServername;
	$pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
} catch (PDOException $e) {
	die("Database connection failure: ".$e->getMessage()."</br>");
}


//create Matcha database


try {    
	$query = "CREATE DATABASE Matcha";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "database Matcha create success</br>";
} catch (PDOException $e) {
	die("database Matcha create failure".$e->getMessage()."</br>");
}

// connect to Matcha database

require ("database.php");

//create users table

try {
	$query = "CREATE TABLE users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_first varchar(256) not null,
	user_last varchar(256) not null,
	user_name varchar(256) not null,
	user_email varchar(256) not null,
	user_pwd varchar(256) not null,
	user_valid varchar(5) DEFAULT false,
	user_time datetime default CURRENT_TIMESTAMP,
	user_verify_hash varchar(32) not null,
	user_notify varchar(5) default true
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table USERS create success</br>";
} catch (PDOException $e) {
    die("table USERS create failure".$e->getMessage()."</br>");
}

// create img table

try {
	$query = "CREATE TABLE img (
	img_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	img_name varchar(256) not null,
	img_src longblob not null,
	img_user varchar(256) not null,
	img_time datetime default CURRENT_TIMESTAMP
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table IMG create success</br>";
} catch (PDOException $e) {
	die("table IMG create failure".$e->getMessage()."</br>");
}

// create edit table

try {
	$query = "CREATE TABLE edit (
	img_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	img_name varchar(256) not null,
	img_src longblob not null,
	img_user varchar(256) not null,
	img_sticker varchar(11) not null
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table EDIT create success</br>";
} catch (PDOException $e) {
	die("table EDIT create failure".$e->getMessage()."</br>");
}

// create comments table

try {
	$query = "CREATE TABLE comments (
	cmt_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	cmt_comment varchar(256) not null,
	cmt_user varchar(256) not null,
	cmt_img int(11) not null,
	cmt_time datetime default CURRENT_TIMESTAMP
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table COMMENTS create success</br>";
} catch (PDOException $e) {
	die("table COMMENTS create failure".$e->getMessage()."</br>");
}

// create likes table

try {
	$query = "CREATE TABLE likes (
	lke_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	lke_user varchar(256) not null,
	lke_img int(11) not null
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table LIKES create success</br>";
} catch (PDOException $e) {
	die("table LIKES create failure".$e->getMessage()."</br>");
}

// add testing images and comments

try {
	$blob = file_get_contents("../resources/testing/testimg1.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg1.jpg', $blob, 'admin']);
	echo "test image 1 added</br>";
} catch (PDOException $e) {
	die("test image 1 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg2.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg2.jpg', $blob, 'admin']);
	echo "test image 2 added</br>";
} catch (PDOException $e) {
	die("test image 2 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg3.jpeg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg3.jpeg', $blob, 'admin']);
	echo "test image 3 added</br>";
} catch (PDOException $e) {
	die("test image 3 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg4.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg4.jpg', $blob, 'admin']);
	echo "test image 4 added</br>";
} catch (PDOException $e) {
	die("test image 4 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg5.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg5.jpg', $blob, 'admin']);
	echo "test image 5 added</br>";
} catch (PDOException $e) {
	die("test image 5 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg6.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg6.jpg', $blob, 'admin']);
	echo "test image 6 added</br>";
} catch (PDOException $e) {
	die("test image 6 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg7.jpeg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg7.jpeg', $blob, 'admin']);
	echo "test image 7 added</br>";
} catch (PDOException $e) {
	die("test image 7 create failure".$e->getMessage()."</br>");
}
try {
	$blob = file_get_contents("../resources/testing/testimg8.jpg");
	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['testimg8.jpg', $blob, 'admin']);
	echo "test image 8 added</br>";
} catch (PDOException $e) {
	die("test image 8 create failure".$e->getMessage()."</br>");
}

// comments

try {
	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['very nice', 'admin', 1]);
	echo "comment 1 added</br>";
} catch (PDOException $e) {
	die("comment 1 create failure".$e->getMessage()."</br>");
}
try {
	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['this is so cool', 'admin', 4]);
	echo "comment 2 added</br>";
} catch (PDOException $e) {
	die("comment 2 create failure".$e->getMessage()."</br>");
}
try {
	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['wow dude', 'admin', 5]);
	echo "comment 3 added</br>";
} catch (PDOException $e) {
	die("comment 3 create failure".$e->getMessage()."</br>");
}
try {
	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['this is great', 'admin', 1]);
	echo "comment 4 added</br>";
} catch (PDOException $e) {
	die("comment 4 create failure".$e->getMessage()."</br>");
}
?>