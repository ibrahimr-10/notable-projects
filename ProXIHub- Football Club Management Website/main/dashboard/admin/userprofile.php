<?php
require '../../include/db_conn.php';
page_protect();

if(isset($_POST['submit'])) {
    $usrname = $_POST['login_id'];
    $fulname = $_POST['full_name'];

    $query = "UPDATE admin SET username='$usrname', Full_name='$fulname' WHERE username='{$_SESSION['full_name']}'";

    if(mysqli_query($con, $query)) {
        echo "<script>alert('Profile Change');</script>";
        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
    } else {
        echo "<script>alert('NOT SUCCESSFUL, Check Again');</script>";
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <style>
        /* Header */
        .logo-env {
            background-color: #283747;
            padding: 15px;
            text-align: center;
        }

        .logo-env .logo img {
            width: 150px;
            height: auto;
        }

        /* Sidebar */
        .sidebar-menu {
            background-color: #34495e;
            color: #fff;
        }

        .sidebar-menu a {
            color: #fff;
        }

        .sidebar-menu #main-menu li#routinehassubopen > a {
            background-color: #2b303a;
            color: #ffffff;
        }

        /* Main Content */
        .main-content {
            background-color: #ecf0f1;
            padding: 20px;
        }

        h3 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
   
    <div class="sidebar-menu">
        <header class="logo-env">
            <div class="logo">
                <a href="index.php">
                    <img src="logo1.png" alt="" width="192" height="80" />
                </a>
            </div>
        </header>
        <?php include('nav.php'); ?>
    </div>

    <div class="main-content">
        <div class="row">
                <ul>
                    <li>Welcome <?php echo $_SESSION['full_name']; ?> 
                    </li>                        
                    <li>
                        <a href="logout.php">
                            Log Out
                        </a>
                    </li>
                </ul>
        </div>

        <h3>Edit user profile</h3>
        (You will be need to Login again after updating the profile)
        <hr />

        <div class="a1-container a1-small a1-padding-32" style="margin-top: 20px;">
            <div class="a1-card-8 a1-light-gray" style="width: 600px; margin: 0 auto;">
                <div class="a1-container a1-dark-gray a1-center">
                    <h6>CHANGE PROFILE</h6>
                </div>
                <form id="form1" name="form1" method="post" class="a1-container" action="">
                    <table width="100%" border="0" align="center">
                        <tr>
                            <td height="35"><label for="login_id">ID:</label></td>
                            <td height="35"><input type="text" name="login_id" value="<?php echo $_SESSION['user_data']; ?>" required/></td>
                        </tr>
                        <tr>
                            <td height="35"><label for="full_name">FULL NAME:</label></td>
                            <td height="35"><input type="text" name="full_name" id="full_name" value="<?php echo $_SESSION['username']; ?>" maxlength="25" required></td>
                        </tr>
                        <tr>
                            <td height="35">PASSWORD</td>
                            <td height="35">********* <a href="change_pwd.php">Change password</a> <span>*This is hidden for security reasons.</span></td>
                        </tr>
                        <tr>
                            <td height="35">&nbsp;</td>
                            <td height="35"><input type="submit" name="submit" id="submit" value="SUBMIT" >
                                <input type="reset" name="reset" id="reset" value="Reset"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>
</body>
</html>
