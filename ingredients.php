<?php  
include 'Support.php';
include 'control.php';

        if(!isset($_SESSION ['ingredient'])){
		$ingredient = "vanilla";
	}else{
            $ingredient = $_SESSION ['ingredient'];
	}
	
	    $ingres = getIngres(); 
	
	$pageName = 'ingredient';
    $headertext = "Ingredients for You (IFY) - $ingredient";
   include 'head.php';

?>

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
			<?php if(isset ($_SESSION['group'])){
					if($_SESSION['group'] == 'Administrator'){?>
				 <a href="./newIngredient.php">Click here to add new ingredient</a>
			
		
<?php  
					}
			}
    include 'comment.php';
    include 'foot.php';
?>

