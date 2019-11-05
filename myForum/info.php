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
			<span style = "float:right;" id = "span" onclick = "openNav()">&#9776;</span>
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
			<fieldset style = 'margin-top: 50px;margin: 25px;'><legend>Information</legend>
				<h3 style = "color: lightcoral;margin: 50 50 50 50;">
					League of Legends is a competitive online game set in an imaginative world.
					Gamers take the role of a powerful Summoner, calling forth and controlling
					brave Champions in battle. League of Legends combines the best elements of
					session-based games with persistent elements of MMORPG's.
				</h3>
			</fieldset>
				<a style = "margin-left: 50px; font-size: 25px;" href = "https://www.geforce.com/games-applications/pc-games/league-of-legends/description"> Click here </a>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>