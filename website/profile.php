<?php

session_start();
include_once 'config.php';

$user = $_SESSION['username'];
$email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$date = $_SESSION['date'];
$block = $_SESSION['blocked'];

$sql = "SELECT title FROM survey WHERE survey_id IN (SELECT survey_id FROM answer_numeric WHERE user_id=$uid);";
        $result = mysqli_query($connect, $sql);
        $surveys_taken = mysqli_fetch_assoc($result);
        echo  "Surveys that ", $user, " has taken: ", $surveys_taken['title'], "<br>";
?>

    <h1> <?php echo $user; ?> </h1>
    <h1> <?php echo $email; ?> </h1>
    <h1> <?php echo $uid; ?> </h1>
    <h1> <?php echo $date; ?> </h1>
    <h1> <?php echo $block; ?> </h1>
