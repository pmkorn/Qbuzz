<?php

include('../includes/db.inc.php');

$workOrderDescription = $_POST['inputNewWorkOrderDescription'];
$busStopID = $_POST['busStopID'];
$workOrderStatus = '0';

$sqlInsertWorkOrder = "INSERT INTO workorders (busStopID, workOrderDescription, workOrderStatus, workOrderAddDate) 
                                        VALUES('".$busStopID."', '".$workOrderDescription."', '".$workOrderStatus."', now() )";

if(mysqli_query($conn, $sqlInsertWorkOrder)) {

} else {

}

?>