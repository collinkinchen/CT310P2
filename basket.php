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
				echo "<th>Item price: $$price</th>"; 
				$total+=$price;
				echo "<th>Item link:<a href=\"./ingredients.php?key=$u\">  $u</a></th>"; 
				echo "<th>Remove item:<a href=\"?search=$count\">  Remove</a></th>"; 
			echo "</tr>";
			$count+=1;
		}
		echo "</table></p>";
		echo "<h3>Total: $$total</h3>";
}	

function getTotal(){
    $ingres = getIngres();
    $total = 0;
    if (isset($_SESSION["ItemArray"] )){
		foreach ( $_SESSION["ItemArray"] as $u ) {
				$price = getPrice($ingres, $u);
				$total+=$price;
		}
		}
		return $total;
}

function getNames(){
    $ingres = getIngres();
    $res = "\n";
    if (isset($_SESSION["ItemArray"] )){
    foreach ( $_SESSION["ItemArray"] as $u ) {
        $res .="Item: ";
        $res .=$u;
        $res .="\n";
    }
    }
    return $res;
}
	

?>

			
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
			<?php 
			if (isset($_POST ['submit'])){	
				$username = $_SESSION["userName"];
				foreach ( $users as $u ) {
					if ($u->username == $username) {
						$email = $u->email;
					}
				}
				foreach ( $users as $u ) {
					if ($u->username == "ct310") {
						$Aemail = $u->email;
					}
				}
				$str = '1234567890';
				$id = str_shuffle($str);
				$total = getTotal();
				$nameTable = getNames();
				$content = "Your order get submitted! Order id is: " . $id . "\nHere's the items you ordered: " . $nameTable . " Your total is $$total";
				$adminContent = "User " . $username . " just submitted an order, order ID is: " . $id . "\nItems ordered are: " . $nameTable . "Total is $$total";
                                
                                if ($total!=0){
				if(mail($email, 'Order Confirmation from CT310 Project', $content)&&mail($Amail, 'Order Confirmation from CT310 Project (admin)', $adminContent)) {
                                        $_SESSION["ordered"] = true;
                                        unset($_SESSION["ItemArray"]);
					echo "<h2 align=\"center\">Order Submitted! You will receive a confirmation email soon.</h2>\n";
					
				}
				else {
					echo "<p>$username, there was an error trying to submit your order.</p>\n";
				}
				}
			}else{
				
			?>
				<h3>Order Detail:</h3>
				<?php showList();?>
				<br/><br/>
                        <?php
                            if (!isset($_SESSION ["nothing"])){
                            ?>
				<h2>
				<form method = "post" action = "#"><input type="submit" name="submit" value="Submit Order"> </form>
				</h2>
			<?php
				}
			}
			?>
			</div>
<?php 
    include 'foot.php';
?>
