<?php

  include('../includes/db.inc.php');

  $busStopNumber = $_POST['busStopNumber'];

  $sqlBusStops = "SELECT * FROM busstops WHERE busStopNumber = '$busStopNumber'";
  if ($sqlResultBusStops = mysqli_query($conn, $sqlBusStops)) {
    while ($rowBusStop = mysqli_fetch_array($sqlResultBusStops)) {
      $busStopName  = $rowBusStop['busStopName'];
    }
    echo $busStopName;
  } else {
    echo "Sorry";
  }

?>