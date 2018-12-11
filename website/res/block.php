<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

session_start();

include_once '../config.php';
$username = mysqli_real_escape_string($connect, $_POST['username']);

if (empty($username)) {
    header("Location: ../controlpanel.php?username=error");
    exit();
} elseif (isset($_POST['revoke-creation'])) {
    $sql = "UPDATE user SET blocked=b'01' WHERE username='$username';";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
    echo $username, " can no longer create surveys <br>";
    echo "<a href = '../controlpanel.php'> Return to control panel </a>";
    exit();
} elseif (isset($_POST['revoke-access'])) {
    $sql = "UPDATE user SET blocked=b'10' WHERE username='$username';";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
    echo $username, " can no longer create or take surveys <br>";
    echo "<a href = '../controlpanel.php'> Return to control panel </a>";
    exit();
} elseif (isset($_POST['ban'])) {
    $sql = "UPDATE user SET blocked=b'11' WHERE username='$username';";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
    echo $username, " has been banned from Survey Seahorse";
    echo "<a href = '../controlpanel.php'> Return to control panel </a>";
    exit();
} elseif (isset($_POST['unban'])) {
    $sql = "UPDATE user SET blocked=b'00' WHERE username='$username';";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
    echo $username, " now has full user privileges";
    echo "<a href = '../controlpanel.php'> Return to control panel </a>";
    exit();
}


