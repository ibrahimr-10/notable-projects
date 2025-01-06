<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Routines</title>
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

        /* Table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #283747;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

    <h2>Routines</h2>
    <hr>

    <table id="table-1">
        <thead>
        <tr>
            <th>Sl.No</th>
            <th>Routine Name</th>
            <th>Routine Details</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM timetable";
        $result = mysqli_query($con, $query);
        $sno = 1;

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $sno . "</td>";
                echo "<td>" . $row['tname'] . "</td>";
                echo '<td><a href="viewdetailroutine.php?id=' . $row['tid'] . '"><input type="button" value="View Details"></a></td>';
                echo "</tr>";
                $sno++;
            }
        } else {
            echo "<tr><td colspan='3'>No routines found.</td></tr>";
        }
        ?>
        </tbody>
    </table>

</div>

<?php include('footer.php'); ?>

</body>
</html>



										
