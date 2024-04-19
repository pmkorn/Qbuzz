<?php

include('../includes/db.inc.php');

$employeeID = $_POST['employeeID'];
$sql = "UPDATE employees SET employeeIsActive = 1 WHERE employeeID = '$employeeID'";


?>