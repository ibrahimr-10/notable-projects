<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Routine</title>
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
                    <li>
                        <a href="logout.php">Log Out</a>
                    </li>
                </ul>
        </div>

        <h2>Routine Detail</h2>
        <hr/>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM timetable WHERE tid=$id";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        }
        ?>

        
            <div style="width: 600px; margin: 0 auto; margin-top: 20px;">
                <div>
                    <h6>EDIT ROUTINE</h6>
                </div>
                <form id="form1" name="form1" method="post" class="a1-container" action="updateroutine.php">
                    <table width="100%" border="0">
                        <tr>
                            <td><input type="hidden" name="tid" value="<?php echo $id; ?>"></td>
                        </tr>
                        <tr>
                            <td>Routine Name:</td>
                            <td colspan="2"><input type="text" name="routinename" value="<?php echo $row['tname']; ?>"></td>
                        </tr>
                        <?php
                        $days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
                        foreach ($days as $key => $day) {
                            $fieldName = 'day' . ($key + 1);
                        ?>
                            <tr>
                                <td><?php echo $day; ?>:</td>
                                <td><textarea style="resize:none; margin: 0; width: 230px; height: 53px;" name="<?php echo $fieldName; ?>"><?php echo $row[$fieldName]; ?></textarea></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <input class="a1-btn" type="submit" name="submit" id="submit" value="Update">
                                <input class="a1-btn" type="reset" name="reset" id="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        
    </div>

<?php include('footer.php'); ?>
</body>
</html>



										

