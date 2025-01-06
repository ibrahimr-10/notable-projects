<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet">
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
        #boxx {
            width: 220px;
        }

        /* Adjust styling for form inputs */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Adjust styling for buttons */
        .a1-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .a1-btn:hover {
            background-color: #2980b9;
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
         <li>Welcome <?php echo $_SESSION['full_name']; ?></li>
          <li><a href="logout.php">Log Out </a></li>
           </ul>

        </div>

        <h3>Change Password</h3>
        <hr />

        <div style="margin-top:2px; margin-bottom:2px;">
            <div style="width:500px; margin:0 auto;">
                <div>
                    <h6>CHANGE PASSWORD</h6>
                </div>
                <form id="form1" name="form1" action="pwd_changed.php" enctype="multipart/form-data" method="POST" class="a1-container">
                    <table width="100%" border="0" align="center">
                        <tr>
                            <td height="35"><table width="100%" border="0" align="center">
                                    <tr>
                                        <td height="35">ID:</td>
                                        <td height="35"><input type="text" id="boxx" name="login_id" readonly value="<?php echo $_SESSION['user_data']; ?>" required/></td>
                                    </tr>

                                    <tr>
                                        <td height="35">LOGIN KEY:</td>
                                        <td height="35"><input type="text" id="boxx" name="login_key" class="form-control" data-rule-required="true" placeholder="Your secret key"></td>
                                    </tr>

                                    <tr>
                                        <td height="35">PASSWORD:</td>
                                        <td height="35"><input type="text" name="pwfield" id="boxx" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Your new password"></td>
                                    </tr>

                                    <tr>
                                        <td height="35">CONFIRM PASSWORD:</td>
                                        <td height="35"><input type="text" name="confirmfield" id="boxx" class="form-control" data-rule-equalto="#pwfield" data-rule-required="true" data-rule-minlength="6" placeholder="Confirm Your new password"></td>
                                    </tr>

                                    <tr>
                                        <td height="35"></td>
                                        <td height="35">
                                            <button type="submit" class="a1-btn a1-blue">SUBMIT</button>
                                            <input class="a1-btn" type="reset" name="reset" id="reset" value="Reset">
                                        </td>
                                    </tr>
                                </table></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>


</body>
</html>



