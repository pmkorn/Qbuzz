<?php

$page = basename($_SERVER['PHP_SELF']);

switch($page){
	
	//WEBSITE PAGES
	case "index.php";
		$page = "Home";
		break;

	case "stremmingen.php";
		$page = "Stremmingen";
		break;

	case "meldingen.php";
		$page = "Melding maken";
		break;

	case "register.php";
		$page = "Registreren";
		break;

	// ADMIN PAGES
	case "admin.php";
		$page = "Home";
		break;

	case "admin_blog_overview.php";
		$page = "Blog overzicht";
		break;
	
}

?>