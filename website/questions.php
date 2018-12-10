<?php
session_start();

$questions = $_SESSION['questions'];
	echo "<form method = 'POST' action = 'res/submit-questions.php'>";
	for($counter = 0; $counter < $questions; $counter++)
	{
		echo "<input type = 'text' name = 'questions[]' class = 'questions'/><br/>";
	}
	echo "<input type = 'submit' value = 'SEND'/>";
	echo "</form>";
?>
