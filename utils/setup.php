<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "123qwe";
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
	user_sex_pref int(2) DEFAULT 2,
	user_gender int(2) DEFAULT 0,
	user_bio varchar(256),
	user_tags varchar(256),
	user_likes int(8) DEFAULT 0,
	user_fame int(8) DEFAULT 0,
	user_views int(8) DEFAULT 0,
	user_birth date,
	user_pwd varchar(256) not null,
	user_img1 longblob,
	user_img2 longblob,
	user_img3 longblob,
	user_img4 longblob,
	user_img5 longblob,
	user_valid varchar(5) DEFAULT false,
	user_time datetime default CURRENT_TIMESTAMP,
	user_verify_hash varchar(32) not null,
	user_notify varchar(5) default true,
	user_online varchar(5) DEFAULT false,
	user_last_online datetime default CURRENT_TIMESTAMP
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table USERS create success</br>";
} catch (PDOException $e) {
    die("table USERS create failure".$e->getMessage()."</br>");
}

// Matching Test Profiles
$image1 = base64_encode(file_get_contents("../resources/images/profiles/zuck.jpeg"));
$image2 = base64_encode(file_get_contents("../resources/images/profiles/elton.jpg"));
$image3 = base64_encode(file_get_contents("../resources/images/profiles/tom.jpg"));
$image4 = base64_encode(file_get_contents("../resources/images/profiles/scarlett.jpeg"));
$image5 = base64_encode(file_get_contents("../resources/images/profiles/ellen.jpg"));
$image6 = base64_encode(file_get_contents("../resources/images/profiles/katy.jpg"));
// M4F
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Mister", "Straight", "mrstraight", "mrstraight@test.com", 1, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image1]);
// M4M
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Mister", "Gay", "mrgay", "mrgay@test.com", 0, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image2]);
// M4B
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Mister", "Bi", "mrbi", "mrbi@test.com", 2, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image3]);
// F4M
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Miss", "Straight", "msstraight", "msstraight@test.com", 0, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image4]);
// F4F
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Miss", "Lesbian", "mslesbian", "mslesbian@test.com", 1, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image5]);
// F4B
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["Miss", "Bi", "msbi", "msbi@test.com", 2, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", "1997-07-11", $hashedPwd, "test", true, $image6]);

// Creating Dummy/Filler Profiles
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/mrstraight") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/mrstraight/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 1, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
}
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/mrgay") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/mrgay/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 0, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
}
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/mrbi") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/mrbi/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 2, 0, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
}
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/msstraight") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/msstraight/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 0, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
}
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/mslesbian") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/mslesbian/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 1, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
}
$birthDiff = 0;
foreach (scandir("../resources/images/dummyProfiles/msbi") as $file) {
	if ($file != "." && $file != "..") {
	$image = base64_encode(file_get_contents("../resources/images/dummyProfiles/msbi/".$file));
	$filename = substr($file, 0, strrpos($file, "."));
	$hashedPwd = password_hash("test", PASSWORD_DEFAULT);
	$query = "INSERT into `users` SET user_first=?, user_last=?, user_name=?, user_email=?, user_sex_pref=?, user_gender=?, user_bio=?, user_tags=?, user_birth=?, user_pwd=?, user_verify_hash=?, user_valid=?, user_img1=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$filename, $filename, $filename, $filename."@test.com", 2, 1, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.", ",1,3,8,15,23,22,164", 1997-($birthDiff++)."-07-11", $hashedPwd, "test", true, $image]);
	}
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

// create tags table

try {
	$query = "CREATE TABLE tags (
	tag_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	tag_name varchar(256) not null
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table TAGS create success</br>";
} catch (PDOException $e) {
	die("table TAGS create failure".$e->getMessage()."</br>");
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
	lke_profile varchar(256) not null
	);";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table LIKES create success</br>";
} catch (PDOException $e) {
	die("table LIKES create failure".$e->getMessage()."</br>");
}

// create message table

try {
	$query = "CREATE TABLE `chat_message` (
	`chat_message_id` int(11) not null AUTO_INCREMENT PRIMARY KEY,
	`to_user_id` int(11) not null,
	`from_user_id` int(11) not null,
	`chat_message` text not null,
	`timestamp` timestamp not null default CURRENT_TIMESTAMP,
	`status` int(1) not null
  );";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	echo "table CHAT_MESSAGE create success</br>";
} catch (PDOException $e) {
	die("table CHAT_MESSAGE create failure".$e->getMessage()."</br>");
}

// Tag Data

try {
	$tagsFile = file('../resources/tags.txt');
	foreach($tagsFile as $tag) {
		$query = "INSERT INTO tags (tag_name) VALUES (?)";
		$stmt = $pdo->prepare($query);
		$stmt->execute([$tag]);
}
echo "Tags added </br>";
} catch (PDOException $e) {
	die("tag table data load failure : ".$e->getMessage()."</br>");
}

// // add testing images and comments

// try {
// 	$blob = file_get_contents("../resources/testing/testimg1.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg1.jpg', $blob, 'admin']);
// 	echo "test image 1 added</br>";
// } catch (PDOException $e) {
// 	die("test image 1 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg2.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg2.jpg', $blob, 'admin']);
// 	echo "test image 2 added</br>";
// } catch (PDOException $e) {
// 	die("test image 2 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg3.jpeg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg3.jpeg', $blob, 'admin']);
// 	echo "test image 3 added</br>";
// } catch (PDOException $e) {
// 	die("test image 3 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg4.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg4.jpg', $blob, 'admin']);
// 	echo "test image 4 added</br>";
// } catch (PDOException $e) {
// 	die("test image 4 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg5.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg5.jpg', $blob, 'admin']);
// 	echo "test image 5 added</br>";
// } catch (PDOException $e) {
// 	die("test image 5 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg6.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg6.jpg', $blob, 'admin']);
// 	echo "test image 6 added</br>";
// } catch (PDOException $e) {
// 	die("test image 6 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg7.jpeg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg7.jpeg', $blob, 'admin']);
// 	echo "test image 7 added</br>";
// } catch (PDOException $e) {
// 	die("test image 7 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$blob = file_get_contents("../resources/testing/testimg8.jpg");
// 	$query = "INSERT INTO img (img_name, img_src, img_user) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['testimg8.jpg', $blob, 'admin']);
// 	echo "test image 8 added</br>";
// } catch (PDOException $e) {
// 	die("test image 8 create failure".$e->getMessage()."</br>");
// }

// // comments

// try {
// 	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['very nice', 'admin', 1]);
// 	echo "comment 1 added</br>";
// } catch (PDOException $e) {
// 	die("comment 1 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['this is so cool', 'admin', 4]);
// 	echo "comment 2 added</br>";
// } catch (PDOException $e) {
// 	die("comment 2 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['wow dude', 'admin', 5]);
// 	echo "comment 3 added</br>";
// } catch (PDOException $e) {
// 	die("comment 3 create failure".$e->getMessage()."</br>");
// }
// try {
// 	$query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (?, ?, ?)";
// 	$stmt = $pdo->prepare($query);
// 	$stmt->execute(['this is great', 'admin', 1]);
// 	echo "comment 4 added</br>";
// } catch (PDOException $e) {
// 	die("comment 4 create failure".$e->getMessage()."</br>");
// }

?>
