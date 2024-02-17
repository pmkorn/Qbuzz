<?php

/*$token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$token = str_shuffle($token);
$token = substr($token, 0, 8);

echo($token);
echo "<br>";*/

include('db.inc.php');

$sqlBusStops = 'SELECT * FROM busstops';
$result = mysqli_query($conn, $sqlBusStops);
$json_array = array();

while ($data = mysqli_fetch_assoc($result)) {
  $json_array[] = $data;
}

echo json_encode($json_array);

?>