<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["date"]);
header("Location: login.php");
?>
