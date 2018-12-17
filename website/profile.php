<html>
<?php
session_start();
include_once 'config.php';

$user = $_SESSION['username'];
$email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$date = $_SESSION['date'];
$block = $_SESSION['blocked'];

$blockStatus = "";

if($block == 48)
    $blockStatus = "full access";
if($block == 49)     
    $blockStatus = "reduced access";
if($block == 50)
    $blockStatus = "you shouldn't even be here";

include 'res/navbar.php';

echo '<link rel="stylesheet" href="res/style.css">';
echo  '<div class="profile">';


echo  "<h2> Username: '$user'  </h2>";
echo  "<h2> Email: '$email' </h2>";
echo  "<h2> UserID: '$uid' </h2>";
echo  "<h2> User Registration Date: '$date' </h2>";
echo  "<h2> Blocked Status: ' $blockStatus' </h2>";

$sql = "SELECT title FROM survey WHERE survey_id IN (SELECT survey_id FROM answer_numeric WHERE user_id=$uid) ORDER BY RAND() LIMIT 3;";
$result = mysqli_query($connect, $sql);

echo "Recent surveys that ", $user, " has taken: ";
while ($surveys_taken = mysqli_fetch_assoc($result)) {
    echo $surveys_taken['title'], " ";
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
