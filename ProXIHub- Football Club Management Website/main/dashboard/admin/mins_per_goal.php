<?php
// Include database connection
require_once '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Fetch data for minutes per goal for each player
$query = "SELECT u.username, SUM(ps.minutes_played) / SUM(ps.goals) AS minutes_per_goal, SUM(ps.goals) AS total_goals
          FROM users u
          INNER JOIN player_statistics ps ON u.userid = ps.player_id
          GROUP BY u.userid
          ORDER BY minutes_per_goal";

$fire = mysqli_query($con, $query);

// Check if the query executed successfully
if ($fire) {
    // Fetch the results and store them in the $data array
    while ($result = mysqli_fetch_assoc($fire)) {
        // Check if total goals are greater than 0 before adding to data array
        if ((int)$result['total_goals'] > 0) {
            $data[] = array($result['username'], (float)$result['minutes_per_goal']);
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
            data.addColumn('number', 'Minutes per Goal');  // Label for y-axis
            data.addRows(jsonData);

            // Set chart options
            var options = {
                title: 'Minutes per Goal for Each Player',
                legend: {position: 'bottom'}
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
            chart.draw(data, options);
        }
    </script>
    <!-- Could not use the style to make the graph appear in the middle of the page becuase of the inclusion of this graph 
on the dashboard -->
</head>

<body>
<div id="column_chart" style="width: 900px; height: 500px;"></div>
</body>
</html>

