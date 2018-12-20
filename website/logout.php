<?php
include_once 'res/session.php';
unset($_SESSION["uid"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["date"]);
unset($_SESSION['admin']);
unset($_SESSION['blocked']);
unset($_SESSION['login-sid']);
header("Location: index.php");
?>
