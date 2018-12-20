<?php 
include_once 'res/session.php';
include 'res/navbar.php';

$block = $_SESSION['blocked'];

if(!isset($_SESSION['uid'])){
    header("location: login.php?user=notloggedin");
    exit;
} elseif ($block == 49 || $block == 50 || $block == 51) {
    header("location: res/nope.php");
    exit;
}
?>

<html>
    <link rel="stylesheet" href="res/style.css">
<!-- <link rel="stylesheet" href="res/style.css"> -->

<form class="create-survey-form" action="res/new-survey.php" method="POST">
<h2> Create A New Survey </h2>
<p> Title & Description </p> 
<input type="text" name="title" placeholder="My Amazing Survey"> <br>
<input type="text" name="description" placeholder="This is a great survey"> <br>

<p> Answer Type </p>
 <input type="radio" checked="checked"  name="type" value="00"> Numeric (1 - 10) <br>
<input type="radio" name="type" value="01"> Yes / No <br>
<!-- <input type="radio" name="type" value="10"> Text <br> -->
<!-- <input type="radio" name="type" value="11"> Custom <br> -->

<p> Number of Questions (1-10)</p>
<input type="number" name="number" placeholder="5" min="1" max="10"> <br>

<p> Expiration Date </p>
<?php
$next_week = date("Y-m-d", strtotime("+1 week"));
echo "<input type='date' value = '$next_week' name='expire'> <br>";
?>
 <p> Can a user take this survey more than once? </p>
<input type="radio" name="once" value="0" checked> Yes <br>
<input type="radio" name="once" value="1"> No <br>

<button type="submit" name="submit">Create Survey</button>

</form>
</html>
