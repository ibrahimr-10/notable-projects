<?php
// Include database connection
require_once '../../include/db_conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected players
    $goalkeeper = $_POST['goalkeeper'];
    $defenders = array();
    for ($i = 1; $i <= 4; $i++) {
        $defenders[] = $_POST['Defender'.$i];
    }
    $midfielders = array();
    for ($i = 1; $i <= 3; $i++) {
        $midfielders[] = $_POST['Midfielder'.$i];
    }
    $forwards = array();
    for ($i = 1; $i <= 3; $i++) {
        $forwards[] = $_POST['Forward'.$i];
    }

    // Insert the selected players into the lineups table
    $query = "INSERT INTO lineups (goalkeeper, defender1, defender2, defender3, defender4, midfielder1, midfielder2, midfielder3, forward1, forward2, forward3) 
              VALUES ('$goalkeeper', '$defenders[0]', '$defenders[1]', '$defenders[2]', '$defenders[3]', '$midfielders[0]', '$midfielders[1]', '$midfielders[2]', '$forwards[0]', '$forwards[1]', '$forwards[2]')";
    if (mysqli_query($con, $query)) {
        // Redirect to view_lineup.php
        header("Location: view_lineup.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
} else {
    // If the form is not submitted, redirect back to the lineup page or display an error message
    echo "Error: Form not submitted.";
}
?>



