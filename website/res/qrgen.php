<?php
include ('phpqrcode/qrlib.php');
//include ('res/phpqrcode/phpqrcode.php');
$sid = $_GET['sid'];
$url = 'http://surveyseahorse.com/takesurvey.php?sid=' . $sid;
$qrcode = QRcode::png($url, false, QR_ECLEVEL_L, 10);
//QRcode::png('test', '/usr/local/www/nginx/test.png');
//echo '<img src="test.png" />';
?>
