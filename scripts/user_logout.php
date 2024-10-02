<?php

  session_start();

  $memberID = $_SESSION['memberID'];

  include('../conn/db.inc.php');
  $update = "UPDATE members SET onlineStatus = '0' WHERE memberID = '$memberID'";
  $resultUpdate = mysqli_query($conn, $update);
  mysqli_close($conn);

  session_destroy();

  header("Location: /");

?>