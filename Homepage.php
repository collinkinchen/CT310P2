<?php  
   $headertext = "Ingredients for You (IFY)";
   include 'head.php';
?>
                 <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
                            <li class="active"><a href="./Homepage.php">Home</a></li>
                            <li><a href="./vanilla.php">Vanilla</a></li>
                            <li><a href="./pumpkin.php">Pumpkin</a></li>
                            <li><a href="./kale.php">Kale</a></li>
                            <li><a href="./tomato.php">Tomato</a></li>
                            
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
			<div class="col-sm-4 col-md-4 col-lg-2">
			<div class="list-group">
			<span class="hidden-xs">
				<a href="" class="list-group-item list-group-item-myHome">Home</a>
                <a href="./vanilla.php" class="list-group-item list-group-item-Vanilla">Vanilla</a>
				<a href="./pumpkin.php" class="list-group-item list-group-item-Pumpkin">Pumpkin</a>
                <a href="./kale.php" class="list-group-item list-group-item-Kale">Kale</a>
                <a href="./tomato.php" class="list-group-item list-group-item-Tomato">Tomato</a>
			</span>
			</div>
			</div>
                
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                <div class="mainmain">
                <h2>Welcome!</h2>
                        <p class="text-justify">
                                This is a homepage for CSU <a href="http://www.cs.colostate.edu/~ct310">CT 310</a> course project: Ingredients For You (IFY). 
                        </p>
				
                        <div class="col-md-4 col-lg-5">
                            <div class="thumbnail">
				<a href="./vanilla.php">
                                    <img src="./vanilla.jpg" class="img-thumbnail" alt="Vanilla" style="width:100%, height:100%, margin: 0 auto;">
				</a>
                                <div class="caption">
                                    <p>
									Vanilla
									<br/>
									Source: Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Vanilla_chamissonis_habitat.JPG">Vanilla chamissonis habitat</a>
									</p>
                                </div>
                            </div>
                                
                            <div class="thumbnail">
				<a href="./pumpkin.php">
                                    <img src="./pumpkin.jpg" class="img-thumbnail" alt="Pumpkin" style="width:100%, height:100%, margin: 0 auto;"> 
				</a>
                                <div class="caption">
                                    <p>
									Pumpkin
									<br/>
									Source: Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Pumpkins_1.JPG">Pumpkins 1</a>
									</p>
                                </div>
                            </div>
                        </div>
                                
                        <div class="col-md-4 col-lg-5">
                            <div class="thumbnail">
                                <a href="./kale.php">
                                    <img src="./kale.jpg" class="img-thumbnail" alt="Kale" style="width:100%, height:100%, margin: 0 auto;"> 
                                </a>
                                <div class="caption">
                                    <p>
									Kale
									<br/>
									Source: Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Starr_081031-0376_Brassica_oleracea.jpg">Starr 081031-0376 Brassica oleracea</a>
									</p>
                                </div>
                            </div>
                            
                            <div class="thumbnail">
				<a href="./tomato.php">
                                    <img src="./tomato.jpg" class="img-thumbnail" alt="Tomato" style="width:100%, height:100%, margin: 0 auto;"> 
				</a>
                                <div class="caption">
                                    <p>
									Tomato
									<br/>
									Source: Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Tomate_2008-2-20.JPG">Tomate 2008-2-20</a>
									</p>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
		
<?php  
   include 'foot.php';
?>

