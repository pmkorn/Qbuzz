<?php

$page = basename($_SERVER['PHP_SELF']);

switch($page){
	
	case "index.php";
		$page = "Dashboard";
		break;
	
	case "obstructions.php";
		$page = "Stremmingen";
		break;
	
	case "busstop_workorders.php";
		$page = "Werkorders";
		break;
	
	case "profile.php";
		$page = "Account";
		break;

	case "about.php";
		$page = "Over ons";
		break;

	case "contact.php";
		$page = "Contact";
		break;

	case "Login.php";
		$page = "Login";
		break;

	case "register.php";
		$page = "Registreren";
		break;

	case "movie.php";
		$page = "Films";
		break;
}

?>