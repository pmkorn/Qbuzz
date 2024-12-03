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
    $pdf->AddPage('P', 'A4');
    $pdf->Image('../images/qbuzz-logo.png', 20, 10, 40);
    $pdf->SetXY(63.3, 10);
    $pdf->SetFont('Arial','B',14);
    // $pdf->Cell(50,0,$obstructionType,0,0, 'C');
    // $pdf->Cell(50,0,str_replace(",",", ",$obstructionLines),0,0, 'C');
    // $pdf->Ln(10);
    // $pdf->Line(10, 40, 200, 40);
    $pdf->Cell(10);
    $pdf->Cell(63.3, 10, $obstructionType, 1 , 0, 'C');
    $pdf->Cell(63.3, 10, '', 1 , 0, 'R');
    $pdf->Ln(10);
    $pdf->Cell(63.3, 10, '', 1 , 0, 'L');
    $pdf->Cell(63.3, 10, $obstructionNumber, 1 , 0, 'C');
    $pdf->Cell(63.3, 10, '', 1 , 0, 'R');
    $pdf->Output();
?>