<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

session_start();

if (isset($_POST['delete-survey'])) {
    include_once '../config.php';

    $code = mysqli_real_escape_string($connect, $_POST['survey-code']);
    if (empty($code)) {
        header("Location: ../controlpanel.php?item=empty");
        exit();
    } else {
        echo "Survey ", $code, " deleted ";
        echo "<a href = '../controlpanel.php'> Control Panel </a>";
        $sql ="SELECT * FROM survey WHERE access_code='$code';";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $sid = $row['survey_id'];
        $deleteAnswers ="DELETE FROM answer_numeric WHERE survey_id=$sid;";
        $deleteQuestions ="DELETE FROM question WHERE survey_id=$sid;";
        $deleteSurvey ="DELETE FROM survey WHERE survey_id=$sid;";

        mysqli_query($connect, $deleteAnswers) or die(mysqli_error($connect));
        mysqli_query($connect, $deleteQuestions) or die(mysqli_error($connect));
        mysqli_query($connect, $deleteSurvey) or die(mysqli_error($connect));
        exit();
    }
}
?>

