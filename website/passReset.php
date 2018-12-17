<?php 
session_start();
if(!empty($_GET)){
    $_SESSION['login-sid'] = $_GET['sid'];
}
?>
<h2> Reset password </h2>
<form class= "pass-reset" action= "res/reset-pass.php" method= "POST">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="newPass" placeholder="New Password">
    <input type="text" name="confirmPass" placeholder="Confirm Password">
    <button type="submit" name="reset">Reset Password</button>
</form>
