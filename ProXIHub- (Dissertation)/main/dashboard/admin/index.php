<?php
require '../../include/db_conn.php';
page_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" type="text/css">
    <style>
        /* Header */
        .logo-env {
            background-color: #283747;
            padding: 15px;
            text-align: center;
        }

        .logo-env .logo img {
            width: 150px;
            height: auto;
        }

        /* Sidebar */
        .sidebar-menu {
            background-color: #34495e;
            color: #fff;
        }

        .sidebar-menu a {
            color: #fff;
        }

        .sidebar-menu #main-menu li#routinehassubopen > a {
            background-color: #2b303a;
            color: #ffffff;
        }
        
        /* Main Content */
        .main-content {
            background-color: #ecf0f1;
            padding: 20px;
        }
        
        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .tile-stats {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .tile-stats .icon {
            font-size: 36px;
            margin-bottom: 10px;
            color: #3498db;
        }
        
        .tile-stats h2 {
            color: #2c3e50;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .tile-stats .num {
            font-size: 24px;
            color: #2c3e50;
        }
        
        /* Footer */
        footer {
            background-color: #283747;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    	
        <div class="sidebar-menu">
            <header class="logo-env">
                <div class="logo">
                    <a href="dashboard.php">
                        <img src="logo1.png" alt="" width="192" height="80" />
                    </a>
                </div>

            </header>
            <?php include('nav.php'); ?>
        </div>
        <div class="main-content">
            <div class="row">
                <div>
                    <ul class="list-inline links-list pull-right">
                        <li>Welcome <?php echo $_SESSION['full_name']; ?></li>
                        <li><a href="logout.php">Log Out </a></li>
                    </ul>
                </div>
            </div>
            <h2>Dashboard</h2>
            <hr>
            <div><a href="table_view.php">			
				<div class="tile-stats">
					<div class="icon"></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Total <br>Members</h2><br>	
							<?php
							$query = "select COUNT(*) from users";

							$result = mysqli_query($con, $query);
							$i      = 1;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
							?>
						</div>
				</div></a>
			</div>	

            <div>			
				<div class="tile-stats">
					<div class="icon"></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Joined This Month</h2><br>	
							<?php
							date_default_timezone_set("Europe/London"); 
							$date  = date('Y-m');
							$query = "select COUNT(*) from users WHERE joining_date LIKE '$date%'";

							//echo $query;
							$result = mysqli_query($con, $query);
							$i      = 1;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
							?>
						</div>
				</div>		
			</div>
            <div>
    <a href="mins_per_goal.php">			
        <div class="tile-stats">
            <div class="icon"></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
                <h2>Minutes per Goal</h2><br>
                <?php include 'mins_per_goal.php'; ?> 
            </div>
        </div>
    </a>
</div>

<div>
    <a href="goals_per_gameweek.php">			
        <div class="tile-stats">
            <div class="icon"></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
                <h2>Goals per Gameweek</h2><br>
                <?php include 'goals_per_gameweek.php'; ?> 
            </div>
        </div>
    </a>
</div>

			
   
    	<?php include('footer.php'); ?>

  
    </body>
</html>
