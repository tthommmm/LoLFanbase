<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
		<title>LOL FANBASE</title>
	</head>
		<header>
			<span style = "float:right;" id = "span" onclick = "openNav()">&#9776; </span>
			<?php  iflog("Champions"); ?>
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
			<div id = "body">
				<?php
					$var = 1;
					$select = mysqli_query($con, "SELECT champ_name, champ_desc from `champions`;");
					while($row = mysqli_fetch_assoc($select)) {
						echo "
							<table>	
								<th> <img class = 'imgcname' src = img/cname/" . $row['champ_name'] . ".png > </img></th>
									<th style = 'text-align: left;'>
										<span style = 'font-size: 25px;'>
											<a class = 'nodec' href ='champ_prof.php?champ_id=$var'>" . $row['champ_name'] . "</a>
										</span>
		
										<span id = 'spanStyle'>
											<br>" . $row['champ_desc'] . " 
										</span>
									</th>					
							</table>";
							$var++;
					}
				?>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>