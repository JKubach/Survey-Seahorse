<?php
include_once 'res/session.php';

$sid = $_SESSION['sid'];
$code = $_SESSION['code'];
$title = $_SESSION['title'];
$qr = 'res/qrgen.php?sid=' . $sid;
?>
<h1> Success </h1>
<?php 
echo $title, " has been created.";
echo "Use access code ", $code;
echo "<a href='$qr'> QR Code </a>";
unset($_SESSION['sid']);
unset($_SESSION['code']);
unset($_SESSION['title']);
unset($_SESSION['description']);
unset($_SESSION['questions']);
?>
<a href="index.php"> Home </a>
