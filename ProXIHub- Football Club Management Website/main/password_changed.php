<?php
// include 'index.php';
include './include/db_conn.php';

$key          = rtrim($_POST['login_key']);
$pass         = rtrim($_POST['pwfield']);
$user_id_auth = rtrim($_POST['login_id']);
$passconfirm  = rtrim($_POST['confirmfield']);

if($pass != $passconfirm){
    echoAlertAndRedirect('Confirm Password Mismatch', 'forgot_password.php');
    exit();
}

if (!isset($user_id_auth, $pass, $key)) {
    echoAlertAndRedirect('Change Unsuccessful', 'index.php');
    exit();
}

$sql    = "SELECT * FROM admin WHERE username='$user_id_auth' and securekey='$key'";
$result = mysqli_query($con, $sql);
$count  = mysqli_num_rows($result);

if ($count != 1) {
    echoAlertAndRedirect('Change Unsuccessful', 'index.php');
    exit();
}

mysqli_query($con, "UPDATE admin SET password='$pass' WHERE username='$user_id_auth'");
echoAlertAndRedirect('Password has been updated, Login Again', 'index.php');

function echoAlertAndRedirect($message, $url) {
    echo "<html><head><script>alert('$message');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=$url'>";
}
?>

