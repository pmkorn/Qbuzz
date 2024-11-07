<?php

    include('../conn/db.inc.php');

    $employeeID       = $_POST['employeeID'];
    $employeeIsActive = $_POST['employeeIsActive'];

    if ($employeeIsActive == 0) {
      $sql = "UPDATE employees SET employeeIsActive = 1 WHERE employeeID = '$employeeID'";
      if ($result = mysqli_query($conn, $sql)) {
        echo '<input class="form-check-input" type="checkbox" role="switch" id="employee-'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-is-active="'.$row['employeeIsActive'].'" checked>';
      } else {
        echo 'Status update niet gelukt, probeer opnieuw!!!';
      }
    } else if ($employeeIsActive == 1) {
      $sql = "UPDATE employees SET employeeIsActive = 0 WHERE employeeID = '$employeeID'";
      if ($result = mysqli_query($conn, $sql)) {
        echo '<input class="form-check-input" type="checkbox" role="switch" id="employee-'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-is-active="'.$row['employeeIsActive'].'">';
      } else {
        echo 'Status update niet gelukt, probeer opnieuw!!!';
      }
    }

?>