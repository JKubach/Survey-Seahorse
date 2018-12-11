<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

session_start();
include_once 'config.php';

$block = $_SESSION['blocked'];
$code = mysqli_real_escape_string($connect, $_POST['survey-code']);

if (empty($code)) {
    header("Location: ../findsurvey.php?find=error");
    exit();
} else {
    $sql = "SELECT * FROM survey WHERE access_code='$code'";
    $result = mysqli_query($connect, $sql);
    $check = mysqli_num_rows($result);

    if ($check < 1) {
        header("Location: ../findsurvey.php?find=error");
        exit();
    } elseif ($block == 50 || $block == 51) {
        header("Location: res/nope.php");
        exit();
    }else {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sid'] = $row['survey_id'];
        $sid = $row['survey_id'];
        $title = $row['title'];
        $number_questions = $row['number_questions'];

        echo "<form method = 'POST' action = 'res/submit-survey.php'>";
        echo  "<h1> $title </h1> <br>";
        for($counter = 0; $counter < $number_questions; $counter++)
        {
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
            // echo "<input type='range' name = 'answers[]' min='1' max='10' value='5' step='1' class='slider' id='answerSlide'> <br>";
            echo "<p> <span id='demo'</span> </p>";
        }
        echo "<input type = 'submit' value = 'SEND'/>";
        echo "</form>";
    }
}


?>
<script>
var slider = document.getElementById("answerSlide");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
}
</script>
