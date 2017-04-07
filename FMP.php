<?php
include 'control.php';

$pageName = 'passwordReset';
$headertext = "Ingredients for You (IFY) - Password Reset";
include 'head.php';
include 'Support.php';
include 'create.php';

$ingres = getIngres(); 
$users = readUsers(); 
?>


                
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
<div class="mainmain">
<form method="post" action="./FMP.php">
      <select name="username">
		<?php 
		echo "\n";
		foreach ($users as $u) {
			// echo "test";
          $flag = ($u->username == $_SESSION['Username']) ? 'selected' : '';
          echo "\t\t\t\t<option value=\"$u->username\" $flag > $u->username </option>\n";
         }
			?>
</select>
     <input type="hidden" value="done" name="signUpOp"> 
     <input type="submit">
   </form>
 </div>  
 
 <?php

if (isset ( $_POST ['signUpOp'] )) {
	//send email here
	$username     = $_POST['username'];
	foreach ( $users as $u ) {
		if ($u->username == $username) {
			$email = $u->email;
			$_SESSION["Username"] = $username;
		}
	}
	// echo $email;
	$str = 'aBcdEFgHiJkLMNoPqRSTuvwxYZ123456789';
	$key = str_shuffle($str);
	$_SESSION['key'] = $key;
	$URL = "http://www.cs.colostate.edu/~lyzhu/proj/test/CT310P2/passwordreset.php?key=" . $key;
	$content = "Please click the following link to reset your password " . $URL ; 
	
	error_reporting(0);
	if(mail($email, 'From CT 310 Assignment 6: Password Reset Form', $content)) {
		echo "<h2 align=\"center\">Your Email was Sent to $email</h2>\n";
		// echo var_dump(parse_url($URL));
		// echo $_SERVER["REQUEST_URI"];
		
	}
	else {
	   echo "<p>$username, there was an error trying to send your comment.</p>\n";
	}
}
?>
 
</body>
</html>
