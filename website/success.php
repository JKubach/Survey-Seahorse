<?php
session_start();
$code = $_SESSION['code'];
$title = $_SESSION['title'];
?>
<h1> Success </h1>
<?php 
echo $title, " has been created.";
echo "Use access code ", $code;
unset($_SESSION['sid']);
unset($_SESSION['code']);
unset($_SESSION['title']);
unset($_SESSION['description']);
unset($_SESSION['questions']);
?>
<a href="index.php"> Home </a>
