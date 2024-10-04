<?php

  session_start();

  $employeeID = $_SESSION['employeeID'];

  include('../conn/db.inc.php');
  $update = "UPDATE employees SET employeeLastLogin = now(), employeeOnlineStatus = 0 WHERE employeeID = '$employeeID'";
  $resultUpdate = mysqli_query($conn, $update);
  mysqli_close($conn);

  session_destroy();

  header("Location: /");

?>