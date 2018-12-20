<?php
include_once 'session.php';
include_once '../config.php';

$questions = array();
$survey_id = $_SESSION['sid'];
$questions = $_POST['questions'];

for($counter = 0; $counter < sizeof($questions); $counter++)
{
    $q = $questions[$counter];

    if (empty($q)) {
        header("Location: ../questions.php?err=notcomplete");
        exit();
    }
}

for($counter = 0; $counter < sizeof($questions); $counter++){
    $q = mysqli_real_escape_string($connect, $questions[$counter]);
    echo "Question #".($counter + 1).": ".$questions[$counter]."<br />";
    $sql = "INSERT INTO question (survey_id, question_number, question_content)
        VALUES ('$survey_id', $counter + 1, '$q');";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
}


unset($_SESSION["questions"]);
header("Location: ../success.php");
exit();
?>
