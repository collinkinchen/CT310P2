<?php

include 'Support.php';
include 'control.php';
$headertext = "Ingredients for You (IFY)";
include 'head.php';
?>
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
<h2>Add New Ingredient</h2>

<form method="post" action="#">
      Ingredient Name:<input type="text" name="name" size="30"><br/><br/>
	  Description:<input type="text" name="text" size="30"><br/><br/>
	  Price:<input type="text" name="price" size="30"><br/><br/>
	  Picture Source:<input type="text" name="picture_source" size="30"><br/><br/>
	  Text Source:<input type="text" name="text_source" size="30"><br/><br/>
	  Picture Name:<input type="text" name="picture_name" size="30"><br/><br/>
     <input type="hidden" value="done" name="op"> 
     <input type="submit">
   </form>
 </div>
 <?php

if (isset ( $_POST ['op'] )) {
	makeNewIngredient($_POST['name'],$_POST['picture_source'],$_POST['text'],'<a href=\"' . $_POST['text_source'] . '\">Text Source</a>',$_POST['picture_name'],$_POST['price']);
	?>
	Please click <a href="./login.php">here</a> to return to login page
	<?php
	}
	?>