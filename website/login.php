<?php
session_start();
?>
<html>
<h2> Sign In</h2>
<form class="signin-form" action="res/login-user.php" method="POST">

<input type="text" name="username" placeholder="User Name">
<input type="text" name="password" placeholder="Password">
<button type="submit" name="submit">Sign In</button>

</form>
</html>
