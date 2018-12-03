<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "aassdd";
$dbName = "matcha";
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
try {
	$query = "LOAD DATA LOCAL INFILE '/./tags.txt' INTO TABLE tags
	LINES TERMINATED BY '\n'";
$stmt = $pdo->prepare($query);
$stmt-execute();
echo "Tags added </br>";
} catch (PDOException $e) {
	die("tag table data load failure : ".$e->getMessage()."</br>");
}
?>