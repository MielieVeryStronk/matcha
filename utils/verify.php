<?php
include_once 'stylesheets.php';
include_once 'header.php';
require 'database.php';
echo '<body class="w3-theme-l5">';
?>
<?php
$hash = $_GET['hash'];
$email = $_GET['email'];
$query = "SELECT * FROM `users` WHERE user_email=? AND user_verify_hash=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$email, $hash]);
$result = $stmt->fetch();
if ($result)
{   
    $query = "UPDATE users SET user_valid=? WHERE user_email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([true, $email]);
    header("Location: ../index.php?verifysuccess");
}
else
{
    header("Location: ../index.php?verifyfailure");
}
?>
</body>