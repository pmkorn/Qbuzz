<?php

include('includes/db.inc.php');

$sqlBusStops = "SELECT * FROM busstops";

if ($sqlResultBusStops = mysqli_query($conn, $sqlBusStops)) {
  while ($rowBusStop = mysqli_fetch_assoc($sqlResultBusStops)) {
    $output[] = $rowBusStop;
  }
}

$encoded_data = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data.json', $encoded_data);

?>