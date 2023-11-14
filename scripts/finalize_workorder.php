<?php

include('../includes/db.inc.php');

$workOrderID = $_POST['workOrderID'];

$sqlFinalizeWorkOrder = "UPDATE workorders SET workOrderStatus = '1', workOrderEndDate = now() WHERE workOrderID = '$workOrderID'";

if(mysqli_query($conn, $sqlFinalizeWorkOrder)) {

} else {

}

?>