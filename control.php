<?php
$sessiName = "ingredientProjectSession";
session_name ( $sessiName );
if(!isset($_SESSION)) {
    // session isn't started
    session_start();
}

if (! isset ( $_SESSION ['startTime'] )) {
	$time = date('l jS \of F Y h:i:s A');
	$_SESSION ['startTime'] = $time;
}
if (! isset ( $_SESSION ['userName'] )) {
	$_SESSION ['userName'] = "Guest";
}
if (!isset($_SESSION['logedIn']) )
$_SESSION['logedIn'] = false;
?>
