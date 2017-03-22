<?php  
   $headertext = "Ingredients for You (IFY) - Login";
   include 'head.php';
?>
				
                 <div id="navbar" class="navbar-collapse collapse">
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
                            
			
			</div>
			</div>
		</nav>
		
		<?php
		
		if ($_SESSION['logedIn']==true){
                    if (isset($_POST['submit'])){
                        session_unset(); 
                        session_destroy(); 
                        $_SESSION['logedIn']=false;
                        header('Location: ./Homepage.php');  
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
			<input type="submit" value="Login">
		</form>
	</div>

        <div class="login">
            <?php
                
                if(isset($_SESSION['use'])) {
                    header("Location:Homepage.php"); 
                }
            
                if (isset($_POST['user']) && isset($_POST['pass'])) {
                
                    $username = $_POST['user'];
                    $encrypted_password = md5($_POST['pass']);
                
                    if ($username == "dlaw" && $encrypted_password == "a863fab21f25ad67f9a9b1bf2349ff52") {
			
                        $_SESSION['logedIn'] = true;
                        
                        echo '<script type="text/javascript"> window.open("Homepage.php","_self");</script>';
			
			
			//echo "Logged in on" . date(" Y-m-d ") . "at" . date(" h:i:sa");
                    }
                    
                    if ($username == "pizza" && $encrypted_password == "7cf2db5ec261a0fa27a502d3196a6f60") {
			
                        $_SESSION['logedIn'] = true;
                        
                        echo '<script type="text/javascript"> window.open("Homepage.php","_self");</script>';
			
			
			//echo "Logged in on" . date(" Y-m-d ") . "at" . date(" h:i:sa");
                    }
			
                    else if ($username == "ct310" && $encrypted_password == "3aaec86181ee6974b99d893b4c1eb5b5") {
                        
                        $_SESSION['logedIn'] = true;
                        
                        echo '<script type="text/javascript"> window.open("Homepage.php","_self");</script>';
                        
			//echo "Logged in on" . date(" Y-m-d ") . "at" . date(" h:i:sa");
                    }
                    
                    
                    else {
			echo "Invalid login on" . date(" Y-m-d ") . "at" . date(" h:i:sa");
                    }
                    
		}
		
		else { }
		}

            ?>
        </div>

<?php  
   include 'foot.php';
?>
