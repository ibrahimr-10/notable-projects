<?php
require '../../include/db_conn.php';
page_protect();

$memberId = $_POST['name'];
$query = "SELECT * FROM users WHERE userid='$memberId'";
$result = mysqli_query($con, $query);

$memberData = [];
if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $memberData = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Player's History</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
</head>
<body>
       
        <div class="sidebar-menu">
            <header class="logo-env">
                <div class="logo">
                    <a href="main.php">
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
                        <a href="logout.php">
                            Log Out 
                        </a>
                    </li>
                </ul>
            </div>

            <h3>Player`s Member History</h3>
            Details of : - <?php echo $memberData['username']; ?>
            <hr />

            <table border=1>
                <thead>
                    <tr>
                        <th>Player ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Joined On</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $memberData['userid']; ?></td>
                        <td><?php echo $memberData['username']; ?></td>
                        <td><?php echo $memberData['gender']; ?></td>
                        <td><?php echo $memberData['mobile']; ?></td>
                        <td><?php echo $memberData['email']; ?></td>
                        <td><?php echo $memberData['joining_date']; ?></td>
                    </tr>                               
                </tbody>
            </table>
            <br>
            <br>

            <?php include('footer.php'); ?>
    </body>
</html>

