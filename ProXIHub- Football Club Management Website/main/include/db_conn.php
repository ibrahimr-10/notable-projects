<?php
$host = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "proxihub";

// Create a new mysqli object with database connection parameters
$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
?>

<?php
function page_protect()
{
    session_start();
    
    /* Secure against Session Hijacking by checking user agent */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            redirectToLogin();
        }
    }
    
    /* If session not set, check for cookies set by Remember me */
    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
        session_destroy();
        redirectToLogin();
    }
}

function redirectToLogin() {
    echo "<meta http-equiv='refresh' content='0; url=../login/'>";
    exit();
}
?>
