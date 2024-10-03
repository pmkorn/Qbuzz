<?php

  session_start();
  
  include('../conn/db.inc.php');
  
  $employeeUserName = mysqli_real_escape_string($conn, $_POST['employeeUserName']);
  $employeeUserPassword = mysqli_real_escape_string($conn, $_POST['employeeUserPassword']);
  $employeeUserPassword = stripslashes($employeeUserPassword);
  $employeeHashedUserPassword = hash('sha256', $employeeUserPassword);

  $sqlEmployeeLogin = "SELECT * FROM employees WHERE employeeUserName = '$employeeUserName' AND employeeUserPassword = '$employeeHashedUserPassword' AND employeeIsActive = 1 LIMIT 1";

  if ($sqlEmployeeLoginResult = mysqli_query($conn, $sqlEmployeeLogin)) {
    if (mysqli_num_rows($sqlEmployeeLoginResult) > 0 ) {
      while ($row = mysqli_fetch_array($sqlEmployeeLoginResult)) {
        $employeeID = $row['employeeID'];
        $_SESSION['employeeID'] = $employeeID;

        $employeeRole = $row['employeeRole'];
        $_SESSION['employeeRole'] = $employeeRole;

        $employeeName = $row['employeeFirstName']." ".$row['employeeLastName'];
        $_SESSION['employeeName'] = $employeeName;

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