<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
		<title>LOL FANBASE</title>

		<style>
			table{
				padding: 50px;
				margin-top: 50px;
				margin-left: 100px;
				margin-bottom: 100px;
			}
			th, td {
					padding: 0 15 15 15;
					font-size: 25px;
					
				}
			td:hover{
				color:coral;
				font-weight: bold;
			}
			
			</style>
	</head>
		<header>
			<span style = "float:right;" id = "span" onclick = "openNav()">&#9776; </span>
			<?php iflog("Profile"); ?>		
		</header>
			<main>
				<div id = "mySidenav" class = "sidenav">
					<a id href = "javascript:void(0)" class = "closebtn" onclick = "closeNav()">&times;  </a>
					<div class = "sideNavHover">
						<a href = "index.php"> Home </a>
						<a href = "info.php"> What is League of Legends? </a>
						<a href = "Logout.php"> Logout </a>
					</div><!-- end nav links -->
				</div><!-- end sidenav -->
			</main>

			<div id = "body" >
				<?php
					$select = mysqli_query($con, "SELECT user_id, username, password from `user`
												  WHERE username = '" . $_SESSION['username']. "';");
					while($row = mysqli_fetch_assoc($select)) {
						echo "
							<table>
								<tr> 
									<th> Username :
										<td> " . $row['username'] . "</td>
									</th>
								</tr>
						
								<tr>
									<th>Password :
										<td> " . $row['password'] . "</td>
									</th>
								</tr>
							</table>";
						}		
				?>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>