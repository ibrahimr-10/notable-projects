<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Routine Detail</title>
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

        /* Main content */
        .main-content {
            padding: 20px;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
        }

        hr {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #283747;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="sidebar-menu">
    <header class="logo-env">
        <!-- Logo -->
        <div class="logo">
            <a href="main.php">
                <img src="logo1.png" alt="Logo" width="192" height="80">
            </a>
        </div>
    </header>
    <?php include('nav.php'); ?>
</div>

<div class="main-content">
    <div class="row">
        <ul>
            <li>Welcome, <?php echo $_SESSION['full_name']; ?></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <h2>Routine Detail</h2>
    <hr>

    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM timetable WHERE tid=$id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>

    <div id="print">
        <table>
            <tr>
                <td colspan="2">Routine Name: <?php echo $row['tname']; ?></td>
            </tr>
            <tr>
                <td>Monday:</td>
                <td><?php echo $row['day1']; ?></td>
            </tr>
            <tr>
                <td>Tuesday:</td>
                <td><?php echo $row['day2']; ?></td>
            </tr>
            <tr>
                <td>Wednesday:</td>
                <td><?php echo $row['day3']; ?></td>
            </tr>
            <tr>
                <td>Thursday:</td>
                <td><?php echo $row['day4']; ?></td>
            </tr>
            <tr>
                <td>Friday:</td>
                <td><?php echo $row['day5']; ?></td>
            </tr>
            <tr>
                <td>Saturday:</td>
                <td><?php echo $row['day6']; ?></td>
            </tr>
            <tr>
                <td>Sunday:</td>
                <td><?php echo $row['day7']; ?></td>
            </tr>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>



										
