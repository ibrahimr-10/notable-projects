<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Lineup</title>
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

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* Content styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .main-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin: 20px;
        }

        .section {
            margin-bottom: 20px;
        }


        .section div {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .section button {
            background-color: #34495e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .section button:hover {
            background-color: #283747;
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
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>

        <h1>View Lineup</h1>
        <?php
        // Include database connection
        require_once '../../include/db_conn.php';

        // Query to select all rows from the lineups table
        $query = "SELECT * FROM lineups";
        $result = mysqli_query($con, $query);

        // Check if there are any rows in the result set
        if (mysqli_num_rows($result) > 0) {
            // Display table header
            echo "<table>";
            echo "<tr><th>id</th><th>Goalkeeper</th><th>Defender 1</th><th>Defender 2</th><th>Defender 3</th><th>Defender 4</th><th>Midfielder 1</th><th>Midfielder 2</th><th>Midfielder 3</th><th>Forward 1</th><th>Forward 2</th><th>Forward 3</th></tr>";

            // Display data rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['goalkeeper']}</td>";
                echo "<td>{$row['defender1']}</td>";
                echo "<td>{$row['defender2']}</td>";
                echo "<td>{$row['defender3']}</td>";
                echo "<td>{$row['defender4']}</td>";
                echo "<td>{$row['midfielder1']}</td>";
                echo "<td>{$row['midfielder2']}</td>";
                echo "<td>{$row['midfielder3']}</td>";
                echo "<td>{$row['forward1']}</td>";
                echo "<td>{$row['forward2']}</td>";
                echo "<td>{$row['forward3']}</td>";
                echo "</tr>";
            }

            // Close table
            echo "</table>";
        } else {
            echo "No lineup data available.";
        }

        // Close database connection
        mysqli_close($con);
        ?>
    </div>
</body>
</html>

