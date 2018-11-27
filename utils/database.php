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
	$dsn = "mysql:host=".$dbServername.";dbname=".$dbName.";charset=".$dbCharset;
	$pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
} catch (PDOException $e) {
	die("Database connection failure: ".$e->getMessage());
}
