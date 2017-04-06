<?php  
include 'Support.php';
include 'control.php';

        if(!isset($_SESSION ['ingredient'])){
		$ingredient = "vanilla";
	}else{
            $ingredient = $_SESSION ['ingredient'];
	}
	
	    $ingres = getIngres(); 
	
	//function getIsActive($ingredient, $nav_name){
	//	if($ingredient == $nav_name){
	//		return ' class="active"';
	//	} 
	//	return "";
	//}
    $headertext = "Ingredients for You (IFY) - $ingredient";
   include 'head.php';

?>
                <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
                            <li><a href="./Homepage.php">Home</a></li>
                            <li class="active"><a href="">Ingredient</a></li>
                            
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Class<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://www.cs.colostate.edu/~ct310">CT310</a></li>
                                </ul>
                            </li>
                            <li><a href="./aboutus.php">About Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="./login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                        </ul>
                            
			
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
                                <?php
                                /*
                                <a href="./ingredients.php" class="list-group-item list-group-item-Tomato">Tomato</a>
                                */
                                ?>
			</span>
			</div>
			</div>
                
                <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
					<div class="thumbnail">
							<img src="<?php $picName = getPicName($ingres,$ingredient); echo "$picName"; ?>" class="img-thumbnail" alt="<?php echo "$ingredient"; ?>" style="width:100%, height:100%, margin: 0 auto;">
						<div class="caption">
							<p>
							<?php echo "$ingredient"; ?>
							
							<br/>
							Source: 
							<?php
							$picSource = displayPicSource($ingres,$ingredient);
                                                        echo "$picSource";
							?>
							</p>
						</div>
					</div>
				
                </div>
                        
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
				<h2><?php echo "$ingredient"; ?>:</h2>
				<p>
				<?php
                                $picSource = displayIngredientDescription($ingres,$ingredient);
                                echo "$picSource";
                                ?>
				</p>
				<br/><br/>
				<h3>Citation:</h2>
				<p>
				<?php
				$picSource = displayIngredientDescriptionSource($ingres,$ingredient);
                                echo "$picSource";
                                ?>
				</p>
			</div>
			</div>
		
<?php  
    include 'comment.php';
    include 'foot.php';
?>

