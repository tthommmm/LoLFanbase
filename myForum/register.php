<?php 
include('connections/mysqli_connect.php');
include('functions.php');
?>
<html>
	<head>
		<script src = "js/myScript.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "css/myStyle.css">
		<title>LOL FANBASE</title>
		<style>
				th{
					text-align:left;
				}
				table{
					padding-top:50px;
					margin: 50 50 50 50;
				}
				#IncorrectPassword{
					color:red;
					padding-left: 10px;
				}
				#1{
					margin-bottom: 100px;
				}
		</style>
			
	</head>
		<header>
			<span style = "float:right;" id = "span" onclick = "openNav()">&#9776; </span>
			<?php iflog("Register"); ?>		
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
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						$handle = [];
				
						if(empty($_POST['username'])) {//blank username
								echo "
								<script src = 'js/myScript.js'>
									BlankUser();
								</script>";
							$handle[] = "Error 1: Blank Username";
							} else {//username is entered
								$username = mysqli_real_escape_string($con, trim($_POST['username']));//no white space
							}
						if(!empty($_POST['password']) && !empty($_POST['Cpassword'])){//if it has data
							if($_POST['password'] != $_POST['Cpassword']){//dont match
								echo "
								<script src = 'js/myScript.js'>
									IncorrectPassword();
								</script>";
								$handle[] = "Error 2: Mismatched Password";
							}else{//if the passwords do match
								$password = mysqli_real_escape_string($con, trim($_POST['Cpassword']));//confirmed password
							}
						}else{//if passwords were blank
							echo "
							<script src = 'js/myScript.js'>
								BlankPassword();
							</script>";
							$handle[] = "Error 4: Blank Password";
						}
						if(isset($_POST['username'])){//if the username is set
							$sql = "SELECT username FROM user WHERE 1;";
							$checkuser = mysqli_query($con, $sql);
					
							while($row = mysqli_fetch_assoc($checkuser)){//check for same username
									if($_POST['username'] == $row['username']){//if a username is found in the database
										echo "<script src = 'js/myScript.js'>
											 UserTaken();
											</script>";
;
										$handle[] = "Error 4: User is taken";
									}
							}
						}
						if(empty($handle)){//if no errors, insert into db
							$sql = "INSERT INTO user (username, password) VALUES('$username', '$password');";
							$register = mysqli_query($con, $sql);
						}	
					}//end REQUEST check	
				?>
				
				<form action = "register.php" method = "POST">
					<table>
						<tr><th><p>Username       		    </p></th><th> <input type = "text"      name = "username"  size="15" maxlength="25"/><td id = 'userTaken'>        </td></th></tr>
						<tr><th><p>Password &nbsp; 		   	</p></th><th> <input type = "password"  name = "password"  size="15" maxlength="50"/><td id = 'IncorrectPassword'></td></th></tr>
						<tr><th><p>Confirm Password &nbsp; 	</p></th><th> <input type = "password" name = "Cpassword" size="15" maxlength="50"/><td id = 'IncorrectPassword'></td></th></tr>
							
						<th><br><p><input style = "border-radius: 5px;margin-bottom: 50px;" name = "submit" type = "submit"   name = "submit"   value = "Register"/></p></th></tr>
					</table>
				</form>
				<?php
					if(!empty($handle)){
							foreach($handle as $error){
								echo "<span style = 'color: red; margin-left: 50px;'>$error<br></span>";
							}
					}
				?>
			</div><!-- end body -->
	<?php include('includes/footer.php');?>
</html>