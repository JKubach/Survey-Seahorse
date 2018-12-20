<html>
<?php
include_once 'res/session.php';
include 'res/navbar.php';

echo '<link rel="stylesheet" href="res/style.css">';
echo '<h2> Enter the questions for your survey </h2>';

if (isset($_SESSION['questions'])) {
    $questions = $_SESSION['questions'];
    echo "<form class='question-form' method = 'POST' action = 'res/submit-questions.php'>";
    for($counter = 0; $counter < $questions; $counter++) {
        $questionNum = $counter + 1;
        echo "<input type = 'text' name = 'questions[]' class = 'questions' placeholder='Question $questionNum' /><br/>";
    }
    echo "<input type = 'submit' value = 'SEND'/>";
    echo "</form>";
} else {
    header("Location: res/nope.php");
    exit();
}
?>
</html>
