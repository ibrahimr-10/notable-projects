<?php
session_start();
if(isset($_SESSION["user_data"])) {
    header("location: ./dashboard/admin/");
    exit; // Make sure to exit after redirecting
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>

<body class="login-page">
    <div id="container">
        <div class="login-container">
            <div class="login-header">
                <div class="login-content">
                    <a href="#" class="logo">
                        <img src="logo1.png" alt="Logo" style="max-width: 100%; height: auto;" />
                    </a>
                </div>
                <p class="description">Enter your details to log in to the admin area</p>
            </div>
        </div>
        <div class="login-form">
            <form action="login.php" method="post" id="bb">
                <div class="form-group">
                    <input type="text" placeholder="User ID" name="user_id_auth" id="textfield">
                </div>
                <div class="form-group">
                    <input type="password" name="pass_key" id="pwfield" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" name="btnLogin" class="btn">Log in</button>
                </div>
            </form>
            <div>
                <a href="forgot_password.php" class="link">Forgot your password?</a>
            </div>
        </div>
    </div>
</body>
</html>

