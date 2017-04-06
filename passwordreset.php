<?php
include 'control.php';
include 'Support.php';

$users = readUsers();

//split on url to get the key out and compare that key to the session key
//if the session keys are the same replace that usernames password
// echo $_SESSION['key'] . "<br>";

$url = $_SERVER["REQUEST_URI"];
$url_split = parse_url($url);
$key = substr($url_split['query'],4);
// echo $key;

if ($_SESSION['key'] == $key){
	
	
	
	echo "<h2>please create new password for \"". $_SESSION["Username"]. "\"</h2>"
	?>
<form method="post" action="#">
      
      New Password:<input type="password" name="password" size="30"><br/>
	  Confirm Password:<input type="password" name="confirm" size="30"><br/>
     <input type="hidden" value="done" name="op"> 
     <input type="submit">
   </form>
 
 <?php

if (isset ( $_POST ['op'] )) {
	if ($_POST["password"] == $_POST["confirm"]){
	//send email here
	$username = $_SESSION['Username'];
	// echo $_POST["password"] . "<br>";
	$new_password = $_POST["password"];
	// echo $new_password;
	changePassword($username,$new_password);
	echo "Password was successfully reset"
	?>
	Please click <a href="./login.php">here</a> to return to login page
	<?php
	}
	else {
	echo "Passwords do not match" . "<br>";
}
}


	
	
	
	
}
else{
	echo "invalid user, wrong key";
}
?>