<?php
session_start();
if (!empty($_GET)) {
    $_SESSION['login-sid'] = $_GET['sid'];
}
?>
<html>
<link rel="stylesheet" href="res/style.css">


<form class="signin-form" action="res/login-user.php" method="POST">
    <h2> Sign In</h2>
    <input type="text" name="username" placeholder="User Name">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="submit">Sign In</button> <br>
    <a href = "passReset.php" >Forgot your password?</a> <br>
    <a href = "signup.php" >Don't have an account?</a>
</form>
</html>
