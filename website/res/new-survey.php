<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

session_start();

if (isset($_POST['submit'])) {
    include_once '../config.php';

    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $type = mysqli_real_escape_string($connect, $_POST['type']);
    $number_questions = mysqli_real_escape_string($connect, $_POST['number']);
    $expire_date = mysqli_real_escape_string($connect, $_POST['expire']);
    $one_shot = mysqli_real_escape_string($connect, $_POST['once']);

    $uid = $_SESSION['uid'];
    $user = $_SESSION['username'];

    if (empty($title)) {
        header("Location: ../createsurvey.php?item=empty");
        exit();
    } else {
        $adj_file = file("txt/adjectives.txt");
        $adj_name = $adj_file[array_rand($adj_file)];
        $adj = str_replace("\n", "", $adj_name);
        $creature_file = file("txt/creatures.txt");
        $creature_name = $creature_file[array_rand($creature_file)];
        $creature = str_replace("\n", "", $creature_name);
        $code = $adj." ".$creature;
        $sql_expire = date("Y-m-d", strtotime($expire_date));
        $date = date("Y-m-d");
        $sql = "INSERT INTO survey (user_id, access_code, title, author, description, 
            type, number_questions, creation_date, expiration_date, 
            one_shot)
            VALUES ($uid, '$code', '$title', '$user', '$description', 
            $type, '$number_questions', '$date', '$sql_expire', 
            $one_shot);";

        mysqli_query($connect, $sql) or die(mysqli_error($connect));

        $sql ="SELECT * FROM survey WHERE access_code='$code'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['sid'] = $row['survey_id'];
        $_SESSION['code'] = $row['access_code'];
        $_SESSION['title'] = $row['title'];
        $_SESSION['description'] = $row['description'];
        $_SESSION['questions'] = $row['number_questions'];
        header("Location: ../questions.php");
        exit();
    }
}

?>
