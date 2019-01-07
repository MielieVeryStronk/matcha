<title>Matches</title>
<?php
$count = 0;
echo '<body';
include_once 'stylesheets.php';
include_once 'header.php';
include_once 'utils/database.php';
try {
    $query = "SELECT * FROM users";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    die("data fetch failure".$e->getMessage()."</br>");
}
echo "<div class='container'>";
foreach ($result as $card) {
    if ($count == 0 || ($count % 4) == 0) {
        echo "<div class='row'>";
    }
echo '<div class="col-lg-3 mt-4" style="width: 300px;">
<div class="card">
    <img class="card-img-top" src="data:image/png;base64,'.$card['user_img1'].'" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">'.$card['user_name'].'</h5>
        <p class="card-text">'.$card['user_bio'].'</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
</div>';
if (($count > 2) && ($count % 3) == 0) {
    echo "</div>";
}
$count++;
}
echo "</div>";
?>