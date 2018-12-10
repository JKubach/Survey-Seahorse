<html>
<h2> Create Survey </h2>
<form class="create-survey-form" action="res/new-survey.php" method="POST">

<input type="text" name="title" placeholder="My Amazing Survey"> <br>
<input type="text" name="description" placeholder="A great survey"> <br>
<input type="radio" name="type" value="00"> Numeric (1 - 10) <br>
<input type="radio" name="type" value="01"> Yes / No <br>
<input type="radio" name="type" value="10"> Text <br>
<input type="text" name="number" placeholder="5"> <br>
<input type="date" name="expire">
<input type="radio" name="once" value="1"> one shot <br>
<input type="radio" name="once" value="0" checked> multi

<button type="submit" name="submit">Create Survey</button>

</form>
</html>
