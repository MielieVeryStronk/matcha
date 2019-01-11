<?php
echo '<title>'.$_GET['user'].'</title><body>';
include_once 'stylesheets.php';
include_once 'header.php';
include_once 'utils/database.php';

$query = 'SELECT * FROM users WHERE user_name=?';
$stmt = $pdo->prepare($query);
$stmt->execute([$_GET['user']]);
$result = $stmt->fetch();
if ($result['user_name'] != $_SESSION['u_name']) {
    $query = 'UPDATE users SET user_views=user_views + 1 WHERE user_name=?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['user']]);
}

$query = 'UPDATE users SET user_fame=user_views/10 + user_likes WHERE user_name=?';
$stmt = $pdo->prepare($query);
$stmt->execute([$_GET['user']]);

echo '<section class="container text-center w-100 mt-5 border border-dark rounded" style="max-width: 900px">
    <div class="main-wrapper">
    <img class="profile-img mt-4 mb-2" src="data:image/png;base64,'.$result['user_img1'].'">
    <div class="row mb-4">
    <div class="col-lg-3 mt-4" style="">
    <img class="profile-img-extra mt-4 mb-2" src="data:image/png;base64,'.$result['user_img2'].'">
    </div>
    <div class="col-lg-3 mt-4" style="">
    <img class="profile-img-extra mt-4 mb-2" src="data:image/png;base64,'.$result['user_img3'].'">
    </div>
    <div class="col-lg-3 mt-4" style="">
    <img class="profile-img-extra mt-4 mb-2" src="data:image/png;base64,'.$result['user_img4'].'">
    </div>
    <div class="col-lg-3 mt-4" style="">
    <img class="profile-img-extra mt-4 mb-2" src="data:image/png;base64,'.$result['user_img5'].'">
    </div>
    </div>
    <h2>'.$result['user_first'].' '.$result['user_last'].'</h3>
    <h3><span class="text-secondary">@'.$result['user_name'].'</span></h3>
    <div class="row mb-4 justify-content-center">
    <div class="col-lg-3 mt-4" style="">
    <div class="profile-block mt-4 mb-2 text-center center-block">Likes: '.$result['user_likes'].'</div>
    </div>
    <div class="col-lg-3 mt-4" style="">
    <div class="profile-block mt-4 mb-2 text-center center-block">Fame: '.$result['user_fame'].'</div>
    </div>
    <div class="col-lg-3 mt-4" style="">
    <div class="profile-block mt-4 mb-2 text-center center-block">Views: '.$result['user_views'].'</div>
    </div>
    </div>
    </section>
    </div>';
?>