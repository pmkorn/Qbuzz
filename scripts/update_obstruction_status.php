<?php

  $obstructionID = $_POST['obstructionID'];

  include('../includes/db.inc.php');

  $sql = "UPDATE obstructions SET obstructionStatus = 3 WHERE obstructionID = '$obstructionID'";
  if (mysqli_query($conn, $sql)) {

  } else {

  }

?>