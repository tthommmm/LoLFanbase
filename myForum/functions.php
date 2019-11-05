<?php
function iflog($title){
	if(session_id() == ''){//is session started?
		session_start();// do i want to start the session here?
	}
	if(!isset($_SESSION['username'])){//if session var is not set print out the two buttons
		echo "<p id = 'logo' >
				<input value = 'Login' type = 'button' onclick = \"window.location.href = 'login.php';\" style = 'border-radius:5px;margin-top:12px;margin-right: 20px;float:right;padding:5px;width:100px;'/>
				<input value = 'Register' type = 'button' onclick = \"window.location.href = 'register.php';\" style = 'border-radius:5px;margin-top:12px;margin-right: 20px;float:right;padding:5px;width:100px;'/>
				$title
			</p>";
	}
	if(isset($_SESSION['username'])){//if it is set, print out a link to the profile account page
	echo   "<p id = 'logo' > $title
			<a href = 'accountinfo.php'>
				<img style = 'border-radius: 100px; float:right;margin-right: 25px;' width = '60' height = '60' src = 'img/users/profpic1.png' ></img>
			</a>
			<span style = 'font-family: Calibri; font-style:normal;font-size: 15px; float:right; margin-top: 25px; margin-right: 25px;' >" . $_SESSION['username'] . "</span>
			</p>";
	}
}

function login(){
	if(session_id() == ''){
		session_start();// do i want to start the session here?
	}
	if(isset($_POST['username'])){
		include('connections/mysqli_connect.php');
		$select = mysqli_query($con, "SELECT username, password FROM user WHERE 
									  username = '" . $_POST['username']. "' AND 
									  password = '" . $_POST['password']. "';");

			if(mysqli_num_rows($select) != 0) {//if there is a match (if the total rows is above 0)
				$_SESSION['username'] = $_POST['username'];
						echo "<script src = 'js/myScript.js'> 
								loginsuccess();
							  </script>";
						header("Location: index.php");
					}
			if(mysqli_num_rows($select) == 0){
					echo "<p style = 'color:red; margin-top:-50px;margin-left: 50px;padding-bottom: 100px;' > Incorrect username or password </p>";
				}			
		}			
}

function logout(){
	session_start();
	unset($_SESSION['username']);
	header("Location: index.php");
}

function showposts(){
	include('connections/mysqli_connect.php');
					$select = mysqli_query($con, "SELECT * from `post` WHERE champ_id =" . $_GET['champ_id'] . "");
						
					if(mysqli_num_rows($select) != 0 ){//if some posts were detected
						while($row = mysqli_fetch_assoc($select)){
							echo "
							<table style = 'margin-bottom: 10px;'>
								<tr>
									<th width = '200px'>" . $row['username']. "</th>
									<th width = '200px' style = 'text-align:right;'>" . $day = date('l, M', strtotime(date('M'))) . "</th>
								</tr>
								<tr>
									<th style = 'border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;background: lightcoral; border-top: 1px solid coral;'colspan = '2'>" . $row['comment'] . "</th>
								</tr>
							</table>";
						}	
					}	
					if(mysqli_num_rows($select) == 0){//none detected
							echo "
							<table>
								<tr>
									<th>There are no posts here</th>
								</tr>
							</table>";
					}
					if(isset($_SESSION['username'])){
							echo "<table><th><button style = ''><a href = 'newtip.php?champ_id=" . $_GET['champ_id']. "'>Add new Tip</a></th></button></table> ";
						}	
}

function showchamp(){
	include('connections/mysqli_connect.php');
		$select = mysqli_query($con, "SELECT champ_name, champ_desc from `champions` WHERE champ_id =" . $_GET['champ_id'] . ";");
					while($row = mysqli_fetch_assoc($select)) {
						
							echo "
							<table id = 'table'>
								<th> <img class = 'imgcname' src = 'img/cname/" . $row['champ_name'] . ".png' > </img></th>
								<th id = 'floatL'>
								
									<span style = 'font-size: 25px; color:white;'>
										" . $row['champ_name'] . "
									</span><br>
									
									<span id = 'spanStyle'>
										" . $row['champ_desc'] . "
									</span><br><br>
									
									<audio controls>
										<source src = 'sound/" . $row['champ_name']. ".ogg'>
									</audio>
								</th>

							</table>";
					}	
}

function addnewtip(){
				$champid = $_GET['champ_id'];
				echo "
				<br><table>
						<form action = 'champtips.php?champ_id=$champid' method = 'POST'>
							<tr>
								<th width = '200px'>" . $_SESSION['username']. "</th>
								<th><th width = '200px' style = 'text-align:right;'>" . $day = date('l, M', strtotime(date('M'))) . "</th></th>
							</tr>
							<tr>
								<th colspan = '3'><textarea name = 'comment' cols = '50'> </textarea></th>
								<tr><th><input style = 'border-radius: 5px;margin-left: 0px;'type = 'submit' value = 'Submit'></th></tr>
							</tr>
						</form>
					</table><br><br>";
}

function createpost(){
		include('connections/mysqli_connect.php');
		
		if(isset($_POST['comment'])){//if data is in text area
			// echo $_POST['comment'];
			// echo $_SESSION['username'];
			// echo $_GET['champ_id'] ;
			
			$result = mysqli_query($con, "INSERT into `post` (champ_id, username, comment, date)
			VALUES
			(
				'" . $_GET['champ_id']    . "',
				'" . $_SESSION['username']. "' ,
				'" . $_POST['comment']    . "',
				'NOW();'
			);");
		}
}
//https://www.w3docs.com/snippets/html/how-to-create-an-html-button-that-acts-like-a-link.html
?>
