<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>View Players</title>
   <link rel="stylesheet" href="../../css/style.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	
	<style>
 	#button1
	{
	width:126px;
	}



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

		        /* Table */
				table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #283747;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

	</style>

</head>
    

    	<div>	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="index.php">
					<img src="logo1.png" alt="" width="192" height="80" />
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
						
						<ul>

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>								
						
							<li>
								<a href="logout.php">
									Log Out
								</a>
							</li>
						</ul>
						
					
				</div>

		<h3>Player Details</h3>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Sl.No</th>
					<th>Player ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Joining Date</th></h2>
				</tr>
			</thead>
				<tbody>

						<?php
							$query  = "select * from users ORDER BY joining_date";
							//echo $query;
							$result = mysqli_query($con, $query);
							$sno    = 1;

							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        $uid   = $row['userid'];
							        $query1  = "select * from users WHERE userid='$uid'";
							        $result1 = mysqli_query($con, $query1);
							        if (mysqli_affected_rows($con) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                echo "<tr><td>".$sno."</td>";
							                
							                echo "<td>" . $row['userid'] . "</td>";

							                echo "<td>" . $row['username'] . "</td>";

							                echo "<td>" . $row['mobile'] . "</td>";

							                echo "<td>" . $row['email'] . "</td>";

							                echo "<td>" . $row['gender'] . "</td>";

							                echo "<td>" . $row['joining_date'] ."</td>";
							                
							                $sno++;
							       
							               
							            }
							        }
							    }
							}
                    $res = mysqli_query($con,"CALL `countGender`();") or die("query fail:" .mysqli_error($con));
                    echo"<table ><tr><th>gender</th><th>count</th></tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo"<td>". $row['gender']. "</td>";
                         echo"<td>". $row['COUNT(*)']. "</td>";
                        echo"<br/>";
                        echo"</table>";     
                    }
                    
                    
						?>									
					</tbody>
				</table>

		
			<?php include('footer.php'); ?>

    </body>
</html>


