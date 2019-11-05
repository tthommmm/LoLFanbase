function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("body").style.width = "50%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("body").style.width = "70%";

}
function BlankUser(){
	document.getElementById("userTaken").innerHTML = "Enter a username.";
}
function UserTaken(){
	document.getElementById("userTaken").innerHTML = "That username is taken..";
}
function IncorrectPassword(){
	document.getElementById("IncorrectPassword").innerHTML = "Passwords do not match..";
}
function BlankPassword(){
	document.getElementById("IncorrectPassword").innerHTML = "Enter a password..";
	document.getElementById("userTaken").innerHTML = "Enter a username..";
}

