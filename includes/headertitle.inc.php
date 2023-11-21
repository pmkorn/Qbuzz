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
	
	case "user_profile_page.php";
		$page = "Account";
		break;

	case "admin.php";
		$page = "Admin";
		break;

}

?>