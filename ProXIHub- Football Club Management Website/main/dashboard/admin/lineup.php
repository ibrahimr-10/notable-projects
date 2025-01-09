<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Lineup</title>
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


    /* Form styles */
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    select {
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 10px 20px;
      background-color: #4CAF50; /* Green */
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      box-sizing: border-box;
    }

    /* Formation styles */
    .formation {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap; /* Allow elements to wrap on smaller screens */
      width: 80%; /* Adjust width as needed */
      margin: 0 auto; /* Center the form horizontally */
    }

    .formation > div {
      flex: 0 0 30%; /* Set a minimum width for each element */
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Merge with the second code snippet styles */

    /* New Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
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

    .section h3 {
        margin-bottom: 10px;
        color: #34495e; /* Adjusted color */
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
                    <a href="dashboard.php">
                        <img src="logo1.png" alt="" width="192" height="80" />
                    </a>
                </div>

            </header>
            <?php include('nav.php'); ?>
        </div>
        <div class="main-content">
            <div class="row">
                <div>
                    <ul>
                        <li>Welcome <?php echo $_SESSION['full_name']; ?></li>
                        <li><a href="logout.php">Log Out </a></li>
                    </ul>
                </div>
            </div>
    <h1>Team Lineup</h1>
    <form action="submit_lineup.php" method="post">
        <div class="formation">
            <div>
                <h2>Goalkeeper</h2>
                <select name="goalkeeper">
                    <option value="">Select Goalkeeper</option>
                    <!-- PHP code to fetch usernames from the users table -->
                    <?php
                    require_once '../../include/db_conn.php';

                    // Array to store selected players for each position
                    $selectedPlayers = array();

                    // Query to fetch all usernames from the users table
                    $query = "SELECT username FROM users";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $username = $row['username'];
                        if (!in_array($username, $selectedPlayers)) {
                            echo "<option value='{$username}'>{$username}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <!-- Repeat similar logic for other positions -->
            <?php
            // Positions and their respective counts
            $positions = array(
                "Defender" => 4,
                "Midfielder" => 3,
                "Forward" => 3
            );

            foreach ($positions as $position => $count) {
                echo "<div>";
                echo "<h2>{$position}s</h2>";
                for ($i = 1; $i <= $count; $i++) {
                    echo "<select name='{$position}{$i}'>";
                    echo "<option value=''>Select {$position} {$i}</option>";
                    $query = "SELECT username FROM users WHERE username NOT IN ('" . implode("','", $selectedPlayers) . "')";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $username = $row['username'];
                        echo "<option value='{$username}'>{$username}</option>";
                    }
                    echo "</select>";

                    // Add selected player to the array
                    if (isset($_POST[$position . $i])) {
                        $selectedPlayers[] = $_POST[$position . $i];
                    }
                }
                echo "</div>";
            }
            ?>
        </div>
        <button type="submit">Submit Lineup</button>
    </form>
</body>
</html>

