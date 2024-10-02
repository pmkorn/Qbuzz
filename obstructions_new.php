<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  date_default_timezone_set('Europe/Amsterdam');
  
  include('includes/db.inc.php');
  
  // Get user information
  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {    
    $employeeID = $_SESSION['employeeID'];
    $sqlSelectEmployeeData = "SELECT * FROM employees WHERE employeeID = '$employeeID' LIMIT 1";
    if ($sqlResultSelectEmployeeData = mysqli_query($conn, $sqlSelectEmployeeData)) {
      while ($row = mysqli_fetch_array($sqlResultSelectEmployeeData)) {
        $employeeFirstName = $row['employeeFirstName'];
        $employeeLastName = $row['employeeLastName'];
        $employeeRole = $row['employeeRole'];
      }
    }   
  }

  $lineOutput = "";
  $sqlRoutes = "SELECT * FROM routes";
  if ($resultRoutes = mysqli_query($conn, $sqlRoutes)) {
    while ($row = mysqli_fetch_array($resultRoutes)) {
      $lineOutput .= '<div class="col-2">';
        $lineOutput .= '<div class="form-check form-check-inline" title="Lijn '.$row['routeNumber']." ".$row['routeDescription'].'">';
          $lineOutput .= '<input class="form-check-input obstructionLines" type="checkbox" id="'.$row['routeID'].'" name="obstructionLine" value="'.$row['routeNumber'].'">';
          $lineOutput .= '<label class="form-check-label" for="obstructionLine"> '.$row['routeCode'].' </label>';
        $lineOutput .= '</div>';
      $lineOutput .= '</div>';
    }
  }


  // Get obstruction information
  // $obstructionOutput = '';
  // $sqlSelectObstructionData = "SELECT * FROM obstructions ORDER BY obstructionID DESC";
  // if ($sqlResultObstructionData = mysqli_query($conn, $sqlSelectObstructionData)) {
  //   while ($rowObstruction = mysqli_fetch_array($sqlResultObstructionData)) {
  //     $vandaag = strtotime(date("Y-m-d H:i"));
  //     if ($vandaag < strtotime(date($rowObstruction['obstructionStartDate']))) {
  //       $status = '<span class="badge bg-warning">Aankomend</span>';                        
  //     } else if ($vandaag >= strtotime(date($rowObstruction['obstructionStartDate'])) && $vandaag <= strtotime(date($rowObstruction['obstructionEndDate']))) {
  //       $status = '<span class="badge bg-success">Lopend</span>';
  //     } else {
  //       $status = '<span class="badge bg-danger">Afgelopen</span>';
  //     }
  //     $lines= '';
  //     $string = explode(',',$rowObstruction['obstructionLines']);
  //     for($i = 0; $i < sizeof($string); $i++) {
  //       $lines .= '<span class="badge bg-secondary">'.$string[$i].'</span> ';
  //     }
  //     $obstructionOutput .= '
  //                             <tr>
  //                               <td><strong>'.$rowObstruction['obstructionNumber'].'</strong></td>
  //                               <td>'.$rowObstruction['obstructionPlace'].', '.$rowObstruction['obstructionTrajectory'].'</td>
  //                               <td>Van <strong>'.date('d M Y h:i', strtotime($rowObstruction['obstructionStartDate'])).'</strong> tot <strong>'.date('d M Y H:i', strtotime($rowObstruction['obstructionEndDate'])).'</strong></td>
  //                               <!--<td>'.str_replace(',', ', ', $rowObstruction['obstructionLines']).'</td>-->
  //                               <td>'.$lines.'</td>
  //                               <td class="obstruction-status">'.$status.'</td>
  //                               <td>
  //                                 <i class="bi bi-person-fill text-secondary me-3" title="Door: '.$rowObstruction['obstructionMadeBy'].'"></i>
  //                                 <i class="bi bi-check2-square me-3 obstructionSignOut" data-bs-toggle="modal" data-bs-target="#obstructionSignOut'.$rowObstruction['obstructionID'].'" data-id="'.$rowObstruction['obstructionID'].'" title="Afmelden"></i>
  //                                 <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="bi bi-pencil-square me-3 edit-obstruction" data-id="'.$rowObstruction['obstructionID'].'" title="Wijzigen"></i></a>
  //                                 <a href="'.$rowObstruction['obstructionPDF'].'" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a>
  //                                 <a href="stremming_output.php?obstructionID='.$rowObstruction['obstructionID'].'" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a>
  //                                 <a><i class="bi bi-envelope-at me-3" title="Mailen"></i></a>
  //                               </td>
  //                             </tr>
  //                           ';
  //   }
  // }

  $ouputUpcoming = '';
  $sqlSelectUpcoming = "SELECT * FROM obstructions WHERE obstructionStartDate > now()";
  if ($resultSelectUpcoming = mysqli_query($conn, $sqlSelectUpcoming)) {
    while ($row = mysqli_fetch_array($resultSelectUpcoming)) {
      $ouputUpcoming .= '<tr>';
        $ouputUpcoming .= '<td>'.$row['obstructionNumber'].'</td>';
        $ouputUpcoming .= '<td>'.$row['obstructionPlace'].'<br>'.$row['obstructionTrajectory'].'</td>';
        $ouputUpcoming .= '<td><i class="bi bi-check-circle-fill text-success"></i> '.$row['obstructionStartDate'].'<br> <i class="bi bi-x-circle-fill text-danger"></i> '.$row['obstructionEndDate'].'</td>';
        $ouputUpcoming .= '<td>';
          $ouputUpcoming .= '<a class="btn btn-sm btn-orange" href="stremming_output.php?obstructionID='.$row['obstructionID'].'" target="_blank"><i class="bi bi-file-pdf text-white me-3 pdf" title="Print"></i> Bekijk</a>';
        $ouputUpcoming .= '</td>';
      $ouputUpcoming .= '</tr>';
    }
  } else {
    $ouputUpcoming .= 'No data to display';
  }

  $ouputOngoing = '';
  $sqlSelectOngoing = "SELECT * FROM obstructions WHERE obstructionStartDate < now()";
  if ($resultSelectOngoing = mysqli_query($conn, $sqlSelectOngoing)) {
    while ($row = mysqli_fetch_array($resultSelectOngoing)) {
      $ouputOngoing .= '<tr>';
        $ouputOngoing .= '<td>'.$row['obstructionNumber'].'</td>';
        $ouputOngoing .= '<td>'.$row['obstructionPlace'].'<br> '.$row['obstructionTrajectory'].'</td>';
        $ouputOngoing .= '<td><i class="bi bi-check-circle-fill text-success"></i> '.$row['obstructionStartDate'].'<br> <i class="bi bi-x-circle-fill text-danger"></i> '.$row['obstructionEndDate'].'</td>';
        $ouputOngoing .= '<td>';
          $ouputOngoing .= '<a class="btn btn-sm btn-orange" href="stremming_output.php?obstructionID='.$row['obstructionID'].'" target="_blank"><i class="bi bi-file-pdf text-white me-3 pdf" title="Print"></i> Bekijk</a>';
        $ouputOngoing .= '</td>';
      $ouputOngoing .= '</tr>';
    }
  } else {
    $ouputOngoing .= 'No data to display';
  }

  include('includes/headertitle.inc.php');
    
?>

<!doctype html>
<html lang="nl">
  <head>

    <base href="/">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/favicon_qbuzz.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css">
    <link rel="stylesheet" href="css/flag-icon.css">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <!-- Modal for Generating PDF -->
    <div class="modal fade" id="PDFModal" tabindex="-1" aria-labelledby="PDFModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="PDFModalLabel"><i class="bi bi-geo-fill"></i> GD24-Q001 | Emmen, Hondsrugweg</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <embed src="obstructions/facture2424488670.pdf" frameborder="0" width="100%" height="100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <?php include('includes/navbar.inc.php'); ?>
    
    <!-- Desktop layout -->
    <section class="main-content">

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section__main-title mb-3">Overzicht stremmingen</h1>
            <hr class="py-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h4 class="section__sub-title">Aankomende stremmingen</h4>
            <table class="table">
              <thead>
                <tr>
                  <th>Stremmingsnr.</th>
                  <th>Plaats + Traject</th>
                  <th>Van - Tot</th>
                  <th>Actie</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php echo $ouputUpcoming; ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <h4 class="section__sub-title">Lopende stremmingen</h4>
            <table class="table">
              <thead>
                <tr>
                  <th>Stremmingsnr.</th>
                  <th>Plaats + Traject</th>
                  <th>Van - Tot</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php echo $ouputOngoing; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let table = new DataTable('#obstructionTable',{
      language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
      },
      order: [0, ''],
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, 'All'],
      ]
    });
  </script>
  <script>
    // SHOW BUSSTOP INFO
    $('.obstructionSignOut').on('click', function(){

      let obstructionID = $(this).data('id');
      $.ajax({
        url: 'scripts/update_obstruction_status.php',
        type: 'POST',
        data: {
          obstructionID: obstructionID
        },
        success: function(response) {
          location.reload(true);
        }
      });

    });

  </script>

</html>