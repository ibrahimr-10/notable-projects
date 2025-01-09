<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Change</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body class="login-page login-form">
    <div id="container" class="login-container">
        <div class="login-header">
            <div class="login-content">
                <h2>Reset Your Password</h2>
                <a href="#">
                    <img src="logo1.png" alt="Logo" style="max-width: 100%; height: auto;" />
                </a>
            </div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <form action="password_changed.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="login_id" placeholder="Enter Your Login ID" required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="text" name="login_key" placeholder="Enter Your Secret Key" required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pwfield" id="pwfield" placeholder="Enter New Password" required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmfield" id="confirmfield" placeholder="Confirm New Password" required minlength="6" data-rule-equalto="#pwfield">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnLogin" class="btn">Submit</button>
                        <a href="./index.php"><button type="button" class="btn">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>




