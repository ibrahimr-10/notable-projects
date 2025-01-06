<?php
// Include database connection
require_once '../../include/db_conn.php';
// Include session protection
page_protect();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $stat_id = $_POST['stat_id'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];
    $yellow_cards = $_POST['yellow_cards'];
    $red_cards = $_POST['red_cards'];
    $minutes_played = $_POST['minutes_played'];

    // Update player statistics in the database
    $query = "UPDATE player_statistics SET goals='$goals', assists='$assists', yellow_cards='$yellow_cards', red_cards='$red_cards', minutes_played='$minutes_played' WHERE stat_id='$stat_id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Player statistics updated successfully.');</script>";
        echo "<script>window.location.href='player_stats.php';</script>"; // Redirect to player_stats.php
        exit;
    } else {
        echo "<script>alert('Error updating player statistics: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!-- HTML form to edit player statistics -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <title>Edit Player Stats</title>
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


    <h2>Edit Player Stats</h2><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="stat_id" value="<?php echo isset($_GET['stat_id']) ? $_GET['stat_id'] : ''; ?>">
    <label for="goals">Goals:</label>
    <input type="number" name="goals" value="<?php echo isset($_GET['goals']) ? $_GET['goals'] : ''; ?>" required><br><br>
    <label for="assists">Assists:</label>
    <input type="number" name="assists" value="<?php echo isset($_GET['assists']) ? $_GET['assists'] : ''; ?>" required><br><br>
    <label for="yellow_cards">Yellow Cards:</label>
    <input type="number" name="yellow_cards" value="<?php echo isset($_GET['yellow_cards']) ? $_GET['yellow_cards'] : ''; ?>" required><br><br>
    <label for="red_cards">Red Cards:</label>
    <input type="number" name="red_cards" value="<?php echo isset($_GET['red_cards']) ? $_GET['red_cards'] : ''; ?>" required><br><br>
    <label for="minutes_played">Minutes Played:</label>
    <input type="number" name="minutes_played" value="<?php echo isset($_GET['minutes_played']) ? $_GET['minutes_played'] : ''; ?>" required><br><br>
    <input type="submit" value="Update">
</form>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>

