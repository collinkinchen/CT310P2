<html>
<div class="header">
<link href="./style.css" rel="stylesheet" type="text/css" />
<?php echo "   <h2> Please sign up for this site </h2>\n"; ?>
</div>

<body>


<div class="form">
<form method="post" action="./login.php">
      Username:    <input type="text" name="username"    size="30"><br/>
      Password:<input type="password" name="password" size="30"><br/>
      Email:<input type="text" name="email" size="30"><br/>
     <input type="hidden" value="done" name="signUpOp"> 
     <input type="submit">
   </form>
 </div>  
</body>
</html>
