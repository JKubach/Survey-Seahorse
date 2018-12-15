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

$sql = "SELECT title FROM survey WHERE survey_id IN (SELECT survey_id FROM answer_numeric WHERE user_id=$uid);";
        $result = mysqli_query($connect, $sql);
        $surveys_taken = mysqli_fetch_assoc($result);
        echo  "Surveys that ", $user, " has taken: ", $surveys_taken['title'], "<br>";
?>

<link rel = "stylesheet" href= "res/nav.css">
<div class= nav>
    <a href="index.php" target="_blank"> Home </a>
    <a href="profile.php" target="_blank"> <?php echo $user; ?>'s Profile </a>
    <a href="directory.php" target="_blank"> Surveys </a>
    <a href="createsurvey.php" target="_blank"> Create a Survey </a>
</div>
<br><br>

    <h2> Username: <?php echo $user; ?> </h2>
    <h2> Email: <?php echo $email; ?> </h2>
    <h2> UserID: <?php echo $uid; ?> </h2>
    <h2> User Registration Date: <?php echo $date; ?> </h2>
    <h2> Blocked Status: <?php echo $block, ": ", $blockStatus; ?> </h2>
