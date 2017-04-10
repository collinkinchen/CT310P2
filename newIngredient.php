<?php

include 'Support.php';
include 'control.php';
$headertext = "Ingredients for You (IFY)";
include 'head.php';
?>
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
<h2>Add New Ingredient</h2>

<form method="post" action="#" enctype="multipart/form-data">
      Ingredient Name:<input type="text" name="name" size="30"><br/><br/>
	  Description:<input type="text" name="text" size="30"><br/><br/>
	  Price:<input type="text" name="price" size="30"><br/><br/>
	  Picture Source:<input type="text" name="picture_source" size="30"><br/><br/>
	  Text Source:<input type="text" name="text_source" size="30"><br/><br/>
	  <!--Picture Name:<input type="text" name="picture_name" size="30"><br/><br/> -->
	  
	  
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <!--<input type="submit" value="Upload Image" name="submit">-->
    <input type="hidden" value="done" name="pic"> 
        
	  
	  
	  
     <input type="hidden" value="done" name="op"> 
     <input type="submit">
   </form>
 </div>
 
<!-- <form action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    <input type="hidden" value="done" name="pic"> 
</form>-->

 
 
 
 
 <?php

if (isset ( $_POST ['op'] )) {

       
	?>
	Please click <a href="./login.php">here</a> to return to login page
	<?php
	
	
	
	
	 if(isset( $_POST['pic'])){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["op"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
	
	
        $ingres = array ();
	$i = 0;
	$ingres [$i ++] = makeNewIngredient($_POST['name'],$_POST['picture_source'],$_POST['text'],$_POST['text_source'],"./" . $target_file,$_POST['price']);
	
	echo $_POST['name'] . "<br>";
	echo $_POST['picture_source'] . "<br>";
	echo $_POST['text'] . "<br>";
	echo $_POST['text_source'] . "<br>";
	echo $target_file . "<br>";
	echo $_POST['price'] . "<br>";
	
	addToIngredients($ingres);
	
        chmod("./" . $target_file, 0755);
	
	
	
	
	}
	?>
