<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
		<style>
					th{
						text-align:left;
					}
					table{
						padding-top: 50px;
						margin: 50 50 50 50;
					}
					#IncorrectPassword{
						color:red;
						padding-left: 10px;
					}
		</style>
	</head>
		<header>
			<span alt = "Closed" id = "span" onclick = "openNav()">&#9776;</span>
			<?php iflog("Login"); ?>	
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
				<form action = "login.php" method = "POST">
					<table>
						<tr>
							<th><p>Username</p></th>
							<th> <input type = "text" name = "username"  size="15" maxlength="25"/>
								<td id = 'userTaken'></td>
							</th>
						</tr>
						
						<tr>
							<th><p>Password &nbsp;</p></th>
							<th> <input type = "password" name = "password"  size="15" maxlength="50"/>
								<td id = 'IncorrectPassword'></td>
							</th>
						</tr>
						<tr>
							<th><br><p>
								<input style = "border-radius: 5px;margin-bottom: 25px;"  name = "submit" type = "submit"   name = "submit"   value = "Login"/>
							</p></th>
						</tr>
					</table>
				</form>
		
				<?php login(); ?>
					<title>Login</title>
			</div><!-- end body -->
		<script src = "js/myScript.js"></script>
	<?php include('includes/footer.php');?>
</html>