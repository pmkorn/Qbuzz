<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('../include/title.inc.php');
  include('../scripts/user_access.php');
  access('ADMIN');

  include('../conn/db.inc.php');
  // Get obstruction information
  $obstructionOutput = '';
  $nu = date("Y-m-d H:i");
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

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
      <base href="/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - <?php echo $page; ?></title>

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/main.css">

    </head>
    <body class="sb-nav-fixed">
    <?php include('include/admin_top_navbar.php'); ?>
        <div id="layoutSidenav">
        <?php include('include/admin_side_navbar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 section-title">Stremmingen - Overzicht</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Stremmingen</li>
                            <li class="breadcrumb-item">Overzicht</li>
                        </ol>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="../js/bootstrap.bundle.js"?<?php echo time(); ?>></script>
        <script src="../js/jquery-3.7.1.js"?<?php echo time(); ?>></script>
        <script src="../js/functions.js?<?php echo time(); ?>"></script>
        <script src="../js/scripts.js"?<?php echo time(); ?>></script>
        
    </body>
</html>
