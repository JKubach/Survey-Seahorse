<html>
<?php
include_once 'res/session.php';
include_once 'config.php';
if($_SESSION['username'] == null)
        header("Location: login.php");

$user = $_SESSION['username'];
$email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$date = date("M j, Y",strtotime($_SESSION['date']));
$block = $_SESSION['blocked'];

$blockStatus = "";

if($block == 48) {
    $blockStatus = "full access";
} elseif($block == 49) {
    $blockStatus = "cannot create surveys";
} elseif($block == 50) {
    $blockStatus = "cannot take or create surveys";
} elseif($block == 51) {
    $blockStatus = "r.i.p.";
}

include 'res/navbar.php';

echo '<link rel="stylesheet" href="res/style.css">';
echo  '<div class="profile">';


echo  "<h2> Username: $user  </h2>";
echo  "<h2> Email: $email </h2>";
echo  "<h2> UserID: $uid </h2>";
echo  "<h2> User Registration Date: $date </h2>";
echo  "<h2> Blocked Status: $blockStatus </h2>";

$sql = "SELECT title FROM survey WHERE survey_id IN (SELECT survey_id FROM answer_numeric WHERE user_id=$uid) ORDER BY RAND() LIMIT 3;";
$result = mysqli_query($connect, $sql);

echo "Recent surveys that ", $user, " has taken: <br>";
while ($surveys_taken = mysqli_fetch_assoc($result)) {
    echo $surveys_taken['title'], "<br>";
}
echo "<br> <br>";

$sql = "select title, access_code from survey where user_id=$uid order by creation_date desc limit 1;";
$result = mysqli_query($connect, $sql);
$newest_survey = mysqli_fetch_assoc($result);

echo  $user, "'s newest survey: ", $newest_survey['title'], "<br>";
echo "Access code: ", $newest_survey['access_code'], "<br>";

echo '</div>';
?>
</html>
