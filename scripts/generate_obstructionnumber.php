<?php

  include('../includes/db.inc.php');

  $obstructionRegion = $_POST['obstructionRegion'];

  $sql = "SELECT * FROM obstructions WHERE obstructionRegion = '$obstructionRegion'";

  if ($result = mysqli_query($conn, $sql)) {
    echo $rowCount = mysqli_num_rows($result);
  }

?>