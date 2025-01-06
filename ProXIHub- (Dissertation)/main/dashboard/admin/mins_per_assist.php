<?php
// Include database connection
require '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Fetch data for minutes per assist for each player
$query = "SELECT u.username, SUM(ps.minutes_played) / SUM(ps.assists) AS minutes_per_assist, SUM(ps.assists) AS total_assists
          FROM users u
          INNER JOIN player_statistics ps ON u.userid = ps.player_id
          GROUP BY u.userid
          ORDER BY minutes_per_assist";

$fire = mysqli_query($con, $query);

// Check if the query executed successfully
if ($fire) {
    // Fetch the results and store them in the $data array
    while ($result = mysqli_fetch_assoc($fire)) {
        // Check if total assists are greater than 0 before adding to data array
        if ((int)$result['total_assists'] > 0) {
            $data[] = array($result['username'], (float)$result['minutes_per_assist']);
        }
    }
} else {
    // Output an error message if the query failed
    echo "Error: " . mysqli_error($con);
}

// Convert the PHP array to JSON format
$jsonData = json_encode($data);
?>


<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Parse the JSON data received from PHP
            var jsonData = <?php echo $jsonData; ?>;

            // Create a DataTable and add the data from JSON
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Player'); // Label for x-axis
            data.addColumn('number', 'Minutes per Assist');  // Label for y-axis
            data.addRows(jsonData);

            // Set chart options
            var options = {
                title: 'Minutes per Assist for Each Player',
                legend: {position: 'bottom'}
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
            chart.draw(data, options);
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
<div id="column_chart" style="width: 900px; height: 500px;"></div>
</body>
</html>

