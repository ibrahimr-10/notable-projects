<?php
// Include database connection
require '../../include/db_conn.php';
// Include session protection
page_protect();

// Fetch player statistics including user name from user table
$query = "SELECT ps.*, u.username 
          FROM player_statistics ps
          INNER JOIN users u ON ps.player_id = u.userid 
          ORDER BY gameweek ASC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Player Stats</title>
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

    <h2>Player Statistics</h2>

    <table>
        <tr>
            <th>Player Name</th>
            <th>Gameweek</th>
            <th>Goals</th>
            <th>Assists</th>
            <th>Yellow Cards</th>
            <th>Red Cards</th>
            <th>Minutes Played</th>
            <th>Edit</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['gameweek']; ?></td>
                <td><?php echo $row['goals']; ?></td>
                <td><?php echo $row['assists']; ?></td>
                <td><?php echo $row['yellow_cards']; ?></td>
                <td><?php echo $row['red_cards']; ?></td>
                <td><?php echo $row['minutes_played']; ?></td>
                <td>
    <form action="edit_player_stats.php" method="get">
        <input type="hidden" name="stat_id" value="<?php echo $row['stat_id']; ?>">
        <button type="submit">Edit</button>
    </form>
</td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include('footer.php'); ?>
</body>
</html>
