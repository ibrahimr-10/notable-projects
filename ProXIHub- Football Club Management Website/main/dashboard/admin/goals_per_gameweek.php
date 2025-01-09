<?php
// for the below code, i used this youtube video to give me an idea of how to create a graph: https://www.youtube.com/watch?v=hvkii393WOM&t=620s
?>
<?php
// Include database connection
require_once '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Fetch data for goals per gameweek
$query = "SELECT gameweek, SUM(goals) AS total_goals FROM player_statistics GROUP BY gameweek ORDER BY gameweek";
$fire = mysqli_query($con, $query);

// Check if the query executed successfully
if ($fire) {
    // Fetch the results and store them in the $data array
    while ($result = mysqli_fetch_assoc($fire)) {
        $data[] = array($result['gameweek'], (int)$result['total_goals']);
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
            data.addColumn('string', 'Gameweek'); // Label for x-axis
            data.addColumn('number', 'Goals');     // Label for y-axis
            data.addRows(jsonData);

            // Set chart options
            var options = {
                title: 'Goals per Gameweek',
                curveType: 'function',
                legend: {position: 'bottom'}
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
    <!-- Could not use the style to make the graph appear in the middle of the page becuase of the inclusion of this graph 
on the dashboard -->

</head>

<body>
<div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>
</html>


