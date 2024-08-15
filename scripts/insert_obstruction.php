<?php

       include('../includes/db.inc.php');

       $obstructionNumber = $_POST['obstructionNumber'];
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
       $obstructionExpiredStops = $_POST['tempExpiredStops1'];
       $obstructionTemporaryStops = $_POST['tempStops1'];
       $obstructionCommentsExternal = $_POST['obstructionCommentsExternal'];
       $obstructionCommentsInternal = $_POST['obstructionCommentsInternal'];
       $obstructionDocument = $_POST['obstructionDocument'];
       $obstructionStatus = '1';

       $obstructionStartDate = date('Y-m-d',strtotime($obstructionStartDate));
       $obstructionStartTime = date('H:i:s',strtotime($obstructionStartTime));
       $obstructionEndDate = date('Y-m-d',strtotime($obstructionEndDate));
       $obstructionEndTime = date('H:i:s',strtotime($obstructionEndTime));
       
       $obstructionYear = date("Y");

       if (!file_exists('../pdf/'.$obstructionYear.'/'.$obstructionRegion.'/')) {
              mkdir('../pdf/'.$obstructionYear.'/'.$obstructionRegion.'/', 755, true);
       }

       require('../fpdf.php');              
       $pdf = new FPDF();
       $pdf->AddPage();
       $pdf->Output('F', '../pdf/'.$obstructionYear.'/'.$obstructionRegion.'/'.$obstructionNumber.'.pdf');

       $obstructionPDF = '../pdf/'.$obstructionYear.'/'.$obstructionRegion.'/'.$obstructionNumber.'.pdf';

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
                                                          obstructionExpiredStops,
                                                          obstructionTemporaryStops,
                                                          obstructionCommentsExternal,
                                                          obstructionCommentsInternal,
                                                          obstructionDocument,
                                                          obstructionPDF,
                                                          obstructionStatus
                                                         ) 
                                                  
                                                  VALUES ('$obstructionNumber', 
                                                          now(),
                                                          '$obstructionMadeBy',
                                                          '$obstructionRegion',
                                                          '$obstructionType',
                                                          '$obstructionPriority',
                                                          '$obstructionPlace',
                                                          '$obstructionTrajectory',
                                                          '$obstructionReason',
                                                          '$obstructionStartDate',
                                                          '$obstructionStartTime',
                                                          '$obstructionEndDate',
                                                          '$obstructionEndTime',
                                                          '$obstructionLines',
                                                          '$obstructionRoute',
                                                          '$obstructionExpiredStops',
                                                          '$obstructionTemporaryStops',
                                                          '$obstructionCommentsExternal',
                                                          '$obstructionCommentsInternal',
                                                          '$obstructionDocument',
                                                          '$obstructionPDF',
                                                          '$obstructionStatus'
                                                         )";

       if (mysqli_query($conn, $sqlInsertObstruction)) {
                      
       } else {
              
       }

?>