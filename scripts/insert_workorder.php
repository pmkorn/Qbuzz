<?php

include('../includes/db.inc.php');

$workOrderNotification = $_POST['inputNewWorkOrderNotification'];
$busStopID = $_POST['busStopID'];
$workOrderStatus = '0';
$workOrderInsertedBy = $_POST['workOrderInsertedBy'];

$sqlInsertWorkOrder = "INSERT INTO workorders (busStopID, workOrderNotification, workOrderStatus, workOrderAddDate, workOrderInsertedBy) 
                                        VALUES('".$busStopID."', '".$workOrderNotification."', '".$workOrderStatus."', now(), '".$workOrderInsertedBy."')";

if(mysqli_query($conn, $sqlInsertWorkOrder)) {

} else {

}

?>