<?php
	function getIsActive($pageName, $nav_name){
		if($pageName == $nav_name){
			echo ' class="active"';
		} 
		echo "";
	}
?>


<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
                <meta name="Author" content="Lingyang Zhu, Collin Kinchen">
                <meta name="Description" content="CT310 Project1">
                <meta name="Keywords" content="Bootstrap, HTML, CSS, JavaScript">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
		
                <title><?php echo $headertext ?></title>
	</head>

<body>
    <div class="header">
        <img src="./assets/img/CSUlogo.jpg" class="headerImg" alt="LOGO" width="385" height="170" style="width:100%, height:100%"> 
        <div class = "headerText">
            <h1><?php echo $headertext ?></h1>
        </div>

    </div>
    <nav class="navbar navbar-custom">
			<div class="container-fluid">
				
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>       
						<span class="icon-bar"></span>      
						<span class="icon-bar"></span>     
                                </button>
					
                             <!--   <a class="navbar-brand" href="https://www.cs.colostate.edu/~ct310/yr2017sp/">CT 310</a>   -->
							 
							 <div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
                            <li <?php getIsActive($pageName, 'home')?>><a href="./Homepage.php">Home</a></li>
                            <li <?php getIsActive($pageName, 'ingredient')?>><a href="./ingredients.php">Ingredient</a></li>
                            
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Class<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://www.cs.colostate.edu/~ct310">CT310</a></li>
                                </ul>
                            </li>
                            <li <?php getIsActive($pageName, 'aboutus')?>><a href="./aboutus.php">About Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
            <li <?php getIsActive($pageName, 'login')?>><a href="./login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
			<li <?php getIsActive($pageName, 'basket')?>><a href="./basket.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket</a></li></ul>
                         
                              		                              
  					  			
  			</div>		  	
          </div>
		</nav>
		<div class="container-fluid">
			<div class="row visible-on">
			<div class="col-sm-4 col-md-3 col-lg-2">
			<div class="list-group">
			<span class="hidden-xs">
				<a href="./Homepage.php" class="list-group-item list-group-item-myHome">Home</a>
                <a href="./ingredients.php" class="list-group-item list-group-item-Vanilla">Ingredients</a>
				<a href="./login.php" class="list-group-item list-group-item-Pumpkin">Login</a>
                <a href="./aboutus.php" class="list-group-item list-group-item-Kale">About Us</a>
                <a href="./basket.php" class="list-group-item list-group-item-Tomato">Basket</a>
			</span>
			</div>
			</div>
