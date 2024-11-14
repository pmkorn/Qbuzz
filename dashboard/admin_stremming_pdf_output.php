<?php

    if (isset($_GET['obstructionNumber'])) {
        $obstructionNumber = $_GET['obstructionNumber'];
    }

    include('../conn/db.inc.php');
    $sql = "SELECT * FROM obstructions WHERE obstructionNumber = '$obstructionNumber' LIMIT 1";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $obstructionType = $row['obstructionType'];
            $obstructionNumber = $row['obstructionNumber'];
            $obstructionLines = $row['obstructionLines'];
        }
    }

    ob_end_clean();
    require('../fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image('../images/qbuzz-logo.png', 10, 10, 50);
    $pdf->SetXY(80, 30);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,0,$obstructionType,0,0, 'C');
    $pdf->Cell(50,0,str_replace(",",", ",$obstructionLines),0,0, 'C');
    $pdf->Output();
?>