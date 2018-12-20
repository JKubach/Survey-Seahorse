<?php
include_once 'res/session.php';

$sid = $_SESSION['sid'];
$code = $_SESSION['code'];
$title = $_SESSION['title'];
$qr = 'res/qrgen.php?sid=' . $sid;
?>
<link rel="stylesheet" href="res/style.css">
<h1> Success </h1>
<?php 
echo $title, " has been created. ";
echo "Use access code ", $code;
echo "<a href='$qr' class='link'> QR Code </a>";
unset($_SESSION['sid']);
unset($_SESSION['code']);
unset($_SESSION['title']);
unset($_SESSION['description']);
unset($_SESSION['questions']);
?>
<a href="index.php"> Home </a>
