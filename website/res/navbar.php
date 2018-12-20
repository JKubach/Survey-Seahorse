<?php
include_once 'config.php';

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $profile = $user . "'s Profile";
    } else {
    $profile = "Profile";
}

$sql = "SELECT survey_id FROM survey ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$feelinLucky = mysqli_fetch_assoc($result);
$luckyUrl = "takesurvey.php?sid=" . $feelinLucky['survey_id'];
?>

<style>
.navbox{
    border-radius: 25px;
    margin: 0;
    padding: 10px;
    background-color: #40e0d0;
}

.nav {
    display: inline;
    overflow: hidden;
    font-family: Arial;
}

.nav a {
    border-radius: 25px;
    float: left;
    font-size: 16px;
    color: #000;
    background-color: #40e0d0;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}

.nav a:hover, .drop:hover .dropbtn {
    background-color: #31b6a8;
}
</style>
<div class=navbox>
    <div class= nav>
        <a href="index.php" target=""> Home </a>
        <a href="directory.php" target=""> Surveys </a>
        <a href="createsurvey.php" target=""> Create a Survey </a>
        <a href="profile.php" target=""> <?php echo $profile; ?> </a>
        <a href="<?php echo $luckyUrl?>" target=""> Feeling Lucky? </a>
        <a href="findsurvey.php" target=""> Search for a Survey</a>
    </div>
    <br><br>
</div>
