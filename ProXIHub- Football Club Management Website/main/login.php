<?php
include './include/db_conn.php';

// Retrieve username from form
$user_id_auth = isset($_POST['user_id_auth']) ? $_POST['user_id_auth'] : '';

// Retrieve password from form
$pass_key = isset($_POST['pass_key']) ? $_POST['pass_key'] : '';

// Trim whitespace from inputs
$user_id_auth = trim($user_id_auth);
$pass_key = trim($pass_key);

// Check if username and password are empty
if ($pass_key == "" && $user_id_auth == "") {
    echo "<head><script>alert('Username and Password can be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else if ($pass_key == "") {
    echo "<head><script>alert('Password can be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else if ($user_id_auth == "") {
    echo "<head><script>alert('Username can be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {
    // Escape special characters in username and password
    $user_id_auth = mysqli_real_escape_string($con, $user_id_auth);
    $pass_key = mysqli_real_escape_string($con, $pass_key);

    // Construct SQL query
    $sql = "SELECT * FROM admin WHERE username='$user_id_auth' AND password='$pass_key'";

    // Execute query
    $result = mysqli_query($con, $sql);

    // Check if a row was returned
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);
        session_start();
        // Store session data
        $_SESSION['user_data'] = $user_id_auth;
        $_SESSION['logged'] = "start";
        $_SESSION['full_name'] = $user_id_auth;
        $_SESSION['username'] = $row['Full_name'];
        header("location: ./dashboard/admin/");
    } else {
        // Invalid username or password
        include 'index.php';
        echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
    }
}
?>
