<?php
session_start();
if (!empty($_GET)) {
    $_SESSION['login-sid'] = $_GET['sid'];
}
?>
<html>
<h2> Sign In</h2>
<form class="signin-form" action="res/login-user.php" method="POST">

<input type="text" name="username" placeholder="User Name">
<input type="text" name="password" placeholder="Password">
<button type="submit" name="submit">Sign In</button>
<br>
<a href = "res/nope.php" target = "_blank">Forgot your password?</a> 
<br>
<a href = "signUp.php" target = "_blank">Don't have an account?</a>

</form>
</html>
