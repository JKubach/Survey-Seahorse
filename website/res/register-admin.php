<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if (isset($_POST['admin'])) {
    include_once '../config.php';
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($email) || empty($username) || empty($password)) {
        header("Location: ../controlpanel.php?signup=empty");
        exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../controlpanel.php?signup=email");
         exit();
       } else {
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($connect, $sql);
            $check = mysqli_num_rows($result);
            
            if ($check > 0) {
                header("Location: ../controlpanel.php?signup=email");
                exit();
            } else {
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO user (email, username, password, admin,
                    registration_date) 
                VALUES ('$email', '$username', '$hashPass', b'1', '$date');";

                mysqli_query($connect, $sql) or die(mysqli_error($connect));
                header("Location: ../controlpanel.php?signup=success");
                exit();
            }
       }
    }

} else {
    header("Location: ../profile.php");
    exit();
}
?>
