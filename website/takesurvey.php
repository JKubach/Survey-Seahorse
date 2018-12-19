<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("location: login.php?user=notloggedin");
    exit; 
}

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

ini_set('session.cache_limiter','public');
session_cache_limiter(false);

include_once 'config.php';
include 'res/navbar.php';

$uid = $_SESSION['uid'];

if (empty($_GET)) {
    $code = mysqli_real_escape_string($connect, $_POST['survey-code']);
    $sql = "SELECT * FROM survey WHERE access_code='$code'";
} else {
    $code = mysqli_real_escape_string($connect, $_GET['sid']);
    $sql = "SELECT * FROM survey WHERE survey_id ='$code'";
}

if (empty($code)) {
    header("Location: ../findsurvey.php?find=error");
    exit();
} elseif (empty($uid)) {
    header("Location: login.php?sid=" . $_GET['sid']);
} else {
    //    $sql = "SELECT * FROM survey WHERE access_code='$code'";
    $result = mysqli_query($connect, $sql);
    $check = mysqli_num_rows($result);

    $block = $_SESSION['blocked'];

    if ($check < 1) {
        header("Location: ../findsurvey.php?find=error");
        exit();
    } elseif ($block == 50 || $block == 51) {
        header("Location: res/nope.php");
        exit();
    }else {
        echo '<link rel="stylesheet" href="res/style.css">';
        echo  '<div class="take-survey">';
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sid'] = $row['survey_id'];
        $sid = $row['survey_id'];
        $title = $row['title'];
        $number_questions = $row['number_questions'];
        $type = ord($row['type']);
        $one_shot = ord($row['one_shot']);

        if ($one_shot == 49) {
            if ($type == 48) {
                $sql = "SELECT user_id FROM answer_numeric WHERE user_id=$uid AND survey_id=$sid;";
            } elseif ($type == 49) {
                $sql = "SELECT user_id FROM answer_bool WHERE user_id=$uid AND survey_id=$sid;";
            } elseif ($type == 50) {
                $sql = "SELECT user_id FROM answer_text WHERE user_id=$uid AND survey_id=$sid;";
            }
            $result = mysqli_query($connect, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                header("Location: res/nope.php");
                exit();
            }
        }

        echo "<form method = 'POST' action = 'res/submit-survey.php'>";
        echo  "<h1> $title </h1> <br>";

        if ($type == 48) {
            for($counter = 0; $counter < $number_questions; $counter++) {
                $sql = "SELECT question_content FROM question WHERE survey_id=$sid and question_number=$counter+1;";
                $result = mysqli_query($connect, $sql);
                $q = mysqli_fetch_assoc($result);
                echo  $q['question_content'], "<br>";
                echo " <select name = 'answers[]'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option selected='selected' value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                    </select> ";
                echo "<p> <span id='demo'</span> </p>";
            }
            echo "<button name ='numeric' type = 'submit' value = 'Submit'/>";
        } elseif ($type == 49) {
            for($counter = 0; $counter < $number_questions; $counter++) {
                $sql = "SELECT question_content FROM question WHERE survey_id=$sid and question_number=$counter+1;";
                $result = mysqli_query($connect, $sql);
                $q = mysqli_fetch_assoc($result);
                echo  $q['question_content'], "<br>";
                echo " <select name = 'answers[]'>
                    <option selected = 'selected' value='Yes'>Yes</option>
                    <option value='No'>No</option>
                    </select> ";
                echo "<p> <span id='demo'</span> </p>";
            }
            echo "<button name ='bool' type = 'submit' value = 'Submit'/>";
        } elseif ($type == 50) {
            for($counter = 0; $counter < $number_questions; $counter++) {
                $sql = "SELECT question_content FROM question WHERE survey_id=$sid and question_number=$counter+1;";
                $result = mysqli_query($connect, $sql);
                $q = mysqli_fetch_assoc($result);
                echo  $q['question_content'], "<br> <br>";
                echo " <form name = 'answers[]'>
                    <input type = 'text' placeholder = 'Answer'></input>
                    </form> ";
                echo "<p> <span id='demo'</span> </p>";
            }
            echo "<button name ='text' type = 'submit' value = 'Submit'/>";
        }
        echo "</form>";
    }
}
?>
