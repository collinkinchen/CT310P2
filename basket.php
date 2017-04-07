<?php  
include 'Support.php';
include 'control.php';

    if(!isset($_SESSION["Username"])){
		header('Location: ./Homepage.php');
	}

	$users = readUsers(); 
	
	
	$pageName = 'basket';
    $headertext = "Ingredients for You (IFY) - basket";
   include 'head.php';

?>

			
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
			
			<?php 
			if (isset($_POST ['submit'])){	
				$username = $_SESSION["Username"];
				foreach ( $users as $u ) {
					if ($u->username == $username) {
						$email = $u->email;
					}
				}
				$str = '12345678901234567890';
				$id = str_shuffle($str);
				$_SESSION['orderID'] = $id;
				$content = "Your order get submitted! Order id is: " . $id ;
				$adminContent = "User " . $username . " just submitted an order, order ID is: " . $id ;
	
				if(mail($email, 'Order Confirmation from CT310 Project', $content)&&mail('kathypizza330@gmail.com', 'Order Confirmation from CT310 Project', $adminContent)) {
					echo "<h2 align=\"center\">Order Submitted! You will receive a confirmation email soon.</h2>\n";
				}
				else {
					echo "<p>$username, there was an error trying to submit your order.</p>\n";
				}
			}else{
			?>
			
				<h2>Order Detail:</h2>
				<br/><br/>
				
				<h2>
				<form method = "post"><input type="submit" name="submit" value="Submit Order"> </form>
				</h2>
			</div>
			</div>
<?php 
			}
    include 'foot.php';
?>