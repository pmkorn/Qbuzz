<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);
  
  include('conn/db.inc.php');
  if (isset($_SESSION['employeeID'])) {
    $employeeID = $_SESSION['employeeID'];
    $sqlSelectEmployeeData = "SELECT * FROM employees WHERE employeeID = '$employeeID' LIMIT 1";
    if ($sqlResultSelectEmployeeData = mysqli_query($conn, $sqlSelectEmployeerData)) {
      while ($row = mysqli_fetch_array($sqlResultSelectEmployeeData)) {
        $employeeFirstName = $row['employeeFirstName'];
        $employeeLastName = $row['employeeLastName'];
        $employeeRole = $row['employeeRole'];
      }
    }   
  }

  // Get obstruction information
  $obstructionOutput = '';
  $sqlSelectObstructionData = "SELECT * FROM obstructions ORDER BY obstructionID DESC";
  if ($sqlResultObstructionData = mysqli_query($conn, $sqlSelectObstructionData)) {
    while ($rowObstruction = mysqli_fetch_array($sqlResultObstructionData)) {
      $vandaag = strtotime(date("Y-m-d H:i"));
      if ($vandaag < strtotime(date($rowObstruction['obstructionStartDate']))) {
        $status = '<span class="badge bg-warning">Aankomend</span>';                        
      } else if ($vandaag >= strtotime(date($rowObstruction['obstructionStartDate'])) && $vandaag <= strtotime(date($rowObstruction['obstructionEndDate']))) {
        $status = '<span class="badge bg-success">Lopend</span>';
      } else {
        $status = '<span class="badge bg-danger">Afgelopen</span>';
      }
      $lines= '';
      $string = explode(',',$rowObstruction['obstructionLines']);
      for($i = 0; $i < sizeof($string); $i++) {
        $lines .= '<span class="badge bg-secondary">'.$string[$i].'</span> ';
      }
      $obstructionOutput .= '
                              <tr>
                                <td><strong>#'.$rowObstruction['obstructionID'].'</strong></td>
                                <td>'.$rowObstruction['obstructionNumber'].'</td>
                                <td>'.$rowObstruction['obstructionPlace'].',<br>'.$rowObstruction['obstructionTrajectory'].'</td>
                                <td><i class="bi bi-flag-fill text-success me-3"></i>'.date('d M Y', strtotime($rowObstruction['obstructionStartDate'])).' van '.date('h:i', strtotime($rowObstruction['obstructionStartDate'])).' uur<br><i class="bi bi-x-circle-fill text-danger me-3"></i>'.date('d M Y', strtotime($rowObstruction['obstructionEndDate'])).' tot '.date('H:i', strtotime($rowObstruction['obstructionEndDate'])).' uur</td>
                                <!--<td>'.str_replace(',', ', ', $rowObstruction['obstructionLines']).'</td>-->
                                <td>'.$lines.'</td>
                                <td class="obstruction-status">'.$status.'</td>
                                <td>
                                  <a href="" class="fs-4"><i class="bi bi-file-pdf-fill text-bg-danger"></i></a>
                                </td>
                              </tr>
                            ';
    }
  }


  include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">
<head>

  <base href="/">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/bootstrap-icons.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/flag-icon.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.css">
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

  <title>PATRICKKORN | <?php echo $page; ?></title>

</head>
  <body class="bg-blue-touch">

  <header class="fixed-top">
    <?php include('include/navbar.inc.php'); ?>
  </header>

  <main class="main">

    <section class="py-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h1 class="section-title">Stremmingen</h1>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="table-responsive">
              <table id="obstructionTable" class="table">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Stremmingsnr.</th>
                      <th>Plaats + Traject</th>
                      <th>Periode</th>
                      <th>Lijnen</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php echo $obstructionOutput; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.js"></script>
  <script>
    //Initialize datatable
    new DataTable('#obstructionTable');
  </script>

  </body>
</html>