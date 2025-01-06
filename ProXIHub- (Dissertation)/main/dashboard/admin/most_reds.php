<?php
// Include database connection
require_once '../../include/db_conn.php';

// Initialize an empty array to store the data
$data = array();

// Query to get total red cards received by each user
$query = "SELECT u.username, SUM(ps.red_cards) AS total_red_cards
FROM users u
INNER JOIN player_statistics ps ON u.userid = ps.player_id
GROUP BY u.userid
ORDER BY total_red_cards DESC
LIMIT 10;"; // Limiting to top 10 users for the graph

$result = mysqli_query($con, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch the results and store them in the $data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array($row['username'], (int)$row['total_red_cards']);
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
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Parse the JSON data received from PHP
            var jsonData = <?php echo $jsonData; ?>;

            // Create a DataTable and add the data from JSON
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Username');
            data.addColumn('number', 'Total Red Cards');
            data.addRows(jsonData);

            // Set chart options
            var options = {
                title: 'Top 10 Users by Total Red Cards',
                pieSliceText: 'label'
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <style>
        /* Center the chart horizontally and vertically */
        #piechart {
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
<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>


