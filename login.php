<?php  
   include 'Support.php';
   include 'control.php';
   $users = readUsers();
   $pageName = 'login';
   $headertext = "Ingredients for You (IFY) - Login";
   include 'head.php';
		
	if ($_SESSION['logedIn']==true){
        if (isset($_POST['submit'])){
            session_unset(); 
            session_destroy(); 
            $_SESSION['logedIn']=false;
            header('Location: ./login.php');  
        }else{
?>
		
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
		<div class="mainmain">
		<form method="post" action = "#">
		<p>
		<?php
		$name = $_SESSION ['userName'];
		$time = $_SESSION ['startTime'];
		echo "$name login time: $time";
		?>
		<br/><br/>
		You can logout here:
		</p>
            <input type="submit" name = "submit" value = "Logout"/>
        </form>  
		</div>
	</div>
                
<?php
}
}else{
?>

            <?php
            
                if (isset ( $_POST ['op'] )) {
	$usr = strip_tags($_POST ['user']);
	$psw = strip_tags($_POST ['pass']);
	
		if (password_verify($psw, userHashByName($users, $usr))) {
			$time = date('l jS \of F Y h:i:s A');
			$_SESSION ['startTime'] = $time;
			$_SESSION ['userName'] = $usr;
			$_SESSION ['group'] = getGroup($users, $usr);
			$_SESSION['logedIn'] = true;
			echo "$usr login success! Logged in at: $time";
		}
		else {
			echo "<p style='color:red;'>" . "Username or password is incorrect" . "<br>";
		}
	// }
}
		
		else { 
		
?>
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
		<div class="mainmain">
		<form method="POST" action="#">
			Username:</br>
			<input type="text" name="user"></br>
			Password:</br>
			<input type="password" name="pass"></br>
			</br>
			<input type="hidden" value="done" name="op"> 
			<input type="submit" value="Login">
		</form>
		Forgot Password? <a href="./FMP.php">Click Here</a>
	</div>

<?php  
}}
   include 'foot.php';
?>
