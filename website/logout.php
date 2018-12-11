<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["date"]);
unset($_SESSION['admin']);
unset($_SESSION['blocked']);
header("Location: index.php");
?>
