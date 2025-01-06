<?php
require '../../include/db_conn.php';
page_protect();

$playerId = $_POST['id'];
$playerName = $_POST['u_name'];
$street = $_POST['street_name'];
$playerCity = $_POST['city'];
$postalCode = $_POST['zipcode'];
$playerGender = $_POST['gender'];
$birthDate = $_POST['dob'];
$phoneNum = $_POST['mobile'];
$playerEmail = $_POST['email'];
$joinDate = $_POST['jdate'];

function insertIntoUsers($con, $playerName, $playerGender, $phoneNum, $playerEmail, $birthDate, $joinDate, $playerId) {
    $stmt = $con->prepare("INSERT INTO users (username, gender, mobile, email, dob, joining_date, userid) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $playerName, $playerGender, $phoneNum, $playerEmail, $birthDate, $joinDate, $playerId);
    return $stmt->execute();
}

function insertIntoAddress($con, $playerId, $street, $playerCity, $postalCode) {
    $stmt = $con->prepare("INSERT INTO address (id, streetName, city, zipcode) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $playerId, $street, $playerCity, $postalCode);
    return $stmt->execute();
}

if(insertIntoUsers($con, $playerName, $playerGender, $phoneNum, $playerEmail, $birthDate, $joinDate, $playerId)) {
    if(insertIntoAddress($con, $playerId, $street, $playerCity, $postalCode)) {
        echo "<head><script>alert('Player Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
    } else {
        echo "<head><script>alert('Player Addition Failed');</script></head></html>";
        echo "Error: " . $con->error;
    }
} else {
    echo "<head><script>alert('Player Addition Failed');</script></head></html>";
    echo "Error: " . $con->error;
}
?>


