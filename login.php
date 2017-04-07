<?php  
   $pageName = 'login';
   $headertext = "Ingredients for You (IFY) - Login";
   include 'head.php';
   include 'Support.php';
   include 'control.php';
   $users = readUsers();
?>
				
   <!--              <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
                            <li><a href="./Homepage.php">Home</a></li>
                            <li><a href="./vanilla.php">Vanilla</a></li>
                            <li><a href="./pumpkin.php">Pumpkin</a></li>
                            <li><a href="./kale.php">Kale</a></li>
                            <li><a href="./tomato.php">Tomato</a></li>
                            
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Class<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://www.cs.colostate.edu/~ct310">CT310</a></li>
                                </ul>
                            </li>
                            <li><a href="./aboutus.php">About Us</a></li>
                        </ul>
                        
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="./login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                        </ul>
                            
			
			</div> -->
			</div>
		</nav>
		
		<?php
		
		if ($_SESSION['logedIn']==true){
                    if (isset($_POST['submit'])){
                        session_unset(); 
                        session_destroy(); 
                        $_SESSION['logedIn']=false;
                        //header('Location: ./Homepage.php');  
                    }else{
		?>
		
                <div class="container">
		<form method="post" action = "#">
                    <h3>Logout</h3>
                    <input type="submit" name = "submit" value = "Logout"/>
                </form>   
                </div>
                
                <?php
                }
                }else{
                
                ?>
		
                <div class="container">
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

        <div class="login">
            <?php
                
                if(isset($_SESSION['use'])) {
                    header("Location:Homepage.php"); 
                }
            
                if (isset ( $_POST ['op'] )) {
	$usr = strip_tags($_POST ['user']);
	$psw = strip_tags($_POST ['pass']);
	
		if (password_verify($psw, userHashByName($users, $usr))) {
			$_SESSION ['startTime'] = time ();
			$_SESSION ['Username'] = $usr;
			$_SESSION ['group'] = getGroup($users, $usr);
			$_SESSION['logedIn'] = true;
			//header ( "Location: ./Homepage.php" );
		}
		else {
			echo "<p style='color:red;'>" . "Username or password is incorrect" . "<br>";
		}
	// }
}
		
		else { }
		}

            ?>
        </div>

<?php  
   include 'foot.php';
?>
