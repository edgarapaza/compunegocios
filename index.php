<?php 
session_start();

echo $_SESSION['estado'];

switch ($_SESSION['estado']) {
	case 1:
		header("Location: inicio.html");	
		break;
		header("Location: landing.php");
	default:
		header("Location: login.php");	
		break;
}

?>