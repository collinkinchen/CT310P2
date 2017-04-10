<?php    
include 'control.php';

$pageName = 'home';
$headertext = "Ingredients for You (IFY)";
include 'head.php';
include 'Support.php';
include 'create.php';
$users = readUsers();
$ingres = getIngres(); 
$comment = getcomments();

if (isset ( $_GET ['ingre'] )) {
	$ingredient = strip_tags($_GET ['ingre']);
	header ( "Location: ./ingredients.php?key=$ingredient" );
}

function showTable(){
    $ingres = getIngres();
    foreach ( $ingres as $u ) {
        echo "<div>";
        $name = getName($u);
        echo "Item: <a href=\"./ingredients.php?key=$name\">$name    </a>";
        echo "<a href=\"./ingredients.php?key=$name\">";
        $img = getPicName($ingres,$name);
	echo "<img src=\"$img\" class=\"img-thumbnail\" alt=\"$name\" style=\"width=\"300\" height=\"300\";\"></a></div>"; 
    }
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
                <div class = "row">
		<?php 
		showTable();
		?>
                        </div>
                </div>
            </div>
		
<?php  
   include 'foot.php';
?>

