<?php

include('../includes/db.inc.php');

$workOrderID = $_POST['workOrderID'];
$workOrderRepairNotification = $_POST['inputNewWorkOrderRepairNotification'];
$workOrderFinalizedBy = $_POST['workOrderFinalizedBy'];

$sqlFinalizeWorkOrder = "UPDATE workorders SET workOrderRepairNotification = '$workOrderRepairNotification', workOrderStatus = '1', workOrderEndDate = now(), workOrderFinalizedBy = '$workOrderFinalizedBy' WHERE workOrderID = '$workOrderID'";

if(mysqli_query($conn, $sqlFinalizeWorkOrder)) {

} else {

}

?>