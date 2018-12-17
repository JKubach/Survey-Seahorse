<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $profile = $user . "'s Profile";
    } else {
    $profile = "Profile";
}
?>

<style>
.navbox{
    margin: 0;
    padding: 10px;
    background-color: lightblue;
}

.nav {
    display: inline;
    overflow: hidden;
    font-family: Arial;
}

.nav a {
    float: left;
    font-size: 16px;
    color: #000;
    background-color: lightblue;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}

.nav a:hover, .drop:hover .dropbtn {
    background-color: blue;
}
</style>
<div class=navbox>
    <div class= nav>
        <a href="index.php" target=""> Home </a>
        <a href="directory.php" target=""> Surveys </a>
        <a href="createsurvey.php" target=""> Create a Survey </a>
        <a href="profile.php" target=""> <?php echo $user; ?>'s Profile </a>
    </div>
    <br><br>
</div>
