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
echo "<div class='row'>";
foreach ($result as $card) {
    // if ($count == 0 || ($count % 4) == 0) {
    //     echo "<div class='row'>";
    // }
if (matchCard($_SESSION['u_gender'], $_SESSION['u_pref'], $card['user_gender'], $card['user_sex_pref']) && $card['user_name'] != $_SESSION['u_name']) { // Sexual Preference Matching
echo '<div class="col-lg-3 mt-4" style="width: 300px;">
<div class="card text-center">
    <a href="userProfile.php?user='.$card['user_name'].'"><img class="card-img-top" src="data:image/png;base64,'.$card['user_img1'].'" alt="profile"></a>
    <div class="card-body p-3">
    <div class="w-100 text-center mb-2">
        <h5 class="card-title">'.$card['user_name'].'</h5>';
        if ($card['user_gender'] == 0) {
            echo '<img src="resources/icons/man.png" width="30" height="30" alt="">';
        } else {
            echo '<img src="resources/icons/woman.png" width="30" height="30" alt="">';
        }
    echo '<a class="m-2"> Interested In:</a>';
        if ($card['user_sex_pref'] == 0) {
            echo '<img src="resources/icons/man.png" width="30" height="30" alt="">';
        } elseif ($card['user_sex_pref'] == 1) {
            echo '<img src="resources/icons/woman.png" width="30" height="30" alt="">';
        } else {
            echo '<img src="resources/icons/woman.png" width="30" height="30" alt="">';
            echo '<img src="resources/icons/man.png" width="30" height="30" alt="">';
        }
echo    '</div>
    <p class="card-text text-left">'.$card['user_bio'].'</p>
    <form action="utils/like.php" method="POST">
        <input type="hidden" name="id" value="'.$card['user_name'].'">
        <button type="submit" name="submit" value="submit" class="w3-button w3-hover-white"><div class="heart display-inline-block w3-margin"><div class="like-number">'.$card['user_likes'].'</div></div></button>
        </form>
    </div>
    </div>
</div>';
$count++;
    }
// if (($count > 2) && ($count % 4) == 0) {
//     echo "</div>";
// }
}
echo "</div>";
echo "</div>";

function matchCard($userGender, $userPref, $matchGender, $matchPref) {
    $userCode = getCode($userGender, $userPref);
    $matchCode = getCode($matchGender, $matchPref);
    if ($userCode == 1 && ($matchCode == 4 || $matchCode == 6)) {
        return (1);
    } elseif ($userCode == 2 && ($matchCode == 2 || $matchCode == 3)) {
        return (1);
    } elseif ($userCode == 3 && ($matchCode == 4 || $matchCode == 6 || $matchCode == 2 || $matchCode == 3)) {
        return (1);
    } elseif ($userCode == 4 && ($matchCode == 1 || $matchCode == 3)) {
        return (1);
    } elseif ($userCode == 5 && ($matchCode == 5 || $matchCode == 6)) {
        return (1);
    } elseif ($userCode == 6 && ($matchCode == 1 || $matchCode == 3 || $matchCode == 5 || $matchCode == 6)) {
        return (1);
    } else {
        return (0);
    }
}

function getCode($gender, $pref) {
    if ($gender == 0) {
        if ($pref == 0) {
            return (2); //gay
        }
        elseif ($pref == 1) {
            return (1); //straight male
        }
        elseif ($pref == 2) {
            return (3); //bi male
        }
    } elseif ($gender == 1) {
        if ($pref == 0) {
            return (4); //straight female
        }
        elseif ($pref == 1) {
            return (5); //lesbian
        }
        elseif ($pref == 2) {
            return (6); //bi female
        }
    }
}
?>