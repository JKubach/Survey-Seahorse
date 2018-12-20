<?php
include_once 'res/session.php';
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
<link rel="stylesheet" href="res/style.css">
</head>

<?php 
include 'res/navbar.php';
include 'res/txt/msg.php';
if (isset($message)) {
    echo "<center ><h3> Message from the Admins: ",  $message, "</h3> </center>";
}
?>
<div class="panel">
    <h1> Survey Seahorse </h1>
    <h3> Random Question: <?php echo $q['question_content']; ?>
    <img src="res/img/seahorse.png" class="seahorse_pic" size="250">
    <h3> Welcome to our newest user: <?php echo $newUser['username']; ?> </h3>
</div>

<div class="index-grid-panel">
    <a href="login.php">Login</a>
    <a href="signup.php">Register</a>
    <!--<a href="profile.php"> Profile </a> <br>
    <a href="createsurvey.php"> Create Survey </a> <br>-->
    <a href="findsurvey.php">Find a Survey</a>
    <a href="directory.php">Survey Directory</a>
    <a href="archive.php">Survey Archive</a>
    <a href="about.php">About</a>

<?php 
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $adminsql = "SELECT * FROM user WHERE admin=1 and user_id=$uid;";
    $result = mysqli_query($connect, $adminsql);
    $check = mysqli_num_rows($result);


    if ($check < 1) {
        echo "<a class='off' href='logout.php'> Logout </a>";
        exit();
    } else {
        $_SESSION['admin'] = 1;
        echo "<a href='controlpanel.php'> Admin Control Panel </a> <br>";
        echo "<a class='off' href='logout.php'> Logout </a>";
    }
}
exit();
?>

</div>
