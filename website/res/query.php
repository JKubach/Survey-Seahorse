<?php
include_once '../config.php';
header('Content-Type: application/json');
$question = $_GET['question'];
$sid = $_GET['sid'];
$query = sprintf("SELECT question_number, answer, count(answer) AS num_ans FROM answer_numeric WHERE (survey_id=$sid AND question_number=$question) GROUP BY answer ORDER BY answer;");

$result = $connect->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$result->close();
$connect->close();
print json_encode($data);

