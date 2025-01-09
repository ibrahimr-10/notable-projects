<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];

if (empty($msgid)) {
    echo "<html><head><script>alert('ERROR! Player ID is empty');</script></head></html>";
    exit;
}

// Query to delete player from users table
$query_users = "DELETE FROM users WHERE userid='$msgid'";

// Query to delete player's statistics from player_statistics table
$query_stats = "DELETE FROM player_statistics WHERE player_id='$msgid'";

// Execute the first query to delete player from users table
if(mysqli_query($con, $query_users)) {
    // If player is deleted successfully, execute the second query to delete player's statistics
    if(mysqli_query($con, $query_stats)) {
        echo "<html><head><script>alert('Player and associated stats deleted successfully');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=view_player.php'>";
    } else {
        echo "<html><head><script>alert('ERROR! Player deleted, but associated stats could not be deleted');</script></head></html>";
        echo "Error: ".mysqli_error($con);
    }
} else {
    echo "<html><head><script>alert('ERROR! The Player could not be deleted');</script></head></html>";
    echo "Error: ".mysqli_error($con);
}
?>

