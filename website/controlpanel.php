<?php
session_start();
include_once 'config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: res/nope.php");
    exit();
} else {
    $user = $_SESSION['username'];
    include 'res/navbar.php';

    echo "<p> Hello, ", $user, " what would you like to do? <br>";
}
?>
<form class="block-form" action="res/block.php" method="POST">
    <input type='text' name='username' placeholder='User Name'> <br>
    <button type='submit' name='revoke-creation' > Revoke Survey Creation </button>
    <button type='submit' name='revoke-access' > Revoke All Survey Access </button>
    <button type='submit' name='ban' > Ban User </button>
    <button type='submit' name='unban' > Unban User </button>
</form>

<form class="delete-survey-form" action="res/delete-survey.php" method="POST">
    <input type='text' name='survey-code' placeholder='Survey Code'> <br>
    <button type='submit' name='delete-survey' > Delete Survey</button>
</form>

<form class="create-admin" action="res/register-admin.php" method="POST">
    <input type='text' name='email' placeholder='Email'> <br>
    <input type='text' name='username' placeholder='User Name'> <br>
    <input type='text' name='password' placeholder='Password'> <br>
    <button type='submit' name='admin' > Create New Admin Account</button>
</form>

<a href="index.php"> Home </a> <br>
