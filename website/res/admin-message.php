<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

if (!empty($_POST['message'])) {
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $var_str = var_export($message, true);
    $var = "<?php\n\n\$message = $var_str;\n\n\$uid = $uid;\n\n\$user = '$username';\n\n?>";
    file_put_contents("txt/msg.php",$var);
    header("Location: ../controlpanel.php?msg=success");
} elseif (isset($_POST['remove'])) {
    file_put_contents("txt/msg.php","");
    header("Location: ../controlpanel.php?msg=success");
} else {
    header("Location: ../controlpanel.php?err=nomsg");
}

