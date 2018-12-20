<?php
if(isset($_POST['reset'])){
    include_once 'session.php';
    include '../config.php';

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = mysqli_real_escape_string($connect, $_POST['newPass']);
    $confirmPass = mysqli_real_escape_string($connect, $_POST['confirmPass']);

    if($pass == $confirmPass){
        $hashPass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password='$hashPass' WHERE email= '$email';";
        mysqli_query($connect, $sql) or die (mysqli_error($connect));
        header("Location: ../login.php");
    }
}
