<?php
// Include database connection
require_once '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Query to get total yellow cards received by each user
$query = "SELECT u.username, SUM(ps.yellow_cards) AS total_yellow_cards
FROM users u
INNER JOIN player_statistics ps ON u.userid = ps.player_id
GROUP BY u.userid
ORDER BY total_yellow_cards DESC
LIMIT 10;"; // Limiting to top 10 users for the graph

$result = mysqli_query($con, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch the results and store them in the $data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array($row['username'], (int)$row['total_yellow_cards']);
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
    <title>User Yellow Cards Performance</title>
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
            data.addColumn('number', 'Total Yellow Cards');
            data.addRows(jsonData);

            // Set chart options
            var options = {
                chart: {
                    title: 'Top 10 Users by Total Yellow Cards Received',
                    subtitle: 'Showing the total yellow cards received by the top 10 users',
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            // Instantiate and draw the chart
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
        <style>
        /* Center the chart horizontally and vertically */
        #barchart_material {
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
<div id="barchart_material" style="width: 900px; height: 500px;"></div>
</body>
</html>
