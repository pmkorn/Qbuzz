<?php

include('../includes/db.inc.php');

$employeeID = $_POST['employeeID'];
$employeeIsActive = $_POST['employeeIsActive'];

if ($employeeIsActive == 0) {
  $sqlEmployeeUserStatus = "UPDATE employees SET employeeIsActive = 1 WHERE employeeID = '$employeeID'";
  $sqlEmployeeResultUpdate = mysqli_query($conn, $sqlEmployeeUserStatus);
  echo '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-status="'.$row['employeeIsActive'].'" checked>';
} else if ($employeeIsActive == 1) {
  $sqlEmployeeUserStatus = "UPDATE employees SET employeeIsActive = 0 WHERE employeeID = '$employeeID'";
  $sqlEmployeeResultUpdate = mysqli_query($conn, $sqlEmployeeUserStatus);
  echo '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-status="'.$row['employeeIsActive'].'">';
}
mysqli_close($conn);



?>