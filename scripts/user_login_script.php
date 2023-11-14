<?php

  session_start();

  $employeeUserName = $_POST['employeeUserName'];
  $employeeUserPassword = $_POST['employeeUserPassword'];
  $hashedEmployeeUserPassword = hash('sha256', $employeeUserPassword);

  include('../includes/db.inc.php');

  $sqlEmployeeLogin = "SELECT * FROM employees WHERE employeeUserName = '$employeeUserName' AND employeeUserPassword = '$hashedEmployeeUserPassword' AND employeeISActive = 1 LIMIT 1";

  if ($sqlEmployeeLoginResult = mysqli_query($conn, $sqlEmployeeLogin)) {
    if (mysqli_num_rows($sqlEmployeeLoginResult) > 0 ) {
      while ($row = mysqli_fetch_array($sqlEmployeeLoginResult)) {
        $employeeID = $row['employeeID'];
        $_SESSION['employeeID'] = $employeeID;

        $employeeLoginUpdate = "UPDATE employees SET employeeLastLogin = now(), employeeOnlineStatus = '1' WHERE employeeID = '$employeeID'";
        $employeeResultUpdate = mysqli_query($conn, $employeeLoginUpdate);
        mysqli_close($conn);
      }
      echo "success";
    } else {
      echo "fail";
    }
    
  } else {
    
  }
  
  

?>