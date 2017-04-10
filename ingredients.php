<?php  
include 'Support.php';
include 'control.php';

$ingres = getIngres(); 

    if(!$_SERVER['QUERY_STRING']){
		$ingredient = "vanilla";
	}else{
        $ingredient = substr($_SERVER['QUERY_STRING'],4);
		if (!ingredientExist($ingres, $ingredient)){
			$ingredient = "vanilla";
		}
	}
	
	if (isset($_POST ['submit'])){
		$_SESSION ["itemName"] = $ingredient;
		header('Location: ./basket.php');
	}
	
	
	
	$pageName = 'ingredient';
    $headertext = "Ingredients for You (IFY) - $ingredient";
   include 'head.php';

?>
                
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
				<h2>Citation:</h2>
				<p>
				<?php
				$picSource = displayIngredientDescriptionSource($ingres,$ingredient);
                                echo "$picSource";
                                ?>
				</p>
				<br/><br/>
				
				<h2>Price:</h2>
				<p>
				<?php
				$price = getPrice($ingres,$ingredient);
                                echo "$$price";
                                ?>
				</p>
				<br/><br/>
				
				<h2>
				<form method = "post"><input type="submit" name="submit" value="Add to my Basket"> </form>
				</h2>
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

