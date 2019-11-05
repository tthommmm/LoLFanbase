<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
		<style>
				#table{
					border: none;
					background-color:#111;
				}
				table{	
					border: 1px solid coral;
					border-radius: 15px;
					margin-left: auto;
					margin-right: auto;
				}
				tr{
					text-align:left;
				}
				td,th,tr{
					 /* border: 1px solid coral; */
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
			<div id = "body">
				<?php
					addnewtip();
				?>
					<title> Tips </title>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>