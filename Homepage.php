<?php    
include 'control.php';

$pageName = 'home';
$headertext = "Ingredients for You (IFY)";
include 'head.php';
include 'Support.php';
include 'create.php';

$ingres = getIngres(); 
if (isset ( $_POST ['ingre'] )) {
	$ingredient = strip_tags($_POST ['ingre']);
	$_SESSION ['ingredient'] = $ingredient;
	header ( "Location: ./ingredients.php" );
}



?>

			</div>
		</nav>
		<div class="container-fluid">
			<div class="row visible-on">
			<div class="col-sm-4 col-md-4 col-lg-2">
			<div class="list-group">
			<span class="hidden-xs">
				<a href="./Homepage.php" class="list-group-item list-group-item-myHome">Home</a>
                <a href="./ingredients.php" class="list-group-item list-group-item-Vanilla">Ingredients</a>
				<a href="./login.php" class="list-group-item list-group-item-Pumpkin">Login</a>
                <a href="./aboutus.php" class="list-group-item list-group-item-Kale">About Us</a>
			</span>
			</div>
			</div> 
                
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
				
                <div class="mainmain">
                <h2>Welcome!</h2>
                        <p class="text-justify">
                                This is a homepage for CSU <a href="http://www.cs.colostate.edu/~ct310">CT 310</a> course project: Ingredients For You (IFY). 
                                <br/><br/>
                                Please select an ingredient you want to view here:
                        </p>
                        <form action="#" method="post">
                            <select name="ingre">	
                            <?php 
                            echo "\n";
                            foreach ($ingres as $ingre) {
                            $flag = 'selected';
                            echo "\t\t\t\t<option value=\"$ingre->ingredientName\" $flag > $ingre->ingredientName </option>\n";
                            }
                            ?>
                            </select> 
                            <input type="submit" value = "Submit"/>
                        </form>
				
                        <?/*

                        */?>
                        </div>
                </div>
            </div>
		
<?php  
   include 'foot.php';
?>

