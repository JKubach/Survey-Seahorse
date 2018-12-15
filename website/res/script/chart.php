<!DOCTYPE html>
<html>
    <head>
    <title>Question <?php echo $_GET['question'] ?> Details</title>
        <style type="text/css">
#chart-container {
    width: 800px;
    height: auto;
}
        </style>
    </head>
    <body>
        <center>
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);   
include '../../config.php';
$question = $_GET['question'];
$sid = $_GET['sid'];
$sql = "SELECT question_content FROM question WHERE (survey_id=$sid AND question_number=$question);";
$result = mysqli_query($connect, $sql);
$title = mysqli_fetch_assoc($result)['question_content'];

echo $title;
?>

            <div id="chart-container">
                <canvas id="mycanvas"></canvas>
            </div>
<br> <br>
<input type="button"
  onClick="window.print()"
  value="Print This Page"/>

            <!-- javascript -->
            <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="Chart.min.js"></script>
            <script type="text/javascript" src="app.js"></script>
        </center>
    </body>
</html>
