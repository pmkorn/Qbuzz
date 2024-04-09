<?php

  session_start();

  $id = $_SESSION['employeeID'];

  include('../includes/db.inc.php');
  $update = "UPDATE employees SET employeeOnlineStatus = '0' WHERE employeeID = '$id'";
  $resultUpdate = mysqli_query($conn, $update);
  mysqli_close($conn);

  session_destroy();

  header("Location: /");

?>