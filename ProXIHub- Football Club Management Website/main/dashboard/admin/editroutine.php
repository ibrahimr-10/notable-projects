<?php
require '../../include/db_conn.php';
page_protect();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>View Routine</title>
    <link rel="stylesheet" href="../../css/style.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
	#boxxe
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
     <body>

    	<div>	
	
		<div class="sidebar-menu">
	
			<header>
			
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
					
						<ul>

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Log Out 
								</a>
							</li>
						</ul>
					
		
			<h2>Routines</h2>

	
		
		<table border=1>
			
				<tr>
					<th>Sl.No</th>
					<th>Routine Name</th>
					<th>Routine Details</th>
					<th>Delete Routine</th>
				</tr>
		
				<tbody>

				<?php


					$query  = "select * from timetable";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) 
					{
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
						{

					       
					           
					                
					                 echo "<tr><td>".$sno."</td>";
					                echo "<td>" . $row['tname'] . "</td>";
					           
					                
					                $sno++;
					                
					              echo '<td><a href="editdetailroutine.php?id='.$row['tid'].'"><input type="button" class="a1-btn" id="boxxe" value="Edit Routine" ></a></td>';
								 echo "<td><form action='deleteroutine.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='name' value='" . $row['tid'] . "'/><input type='submit' value='Delete' width='20px' id='boxxe' class='a1-btn'/></form></td></tr>";
									
					                $uid = 0;
					            
					        
					    }
					}

					?>									
				</tbody>

		</table>



    	</div>

    </body>
	<?php include('footer.php'); ?>
</html>


										
