<?php
// Start the session
session_name("Ingredient");
session_start();
if (!isset($_SESSION['logedIn']) )
$_SESSION['logedIn'] = false;
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
                <meta name="Author" content="Lingyang Zhu, Derek Law">
                <meta name="Description" content="CT310 Project1">
                <meta name="Keywords" content="Bootstrap, HTML, CSS, JavaScript">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<link href="./projectstyle00.css" rel="stylesheet" type="text/css" />
		
                <title><?php echo $headertext ?></title>
	</head>

<body>
    <div class="header">
        <img src="./CSUlogo.jpg" class="headerImg" alt="LOGO" width="385" height="170" style="width:100%, height:100%"> 
        <div class = "headerText">
            <h1><?php echo $headertext ?></h1>
        </div>

    </div>
    <nav class="navbar navbar-custom">
			<div class="container-fluid">
				<div class="navbar-header">
				
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>       
						<span class="icon-bar"></span>      
						<span class="icon-bar"></span>     
                                </button>
					
                                <a class="navbar-brand" href="https://www.cs.colostate.edu/~ct310/yr2017sp/">CT 310</a>
				</div>
				
