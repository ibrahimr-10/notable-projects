<?php
require_once '../../include/db_conn.php';
page_protect();

// Fetch user IDs and usernames from the users table
$query_users = "SELECT userid, username FROM users";
$result_users = mysqli_query($con, $query_users);

// Initialize variables for individual player stats
$goals = $assists = $yellow_cards = $red_cards = $minutes_played = 0;
$selected_username = '';

// Check if a username is selected
if (isset($_POST['userid'])) {
    $selected_userid = $_POST['userid'];

    // Query to fetch username based on the selected user ID
    $query_username = "SELECT username FROM users WHERE userid = '$selected_userid'";
    $result_username = mysqli_query($con, $query_username);

    if ($result_username && mysqli_num_rows($result_username) > 0) {
        $row_username = mysqli_fetch_assoc($result_username);
        $selected_username = $row_username['username'];
    }

    // Query to calculate sum of stats for the selected user
    $query_stats = "SELECT 
                        SUM(goals) AS total_goals,
                        SUM(assists) AS total_assists,
                        SUM(yellow_cards) AS total_yellow_cards,
                        SUM(red_cards) AS total_red_cards,
                        SUM(minutes_played) AS total_minutes_played
                    FROM player_statistics 
                    WHERE player_id = '$selected_userid'";

    $result_stats = mysqli_query($con, $query_stats);

    // Fetch individual player stats based on the selected player ID
    if ($result_stats && mysqli_num_rows($result_stats) > 0) {
        $row_stats = mysqli_fetch_assoc($result_stats);
        $goals = $row_stats['total_goals'];
        $assists = $row_stats['total_assists'];
        $yellow_cards = $row_stats['total_yellow_cards'];
        $red_cards = $row_stats['total_red_cards'];
        $minutes_played = $row_stats['total_minutes_played'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Stats</title>
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
    <h1>Player Stats</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="userid">Select Username:</label>
        <select name="userid" id="userid">
            <?php while ($row_users = mysqli_fetch_assoc($result_users)): ?>
                <option value="<?php echo $row_users['userid']; ?>"><?php echo $row_users['username']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($selected_username)): ?>
        <h2>Stats for <?php echo $selected_username; ?>:</h2>
        <p>Total Goals: <?php echo $goals; ?></p>
        <p>Total Assists: <?php echo $assists; ?></p>
        <p>Total Yellow Cards: <?php echo $yellow_cards; ?></p>
        <p>Total Red Cards: <?php echo $red_cards; ?></p>
        <p>Total Minutes Played: <?php echo $minutes_played; ?></p>
    <?php endif; ?>

</body>
</html>

