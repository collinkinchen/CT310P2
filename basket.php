<?php  
include 'Support.php';
include 'control.php';

	$pageName = 'basket';
    $headertext = "Ingredients for You (IFY) - basket";
   include 'head.php';

$users = readUsers(); 
$ingres = getIngres();

    if(!$_SESSION['logedIn']){
		header('Location: ./login.php');
	}
	
	 if (isset($_GET['search']))
    {
		$index = $_GET['search'];
		if ($index==1 && count($_SESSION["ItemArray"])==1){
			unset($_SESSION["ItemArray"]);
		}else{
			unset($_SESSION["ItemArray"][$index-1]);
		}
		header('Location: ./basket.php');
    }
	
function showList(){
	$ingres = getIngres();
	$myArray = array();
	
	if (!isset($_SESSION["ItemArray"])){
		
		if (!isset($_SESSION ["itemName"])){
			$_SESSION ["nothing"] = 1;
			echo "You have nothing in your basket now!\n";
			return;
		}
		
		$_SESSION["ItemArray"] = $myArray;
	}
	
		if (isset($_SESSION ["itemName"])){
			unset($_SESSION ["nothing"]);
			$selectedItem = $_SESSION ["itemName"];
			$_SESSION["ItemArray"][] = $selectedItem;
			unset($_SESSION ["itemName"]);
		}
		
		echo "<p><table style=\"width:100%\">";
		
		$count = 1;
		$total = 0;
		foreach ( $_SESSION["ItemArray"] as $u ) {
			echo "<tr>";
				echo "<th>Item name: $u</th>";
				$price = getPrice($ingres, $u);
				echo "<th>Item price: $price</th>"; 
				$total+=$price;
				echo "<th>Item link:<a href=\"./ingredients.php?key=$u\">  $u</a></th>"; 
				echo "<th>Remove item:<a href=\"?search=$count\">  Remove</a></th>"; 
			echo "</tr>";
			$count+=1;
		}
		echo "</table></p>";
		echo "<h3>Total: $total</h3>";
}	
	

?>

			
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
			
				<h3>Order Detail:</h3>
				<?php showList();?>
				<br/><br/>
				
							<?php 
			if (isset($_POST ['submit'])){	
				$username = $_SESSION["Username"];
				foreach ( $users as $u ) {
					if ($u->username == $username) {
						$email = $u->email;
					}
				}
				foreach ( $users as $u ) {
					if ($u->group == "Administrator") {
						$Aemail = $u->email;
					}
				}
				$str = '12345678901234567890';
				$id = str_shuffle($str);
				$_SESSION['orderID'] = $id;
				$content = "Your order get submitted! Order id is: " . $id ;
				$adminContent = "User " . $username . " just submitted an order, order ID is: " . $id ;
	
				if(mail($email, 'Order Confirmation from CT310 Project', $content)&&mail($Aemail, 'Order Confirmation from CT310 Project', $adminContent)) {
					echo "<h2 align=\"center\">Order Submitted! You will receive a confirmation email soon.</h2>\n";
				}
				else {
					echo "<p>$username, there was an error trying to submit your order.</p>\n";
				}
			}else{
				if (!isset($_SESSION ["nothing"])){
			?>
				<h2>
				<form method = "post"><input type="submit" name="submit" value="Submit Order"> </form>
				</h2>
			<?php
				}
			}
			?>
			</div>
<?php 
    include 'foot.php';
?>
