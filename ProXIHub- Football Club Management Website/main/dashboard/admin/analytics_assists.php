<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assist Analytics</title>
    <meta charset="UTF-8">
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

        /* Center form */
        .center-form {
            text-align: center;
            margin-top: 50px; 
        }

        /* Section styling */
        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            margin-bottom: 10px;
        }

        /* New Styles */
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

        .section h3 {
            color: #34495e;
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
                <li>
                    <a href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>

        <div class="section">
            <h3>Graphs</h3>
            <div>
                <!-- Button to view most Assists by player -->
                <button onclick="window.location.href='most_assists.php'">Most Assists by Player</button>
                <p>View the graph displaying the players with the highest number of Assists.</p>
            </div>
            <div>
                <!-- Button to view assists per gameweek -->
                <button onclick="window.location.href='assists_per_gameweek.php'">Assists per Gameweek</button>
                <p>View the graph showing the distribution of assists across different gameweeks.</p>
            </div>
            <div>
                <!-- Button to view minutes per assists -->
                <button onclick="window.location.href='mins_per_assist.php'">Minutes per Assist</button>
                <p>View the graph depicting the average time each player takes to make an Assist.</p>
            </div>
        </div>
    </div>
</body>
</html>

