<?php

if (isset($_POST['submit'])) {
    include_once 'session.php';
    include '../config.php';

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?login=error");
        exit();

    } else {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($connect, $sql);
        $check = mysqli_num_rows($result);

        if ($check < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                $checkHash = password_verify($password, $row['password']);
                if ($checkHash == false) {
                    header("Location: ../index.php?login=errorpass");
                    exit();
                } elseif ($checkHash == true) {
                    $_SESSION['uid'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['date'] = $row['registration_date'];
                    $_SESSION['blocked'] = ord($row['blocked']);
                    $sid = $_SESSION['login-sid'];
                    if (empty($_SESSION['login-sid'])) {
                        header("Location: ../index.php?login=success");
                        exit();
                    } else {
                        //unset($_SESSION['login-sid']);
                        //header("Location: ../takesurvey.php?sid=" . $sid);
                        header("Location: ../takesurvey.php?sid=" . $sid);
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();

}

?>
