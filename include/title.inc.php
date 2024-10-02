<?php

$page = basename($_SERVER['PHP_SELF']);

switch($page){
	
	//WEBSITE PAGES
	case "index.php";
		$page = "Home";
		break;

	case "blog.php";
		$page = "Blog";
		break;

	case "gallery.php";
		$page = "Gallerij";
		break;

	case "projects.php";
		$page = "Projecten";
		break;

	case "about.php";
		$page = "Over ons";
		break;

	case "contact.php";
		$page = "Contact";
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