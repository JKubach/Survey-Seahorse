<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
include_once 'config.php';

$sql = "SELECT * FROM survey;";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "Survey ID: ", $row['survey_id'], "<br>";
    echo "Title: ", $row['title'], "<br>";
    echo "By: ", $row['author'], "<br>";
    echo "Description: ", $row['description'], "<br>";
    echo "Access code: ", $row['access_code'], "<br> <br>";
}
exit();
?>
