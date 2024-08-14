<?php

include('../includes/db.inc.php');

$obstructionNumber = $_POST['obstructionNumber'];
$obstructionMakeDate = $_POST['obstructionMakeDate'];

$sqlInsertObstruction = "INSERT INTO obstructions (obstructionNumber,
                                                  obstructionMakeDate)
                                                   
                                            VALUES('".$obstructionNumber."',
                                                   '".$obstructionMakeDate."')";

if(mysqli_query($conn, $sqlInsertObstruction)) {

} else {

}

?>