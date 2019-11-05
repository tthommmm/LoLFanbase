<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
				<style>
					table{
						margin-left: auto;
						margin-right: auto;
					}
					th{
						text-align:left;
					}
					td,th,tr{
						padding:10px;
					}
				</style>
	</head>
		<header>
			<span alt = "Closed" id = "span" onclick = "openNav()">&#9776;</span>	
			<?php iflog("Champions"); ?> 
		</header>
			<main>
				<div id = "mySidenav" class = "sidenav">
					<a id href = "javascript:void(0)" class = "closebtn" onclick = "closeNav()">&times;  </a>
					<div class = "sideNavHover">
						<a href = "index.php"> Home </a>
						<a href = "info.php"> What is League of Legends? </a>
					</div><!-- end nav links -->
				</div><!-- end sidenav -->
			</main>
			<div id = "body" >
				<?php
					$select = mysqli_query($con, "SELECT Ban, champ_name, champ_desc from `champions` WHERE champ_id = " . $_GET['champ_id'] );
					while($row = mysqli_fetch_assoc($select)) {
						
							echo "
								<table id = 'table'>
									<tr>
										<th> <img class = 'imgcname' src = 'img/cname/" . $row['champ_name'] . ".png' > </img></th>
										<th>
											<span style = 'font-size: 25px; color:white;'>
												" . $row['champ_name'] . "
											</span>
											<br>
											<span id = 'spanStyle'>
												" . $row['champ_desc'] . "
											</span>
										</th>
									</tr>
									<tr>
										<th style = 'color:white; border: 1px solid white;'>Enemy</th>
										<th style = 'color:white; border: 1px solid white;'>Most Completed Build</th>
									</tr>
									<tr>
										<th><img class = 'imgcname' src = 'img/cname/" . $row['Ban'] . ".png' ></img></th>
										<th> <img class = 'imgcname' src = 'img/build/" . $row['champ_name']. ".png' > </img></th>
									</tr>
									<tr>
										<th style = 'text-align: center;' colspan = '2'> <a style = 'color:white;' href = 'champtips.php?champ_id=" . $_GET['champ_id'] . "'> Discuss this champion</a></th>
									</tr>
								</table>";
						$title = $row['champ_name'];
					}
				?>
					<title><?php echo $title ?> </title>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>