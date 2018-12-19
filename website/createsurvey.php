<?php include 'res/navbar.php';

session_start();
    if(!isset($_SESSION['uid'])){
        header("location: login.php?user=notloggedin");
        exit;
    }
    ?>
<html>
<!-- <link rel="stylesheet" href="res/style.css"> -->
<h2> Create A New Survey </h2>
<form class="create-survey-form" action="res/new-survey.php" method="POST">

<p> Title & Description </p> 
<input type="text" name="title" placeholder="My Amazing Survey"> <br>
<input type="text" name="description" placeholder="This is a great survey"> <br>

<p> Answer Type </p>
 <input type="radio" name="type" value="00"> Numeric (1 - 10) <br>
<input type="radio" name="type" value="01"> Yes / No <br>
<!-- <input type="radio" name="type" value="10"> Text <br> -->

<p> Number of Questions </p>
<input type="text" name="number" placeholder="5"> <br>

<p> Expiration Date </p>
<input type="date" name="expire"> <br>
 <p> Can a user take this survey more than once? </p>
<input type="radio" name="once" value="0" checked> Yes <br>
<input type="radio" name="once" value="1"> No <br>

<button type="submit" name="submit">Create Survey</button>
 
</form>
</html>
