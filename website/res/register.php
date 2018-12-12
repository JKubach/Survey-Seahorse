<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if (isset($_POST['submit'])) {
    include_once '../config.php';
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($email) || empty($username) || empty($password)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?signup=email");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($connect, $sql);
            $check = mysqli_num_rows($result);

            if ($check > 0) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO user (email, username, password, 
                    registration_date) 
                    VALUES ('$email', '$username', '$hashPass', '$date');";

                mysqli_query($connect, $sql);
/*
                $to      = $email; // Send email to our user
                $subject = 'Signup | Verification'; // Give the email a subject
                $message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$username.'
Password: '.$password.'
------------------------

Please click this link to activate your account:
http://www.surveyseahorse.com/verify.php?email='.$email.'&hash='.$hash.'

';

$headers = 'From:noreply@surveyseahorse.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
 */

                // header("Location: ../signup.php?signup=success");
                header("Location: ../index.php");
                exit();
            }
        }
    }

} else {
    header("Location: ../profile.php");
    exit();
}
?>
