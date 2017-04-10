<?php    
include 'control.php';

$pageName = 'home';
$headertext = "Ingredients for You (IFY)";
include 'head.php';
include 'Support.php';
include 'create.php';
$users = readUsers();
$ingres = getIngres(); 

if (isset ( $_GET ['ingre'] )) {
	$ingredient = strip_tags($_GET ['ingre']);
	header ( "Location: ./ingredients.php?key=$ingredient" );
}



?>
                
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
				
                <div class="mainmain">
                <h2>Welcome!</h2>
                        <p class="text-justify">
                                This is a homepage for CSU <a href="http://www.cs.colostate.edu/~ct310">CT 310</a> course project: Ingredients For You (IFY). 
                                <br/><br/>
                                Please select an ingredient you want to view here:
                        </p>
                        <form method="get">
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

