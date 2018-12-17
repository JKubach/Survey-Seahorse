<html>
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
include_once 'config.php';
include 'res/navbar.php';

echo '<link rel="stylesheet" href="res/style.css">';
echo  '<div class="survey-directory">';

$sql = "SELECT * FROM survey;";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($result)) {
    $sid = $row['survey_id'];
    $title = $row['title'];
    $url = "takesurvey.php?sid=" . $sid;
    $qr = "res/qrgen.php?sid=" . $sid;
    echo "Survey ID: ", $row['survey_id'], "<br>";
    echo "Title: <a href='$url'> $title </a> <br>";
    echo "By: ", $row['author'], "<br>";
    echo "Description: ", $row['description'], "<br>";
    echo "Access code: ", $row['access_code'], "<br>";
    echo "<a href='$qr'> QR Code </a> <br><br>";
}
exit();
?>
</div>
</html>
