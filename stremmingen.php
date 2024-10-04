<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);
  
  include('conn/db.inc.php');
  if (isset($_SESSION['employeeID'])) {
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

  // Get obstruction information
  $obstructionOutput = '';
  $nu = date("Y-m-d H:i");
  $sqlSelectObstructionData = "SELECT * FROM obstructions WHERE obstructionEndDate >= '$nu' ORDER BY obstructionID DESC";
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
                                <td><div class="d-inline-block"><i class="bi bi-flag-fill text-success me-3"></i>'.date('d M Y', strtotime($rowObstruction['obstructionStartDate'])).' van '.date('h:i', strtotime($rowObstruction['obstructionStartDate'])).' uur<br><i class="bi bi-x-circle-fill text-danger me-3"></i>'.date('d M Y', strtotime($rowObstruction['obstructionEndDate'])).' tot '.date('H:i', strtotime($rowObstruction['obstructionEndDate'])).' uur</div></td>
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
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
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
            <div class="">
              <table id="obstructionTable" class="table nowrap" style="width:100%">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Stremmingsnr.</th>
                      <th>Plaats + Traject</th>
                      <th>Periode</th>
                      <th>Lijnen</th>
                      <th>Status</th>
                      <th>Bestand</th>
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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script> -->
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
  <script>
    $(document).ready(function(){
       //Initialize datatable
       let table = new DataTable("#obstructionTable", {
        responsive: true
       });

    });
  </script>

  </body>
</html>