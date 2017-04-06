<?php
$sessiName = "ingredientProjectSession";
session_name ( $sessiName );
session_start ();

if (! isset ( $_SESSION ['startTime'] )) {
	$_SESSION ['startTime'] = time ();
}
if (! isset ( $_SESSION ['userName'] )) {
	$_SESSION ['userName'] = "Guest";
}
if (!isset($_SESSION['logedIn']) )
$_SESSION['logedIn'] = false;
?>
