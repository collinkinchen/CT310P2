

<div class="row">
<h2>Comment here: </h2>
    <?php 
    if ($_SESSION['logedIn']==true){
        if (isset ($_POST ['submitC'])){
            $commentTitle = filter_var($_POST['commentTitle'], FILTER_SANITIZE_STRING);
            $commentPara = filter_var($_POST['commentDescription'], FILTER_SANITIZE_STRING);
            
            
            $comment = array ();
            $i = 0;
            $comment [$i ++] = makeNewComment($_GET['key'],$commentTitle, $commentPara);
            addToComments($comment);
            
            }else{
            ?>
            <form method="post" action="#">
            <p>Title: </p>
            <input type="text" size="50" name="commentTitle" />
            <p>Write your comment here: </p>
            <textarea name="commentDescription" rows="5" cols="60"></textarea>
            <br/><br/>
            <input type="submit" name = "submitC"/>
            </form>   
			
			<!-- NEED TO ADD ON HERE A WAY TO CONNECT THE INGREDIENT TO GET THE ID FOR THE DB -->
<?php
            }
    }else{
?>
    <h3>You are not loged in yet!</h3>
    <form method="post" action="./login.php">
        <h3>Login:</h3>
        <input type="submit" name = "Login" value="Login"/>
    </form>  
    <br/>
    
<?php
    }
    $comments = getcomments();
    $ingreName = $_GET['key'];
    loadComment($comments, $ingreName);
    
?>
    
    </div>
    </div>
