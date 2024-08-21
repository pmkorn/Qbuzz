<?php

include('includes/db.inc.php');

$obstructionID = $_GET['obstructionID'];

$obstructionID;

$sql = "SELECT * FROM obstructions WHERE obstructionID = '".$obstructionID."' ";
if ($result = mysqli_query($conn, $sql)) {
  while ($row = mysqli_fetch_array($result)) {
      $obstructionNumber = $row['obstructionNumber'];
      $obstructionRegion = $row['obstructionRegion'];
      $obstructionType = $row['obstructionType'];
      $obstructionStartDate = $row['obstructionStartDate'];
      $obstructionPlace = $row['obstructionPlace'];
      $obstructionLines = $row['obstructionLines'];
      $obstructionTrajectory = $row['obstructionTrajectory'];
      $obstructionStartDate = $row['obstructionStartDate'];
      $obstructionEndDate = $row['obstructionEndDate'];
      $obstructionReason = $row['obstructionReason'];
      $obstructionExpiredStops = $row['obstructionExpiredStops'];
      $obstructionTemporaryStops = $row['obstructionTemporaryStops'];
      $obstructionRoute = $row['obstructionRoute'];
      $obstructionComments = $row['obstructionComments'];
  }
} else {

}

require('fpdf.php');


class PDF extends FPDF
  {
    function Header()
    {
      // Add your code here to generate
      // Headers on every page
    }

    function Footer()
    {
      // Add your code here to generate
      // Footers on every page
    }
  }
// Instanciation of inherited class

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('images/qbuzz-logo.png', 10, 10, 40);
$pdf->SetTitle($obstructionNumber);

$pdf->SetY(30);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 10, "W".date("W", strtotime($obstructionStartDate)), 0, 0);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(64, 10, $obstructionType, 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 10, "Aan bord: ".date("d-m-Y", strtotime($obstructionStartDate.'-4 days')), 0, 1, 'R');
$pdf->SetX(137);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 10, "Van bord: ".date("d-m-Y", strtotime($obstructionEndDate.'+1 days')), 0, 1, 'R');
$pdf->SetX(137);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, "Stremmingsnummer: ".$obstructionNumber, 0, 1, 'R');

// Plaats
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Te", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, $obstructionPlace, 0, 1, 'L');

// Lijnnummers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Lijnnummers", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, str_replace(',', ', ', $obstructionLines), 0, 1, 'L');

// Traject
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Traject gedeelte", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, $obstructionTrajectory, 0, 1, 'L');

// Datum en tijd van aanvang
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Datum aanvang", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, date("d-m-Y", strtotime($obstructionStartDate))." om: ".date("H:i", strtotime($obstructionStartDate)), 0, 1, 'L');

// Datum en tijd van einde
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Datum einde", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, date("d-m-Y", strtotime($obstructionEndDate))." om: ".date("H:i", strtotime($obstructionEndDate)), 0, 1, 'L');

// Reden
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Reden", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, $obstructionReason, 0, 1, 'L');

// Vervallen haltes
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Vervallen haltes", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, $obstructionExpiredStops, 0, 1, 'L');

// Vervallen haltes
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Tijdelijke haltes", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(48, 10, $obstructionTemporaryStops, 0, 1, 'L');

// Te rijden route
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Te rijden route", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(142, 10, $obstructionRoute);

// Opmerkingen
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(47, 10, "Opmerkingen", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 10, ':', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(142, 10, $obstructionComments);










/*$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, "W".date("W", strtotime($obstructionStartDate)), 0, 1, 'L');
$pdf->Cell(20, 10, "W".date("W", strtotime($obstructionStartDate)), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(30, 10, $obstructionType, 0, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, date("d-m-Y", strtotime($row['obstructionStartDate'].'+5 days')), 0, 1, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, date("d-m-Y", strtotime($obstructionStartDate)), 0, 1, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $obstructionNumber, 0, 1, 'R');*/

// if (file_exists('pdf/'.$obstructionRegion.'/'.$obstructionNumber.'.pdf')) {
//   $pdf->Output();
// } else {
//   $pdf->Output('F', 'pdf/'.$obstructionRegion.'/'.$obstructionNumber.'.pdf');
// }



$pdf->Output();


?>