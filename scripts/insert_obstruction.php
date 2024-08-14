<?php

       include('../includes/db.inc.php');

       $obstructionNumber = $_POST['obstructionNumber'];
       $obstructionMakeDate = $_POST['obstructionMakeDate'];
       $obstructionMadeBy = $_POST['obstructionMadeBy'];
       $obstructionRegion = $_POST['obstructionRegion'];
       $obstructionType = $_POST['obstructionType'];
       $obstructionPriority = $_POST['obstructionPriority'];
       $obstructionPlace = $_POST['obstructionPlace'];
       $obstructionTrajectory = $_POST['obstructionTrajectory'];
       $obstructionReason = $_POST['obstructionReason'];
       $obstructionStartDate = $_POST['obstructionStartDate'];
       $obstructionStartTime = $_POST['obstructionStartTime'];
       $obstructionEndDate = $_POST['obstructionEndDate'];
       $obstructionEndTime = $_POST['obstructionEndTime'];
       $obstructionLines = $_POST['obstructionLines'];
       $obstructionRoute = $_POST['obstructionRoute'];
       $obstructionExpireStops = $_POST['obstructionExpireStops'];
       $obstructionTemporaryStops = $_POST['obstructionTemporaryStops'];
       $obstructionCommentsExternal = $_POST['obstructionCommentsExternal'];
       $obstructionCommentsInternal = $_POST['obstructionCommentsInternal'];
       $obstructionDocument = $_POST['obstructionDocument'];
       $obstructionStatus = '1';

       $sqlInsertObstruction = "INSERT INTO obstructions (obstructionNumber,
                                                          obstructionMakeDate,
                                                          obstructionMadeBy,
                                                          obstructionRegion,
                                                          obstructionType,
                                                          obstructionPriority,
                                                          obstructionPlace,
                                                          obstructionTrajectory,
                                                          obstructionReason,
                                                          obstructionStartDate,
                                                          obstructionStartTime,
                                                          obstructionEndDate,
                                                          obstructionEndTime,
                                                          obstructionLines,
                                                          obstructionRoute,
                                                          obstructionExpireStops,
                                                          obstructionTemporaryStops,
                                                          obstructionCommentsExternal,
                                                          obstructionCommentsInternal,
                                                          obstructionDocument,
                                                          obstructionStatus
                                                          )
                                                        
                                                 VALUES('".$obstructionNumber."',
                                                        '".$obstructionMakeDate."',
                                                        '".$obstructionMadeBy."',
                                                        '".$obstructionRegion."',
                                                        '".$obstructionType."',
                                                        '".$obstructionPriority."',
                                                        '".$obstructionPlace."',
                                                        '".$obstructionTrajectory."',
                                                        '".$obstructionReason."',
                                                        '".$obstructionStartDate."',
                                                        '".$obstructionStartTime."',
                                                        '".$obstructionEndDate."',
                                                        '".$obstructionEndTime."',
                                                        '".$obstructionLines."',
                                                        '".$obstructionRoute."',
                                                        '".$obstructionExpireStops."',
                                                        '".$obstructionTemporaryStops."',
                                                        '".$obstructionCommentsExternal."',
                                                        '".$obstructionCommentsInternal."',
                                                        '".$obstructionDocument."',
                                                        '".$obstructionStatus."')";

       if(mysqli_query($conn, $sqlInsertObstruction)) {

       } else {

       }

?>