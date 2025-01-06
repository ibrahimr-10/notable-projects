<?php
// Include database connection
require '../../include/db_conn.php';
// Include session protection
page_protect();

// Fetch list of players from the user table
$query = "SELECT userid, username FROM users";
$result = mysqli_query($con, $query);
$players = array();
while ($row = mysqli_fetch_assoc($result)) {
    $players[] = $row;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $player_id = $_POST['player_id']; // Updated to use player_id from the form
    $gameweek = $_POST['gameweek'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];
    $yellow_cards = $_POST['yellow_cards'];
    $red_cards = $_POST['red_cards'];
    $minutes_played = $_POST['minutes_played'];

    // Insert player statistics into database
    $query = "INSERT INTO player_statistics (player_id, gameweek, goals, assists, yellow_cards, red_cards, minutes_played) VALUES ('$player_id', '$gameweek', '$goals', '$assists', '$yellow_cards', '$red_cards', '$minutes_played')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Player statistics added successfully.');</script>";
        echo "<script>window.location.href='add_player_stats.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error adding player statistics: " . mysqli_error($con) . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <title>Add Player Stats</title>
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

    <div class="center-form">

    <h2>Add Player Stats</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="player_id">Player Name:</label>
        <select name="player_id" required>
            <option value="">Select Player</option>
            <?php foreach ($players as $player): ?>
                <option value="<?php echo $player['userid']; ?>"><?php echo $player['username']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <label for="gameweek">Gameweek:</label>
        <input type="number" name="gameweek" required><br><br>
        <label for="goals">Goals:</label>
        <input type="number" name="goals" required><br><br>
        <label for="assists">Assists:</label>
        <input type="number" name="assists" required><br><br>
        <label for="yellow_cards">Yellow Cards:</label>
        <input type="number" name="yellow_cards" required><br><br>
        <label for="red_cards">Red Cards:</label>
        <input type="number" name="red_cards" required><br><br>
        <label for="minutes_played">Minutes Played:</label>
        <input type="number" name="minutes_played" required><br><br>
        <input type="submit" value="Submit">
    </form>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>


