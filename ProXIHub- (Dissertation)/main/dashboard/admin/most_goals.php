<?php
// Include database connection
require_once '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Query to get total goals scored by each user
$query = "SELECT u.username, SUM(ps.goals) AS total_goals
FROM users u
INNER JOIN player_statistics ps ON u.userid = ps.player_id
GROUP BY u.userid
ORDER BY total_goals DESC
LIMIT 10;"; // Limiting to top 10 users for the graph

$result = mysqli_query($con, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch the results and store them in the $data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array($row['username'], (int)$row['total_goals']);
    }
} else {
    // Output an error message if the query failed
    echo "Error: " . mysqli_error($con);
}

// Convert the PHP array to JSON format
$jsonData = json_encode($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Goals Performance</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Parse the JSON data received from PHP
            var jsonData = <?php echo $jsonData; ?>;
            console.log(jsonData); // Log JSON data to the browser console for verification

            // Create a DataTable and add the data from JSON
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Username');
            data.addColumn('number', 'Total Goals');
            data.addRows(jsonData);

            // Set chart options
            var options = {
                chart: {
                    title: 'Top 10 Users by Total Goals Scored',
                    subtitle: 'Showing the total goals scored by the top 10 users',
                }
            };

            // Instantiate and draw the chart
            var chart = new google.charts.Bar(document.getElementById('column_chart'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <style>
        /* Center the chart horizontally and vertically */
        #column_chart {
            width: 900px;
            height: 500px;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div id="column_chart"></div>
</body>
</html>


