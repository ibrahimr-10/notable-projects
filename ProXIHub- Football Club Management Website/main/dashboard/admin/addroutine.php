<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Routine</title>
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

        .a1-container {
            max-width: 600px; 
            margin: 20px auto;
            background-color: #ecf0f1; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .a1-container h6 {
            color: #333;
            font-size: 24px; 
            margin-bottom: 20px;
        }

        .a1-container table {
            width: 100%;
            margin-bottom: 20px;
        }

        .a1-container td {
            padding: 10px;
        }

        .a1-container textarea {
            width: calc(100% - 20px);
            height: 100px;
            resize: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .a1-container .a1-light-blue {
            background-color: #ADD8E6;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .a1-container .a1-center h6 {
            margin: 0 auto;
            display: inline-block;
        }

        .a1-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .a1-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="sidebar-menu">
        <header class="logo-env">
            <!-- logo -->
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
            <div></div>
            <div>
                <ul>
                    <li>Welcome <?php echo $_SESSION['full_name']; ?></li>
                    <li>
                        <a href="logout.php">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <h3>Create Routine</h3>
        <hr />
        
        <div class="a1-container">
            <div class="a1-light-blue a1-center">
                <h6>New Routine</h6>
            </div>
            <form id="form1" name="form1" method="post" class="a1-container" action="saveroutine.php">
                <table>
                    <tr>
                        <td>Routine Name:</td>
                        <td><input name="rname" size="30" required/></td>
                    </tr>
                    <tr>
                        <td height="35">Monday:</td>
                        <td><textarea name="day1" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Tuesday:</td>
                        <td><textarea name="day2" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Wednesday:</td>
                        <td><textarea name="day3" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Thurday:</td>
                        <td><textarea name="day4" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Friday:</td>
                        <td><textarea name="day5" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Saturday:</td>
                        <td><textarea name="day6" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">Sunday:</td>
                        <td><textarea name="day7" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><input class="a1-btn" type="submit" name="submit" id="submit" value="Add Routine">
                            <input class="a1-btn" type="reset" name="reset" id="reset" value="Reset"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>   

<?php include('footer.php'); ?>
</body>
</html>



				
