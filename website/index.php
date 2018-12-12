<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
session_start();
include_once 'config.php';
$sql = "SELECT question_content FROM question ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$q = mysqli_fetch_assoc($result);
$sql = "select * from user order by registration_date desc limit 1;";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$newUser = mysqli_fetch_assoc($result);
?>
<head>
<title>Survey Seahorse</title>

<link rel="apple-touch-icon" sizes="180x180" href="res/img/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="res/img/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="res/img/fav/favicon-16x16.png">
<link rel="manifest" href="res/img/fav/site.webmanifest">
<link rel="mask-icon" href="res/img/fav/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
</head>

<h1> Survey Seahorse </h1>
<h3> Random Question: <?php echo $q['question_content']; ?> </h3>
<a href="login.php"> Login </a> <br>
<a href="signup.php"> Register </a> <br>
<a href="profile.php"> Profile </a> <br>
<a href="createsurvey.php"> Create Survey </a> <br>
<a href="findsurvey.php"> Find a Survey </a> <br>
<a href="directory.php"> Survey Directory</a> <br>
<a href="logout.php"> Logout </a> <br>


<?php 
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $adminsql = "SELECT * FROM user WHERE admin=1 and user_id=$uid;";
    $result = mysqli_query($connect, $adminsql);
    $check = mysqli_num_rows($result);

    
    if ($check < 1) {
        exit();
    } else {
        $_SESSION['admin'] = 1;
        echo "<a href='controlpanel.php'> Admin Control Panel </a> <br>";
    }
}
?>

<p> Welcome to our newest user: <?php echo $newUser['username']; ?> </p>

