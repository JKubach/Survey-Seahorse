<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include_once '../config.php';
	$questions = array();
	
    $survey_id = $_SESSION['sid'];
	$questions = $_POST['questions'];
	
	for($counter = 0; $counter < sizeof($questions); $counter++)
	{
        $q = $questions[$counter];
		echo "Question #".($counter + 1).": ".$questions[$counter]."<br />";
        $sql = "INSERT INTO question (survey_id, question_number, question_content)
                VALUES ('$survey_id', $counter + 1, '$q');";
        mysqli_query($connect, $sql) or die(mysqli_error($connect));

    }
        unset($_SESSION["questions"]);
        header("Location: ../success.php");
        exit();
?>
