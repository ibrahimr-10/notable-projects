<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Player View</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
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
    <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
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

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>								
						
							<li>
								<a href="logout.php">
									Log Out
								</a>
							</li>
						</ul>
					
				</div>

		<h3>Edit Player</h3>

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
					<th>Joining Date</th>
					<th>Action</th></h2>
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
							       
							                echo "<td><form action='read_player.php' method='post'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' class='a1-btn a1-blue' id='button1' value='View History ' class='btn btn-info'/></form><form action='del_player.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' value='Delete' width='20px' id='button1' class='a1-btn a1-orange'/></form></td></tr>";

							                $msgid = 0;
							            }
							        }
							    }
							}
						?>									
					</tbody>
				</table>

<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("Are you sure! You want to Delete this member?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>

			<?php include('footer.php'); ?>
    	</div>
    </body>
</html>





