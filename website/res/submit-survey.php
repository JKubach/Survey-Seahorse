<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include_once '../config.php';

if (isset($_POST['answers'])) {
    $answers = array();
    $answers = $_POST['answers'];
    $user = $_SESSION['uid'];
    $survey_id = $_SESSION['sid'];

    echo '<link rel="stylesheet" href="style.css">';
    echo  '<div class="submit-survey">';

    if (isset($_POST['numeric'])) {
        $type = 48;
        for($counter = 0; $counter < sizeof($answers); $counter++) {
            $questionNum = $counter+1;
            $q = $answers[$counter];
            $sql = "INSERT INTO answer_numeric (user_id, survey_id, question_number, answer)
                VALUES ('$user', '$survey_id', $counter + 1, $q);";
            mysqli_query($connect, $sql) or die(mysqli_error($connect));

            $getsql = "SELECT question_content from question where survey_id=$survey_id and question_number=$counter+1;";
            $result = mysqli_query($connect, $getsql);
            $question = mysqli_fetch_assoc($result);

            $getAnswer = "SELECT answer, count(answer) AS num_ans FROM answer_numeric WHERE (survey_id=$survey_id AND question_number=$counter+1) GROUP BY answer ORDER BY num_ans DESC LIMIT 1;";
            $ansresult = mysqli_query($connect, $getAnswer);
            $ans = mysqli_fetch_assoc($ansresult); 
            echo "For Question #", $counter+1, ": ", $question['question_content'], ", you answered: ", $answers[$counter], "<br>";
            echo "Most people answered: ", $ans['answer'], "<br>";
            //echo "<a href='query.php?question=$questionNum&sid=$survey_id'> More Details </a> <br> <br>";
            echo "<a href='script/chart.php?question=$questionNum&sid=$survey_id&type=$type'> More Details </a> <br> <br>";

        }
        echo "<a href='../index.php'> Home </a>";
        exit();
    } elseif (isset($_POST['bool'])) {
        for($counter = 0; $counter < sizeof($answers); $counter++) {
            $type = 49;
            $questionNum = $counter+1;
            $q = $answers[$counter];
            $sql = "INSERT INTO answer_bool (user_id, survey_id, question_number, answer)
                VALUES ('$user', '$survey_id', $counter + 1, '$q');";
            mysqli_query($connect, $sql) or die(mysqli_error($connect));

            $getsql = "SELECT question_content from question where survey_id=$survey_id and question_number=$counter+1;";
            $result = mysqli_query($connect, $getsql);
            $question = mysqli_fetch_assoc($result);

            $getAnswer = "SELECT answer, count(answer) AS num_ans FROM answer_bool WHERE (survey_id=$survey_id AND question_number=$counter+1) GROUP BY answer ORDER BY num_ans DESC LIMIT 1;";
            $ansresult = mysqli_query($connect, $getAnswer);
            $ans = mysqli_fetch_assoc($ansresult); 
            echo "For Question #", $counter+1, ": ", $question['question_content'], ", you answered: ", $answers[$counter], "<br>";
            echo "Most people answered: ", $ans['answer'], "<br>";
            //echo "<a href='query.php?question=$questionNum&sid=$survey_id'> More Details </a> <br> <br>";
            echo "<a href='script/chart.php?question=$questionNum&sid=$survey_id&type=$type'> More Details </a> <br> <br>";

        }
        echo "<a href='../index.php'> Home </a>";
        exit();

    } elseif(isset($_POST['text'])) {
        for($counter = 0; $counter < sizeof($answers); $counter++)
        {
            $questionNum = $counter+1;
            $q = $answers[$counter];
            $sql = "INSERT INTO answer_text (user_id, survey_id, question_number, answer)
                VALUES ('$user', '$survey_id', $counter + 1, $q);";
            mysqli_query($connect, $sql) or die(mysqli_error($connect));

            $getsql = "SELECT question_content from question where survey_id=$survey_id and question_number=$counter+1;";
            $result = mysqli_query($connect, $getsql);
            $question = mysqli_fetch_assoc($result);

            echo "For Question #", $counter+1, ": ", $question['question_content'], ", you answered: ", $answers[$counter], "<br>";
        }
        echo "<a href='../index.php'> Home </a>";
        exit();

    }
} else {
    header("Location: res/nope.php");
    exit();
}
?>
