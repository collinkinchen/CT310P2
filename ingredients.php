<?php  
    if(!isset($ingredient)){
		$ingredient = "vanilla";
	}
	
	function getIsActive($ingredient, $nav_name){
		if($ingredient == $nav_name){
			return ' class="active"';
		} 
		return "";
	}
    
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
							<img src="./assets/img/<?php echo "$ingredient"; ?>.jpg" class="img-thumbnail" alt="<?php echo "$ingredient"; ?>" style="width:100%, height:100%, margin: 0 auto;">
						<div class="caption">
							<p>
							<?php echo "$ingredient"; ?>
							<br/>
							<?php
							/* Should be:
							displayPicSource($ingredient);
							*/
							?>
							Source: Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Starr_081031-0376_Brassica_oleracea.jpg">Starr 081031-0376 Brassica oleracea</a>
							</p>
						</div>
					</div>
				
                </div>
                        
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
				<h2><?php echo "$ingredient"; ?>:</h2>
				<p>
				<?php
                                /* Should be:
                                displayIngredientDescription($ingredient);
                                */
                                ?>
                                    Kale (English IPA /keɪl/) or leaf cabbage refers to certain vegetable cultivars of the plant species Brassica oleracea. A kale plant has green or purple leaves and the central leaves do not form a head (as with headed cabbages). Kales are considered to be closer to wild cabbage than most domesticated forms of Brassica oleracea.
				</p>
				<br/><br/>
				<h3>Citation:</h2>
				<p>
				<?php
                                /* Should be:
                                displayIngredientDescriptionSource($ingredient);
                                */
                                ?>
                                    <a href="https://en.wikipedia.org/wiki/Kale">Kale</a>. Wikipedia. Retrieved March 05, 2017. <br/>
				</p>
			</div>
			</div>
		
<?php  
    include 'comment.php';
    include 'foot.php';
?>

