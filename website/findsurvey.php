<?php session_start();
include_once 'config.php';
$sql = "SELECT access_code FROM survey ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($connect, $sql);
$rand_code = mysqli_fetch_assoc($result);
?>
<h2> Find Survey </h2>
<form class ="find-survey-form" action="takesurvey.php" method="POST">
<input type="text" name="survey-code" placeholder="Survey Code">
<button type="submit" name="submit">Find Survey</button>
<?php 
echo "<p> Looking for a survey? Try ", $rand_code['access_code'], "</p>"; 

?>
