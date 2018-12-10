<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
session_start();
include_once 'config.php';
$sql = "SELECT question_content FROM question ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$q = mysqli_fetch_assoc($result);
?>
<h1> Survey Seahorse </h1>
<h3> Random Question: <?php echo $q['question_content']; ?> </h3>
<a href="login.php"> Login </a> <br>
<a href="signup.php"> Register </a> <br>
<a href="profile.php"> Profile </a> <br>
<a href="createsurvey.php"> Create Survey </a> <br>
<a href="findsurvey.php"> Find a Survey </a> <br>
<a href="logout.php"> Logout </a> <br>
