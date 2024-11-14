<?php

    if (isset($_GET['obstructionNumber'])) {
        $obstructionNumber = $_GET['obstructionNumber'];
    }

    include('../conn/db.inc.php');
    $sql = "SELECT * FROM obstructions WHERE obstructionNumber = '$obstructionNumber' LIMIT 1";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $obstructionNumber = $row['obstructionNumber'];
        }
    }

    ob_end_clean();
    require('../fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,$obstructionNumber);
    $pdf->Output();
?>