<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
session_start();
include_once '../config.php';
$answers = array();

$user = $_SESSION['uid'];
$survey_id = $_SESSION['sid'];
$answers = $_POST['answers'];

for($counter = 0; $counter < sizeof($answers); $counter++)
{
    $q = $answers[$counter];
    echo "Answer #".($counter + 1).": ".$answers[$counter]."<br />";
    $sql = "INSERT INTO answer_numeric (user_id, survey_id, question_number, answer)
        VALUES ('$user', '$survey_id', $counter + 1, $q);";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));

    $getsql = "SELECT question_content from question where survey_id=$survey_id and question_number=$counter+1;";
    $result = mysqli_query($connect, $getsql);
    $question = mysqli_fetch_assoc($result);
    echo "For Question: ", $question['question_content'], ", you answered: ", $answers[$counter], "<br>";

}
    echo "<a href='../index.php'> Home </a>";
exit();
?>
