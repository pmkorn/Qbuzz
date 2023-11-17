<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include('includes/db.inc.php');

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

  include('includes/headertitle.inc.php');

  $tableBusstopOutput = '';
  $sqlBusStops = 'SELECT * FROM busstops';
  if ($sqlResultBusStops = mysqli_query($conn, $sqlBusStops)) {
    while ($rowBusStop = mysqli_fetch_array($sqlResultBusStops)) {
      $tableBusstopOutput .= '<tr>';
        $tableBusstopOutput .= '<td>'.$rowBusStop['busStopName'].'</td>';
        $tableBusstopOutput .= '<td>'.$rowBusStop['busStopNumber'].'</td>';
        $tableBusstopOutput .= '<td><i class="busstopid btn btn-link bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#newWorkOrder'.$rowBusStop['busStopID'].'" data-id="newWorkOrder'.$rowBusStop['busStopID'].'"></i>&nbsp;&nbsp;&nbsp;<i class="bi bi-info-circle"></i>';
   
          $tableBusstopOutput .= '<div class="modal modal-lg fade" id="newWorkOrder'.$rowBusStop['busStopID'].'" tabindex="-1" aria-labelledby="newWorkOrder'.$rowBusStop['busStopID'].'" aria-hidden="true">';
            $tableBusstopOutput .= '<div class="modal-dialog">';
              $tableBusstopOutput .= '<div class="modal-content">';
                $tableBusstopOutput .= '<div class="modal-header">';
                  $tableBusstopOutput .= '<div>';
                    $tableBusstopOutput .= '<h1 class="modal-title fs-5 w-100" id="exampleModalLabel">'.$rowBusStop['busStopName'].'</h1>';
                    $tableBusstopOutput .= '<p class="modal-title fs-6 w-100">'.$rowBusStop['busStopNumber'].'</p>';
                  $tableBusstopOutput .= '</div>';
                  $tableBusstopOutput .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                $tableBusstopOutput .= '</div>';
                $tableBusstopOutput .= '<div class="modal-body">';
                  $tableBusstopOutput .= '<form id="inputNewWorkOrderForm'.$rowBusStop['busStopID'].'" action="">';
                    $tableBusstopOutput .= '<div class="mb-3">';
                      $tableBusstopOutput .= '<label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Omschrijving mankement</strong></label>';
                      $tableBusstopOutput .= '<textarea class="form-control" name="inputNewWorkOrderNotification" id="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'" cols="30" rows="10"></textarea>';
                    $tableBusstopOutput .= '</div>';
                    $tableBusstopOutput .= '<input type="hidden" id="busStopIDWorkNumber" value="'.$rowBusStop['busStopID'].'" />';
                    $tableBusstopOutput .= '<input type="hidden" id="workOrderInsertedBy" value="'.$employeeFirstName." ".$employeeLastName.'">';
                  $tableBusstopOutput .= '</form>';
                $tableBusstopOutput .= '</div>';
                $tableBusstopOutput .= '<div class="modal-footer">';
                  $tableBusstopOutput .= '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuleren&nbsp;<i class="bi bi-bi-x-circle"></i></button>';
                  $tableBusstopOutput .= '<button type="button" class="btn btn-success btnSaveWorkOrder" id="btnSaveWorkOrder'.$rowBusStop['busStopID'].'" value="'.$rowBusStop['busStopID'].'">Opslaan&nbsp;<i class="bi bi-check"></i></button>';
                $tableBusstopOutput .= '</div>';
              $tableBusstopOutput .= '</div>';
            $tableBusstopOutput .= '</div>';
          $tableBusstopOutput .= '</div>';

        $tableBusstopOutput .= '</td>';
      $tableBusstopOutput .= '</tr>';
    }
  }

  $workOrderOutput = '';
  $sqlWorkOrders = 'SELECT workorders.workOrderID AS wID, workorders.busStopId AS bID, workorders.workOrderNotification AS wOD, workorders.workOrderStatus AS wOS, workorders.workOrderAddDate as addDate, busstops.busStopID as bSID, busstops.busStopNumber AS bSN, busstops.busStopName AS BSNA FROM workorders INNER JOIN busstops ON workorders.busStopID = busstops.busStopID WHERE workorders.workOrderStatus = 0';
  if ($sqlResultWorkOrders = mysqli_query($conn, $sqlWorkOrders)) {
    if (mysqli_num_rows($sqlResultWorkOrders) > 0) {
      while ($rowWorkOrder = mysqli_fetch_array($sqlResultWorkOrders)) {
        $workOrderOutput .= '<a href="#" class="list-group-item list-group-item-action mb-1" aria-current="true" data-bs-toggle="modal" data-bs-target="#workOrderFinalize'.$rowWorkOrder['wID'].'">';
          $workOrderOutput .= '<div class="d-flex w-100 justify-content-between">';
            $workOrderOutput .= '<h5 class="mb-1">'.$rowWorkOrder['BSNA'].'</h5>';
            $workOrderOutput .= '<small><span class="badge text-bg-primary">'.date("j M - H:m", strtotime($rowWorkOrder['addDate'])).'</span></small>';
          $workOrderOutput .= '</div>';
          $workOrderOutput .= '<p class="mb-1">'.$rowWorkOrder['bSN'].'</p>';
          $workOrderOutput .= '<small>'.$rowWorkOrder['wOD'].'</small>';
          $workOrderOutput .= '<div class="clearfix"></div>';
          $workOrderOutput .= '<i class="dot dot-danger"></i><i class="dot dot-warning"></i><i class="dot dot-success"></i>';
        $workOrderOutput .= '</a>';
        $workOrderOutput .= '<div class="modal fade" id="workOrderFinalize'.$rowWorkOrder['wID'].'" tabindex="-1">';
          $workOrderOutput .= '<div class="modal-dialog">';
            $workOrderOutput .= ' <div class="modal-content">';
              $workOrderOutput .= '<div class="modal-header">';
                $workOrderOutput .= '<h5 class="modal-title">'.$rowWorkOrder['BSNA'].'</h5>';
                $workOrderOutput .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
              $workOrderOutput .= '</div>';
              $workOrderOutput .= '<div class="modal-body">';
                $workOrderOutput .= '<p><strong>Melding incident:</strong></p>';
                $workOrderOutput .= '<p class="text-danger">'.$rowWorkOrder['wOD'].'</p>';
                $workOrderOutput .= '<label class="form-label" for="inputNewWorkOrderRepairNotification'.$rowWorkOrder['wID'].'"><strong>Omschrijving werkzaamheden</strong></label>';
                $workOrderOutput .= '<textarea class="form-control" name="inputNewWorkOrderRepairNotification" id="inputNewWorkOrderRepairNotification'.$rowWorkOrder['wID'].'" cols="30" rows="5"></textarea>';
                $workOrderOutput .= '<input type="hidden" id="workOrderFinalizedBy" value="'.$employeeFirstName." ".$employeeLastName.'">';
              $workOrderOutput .= '</div>';
              $workOrderOutput .= '<div class="modal-footer">';
                $workOrderOutput .= '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuleren&nbsp;<i class="bi bi-x-circle"></i></button>';
                $workOrderOutput .= '<button type="button" class="btn btn-success btnWorkOrderFinalize" id="btnWorkOrderFinalize'.$rowWorkOrder['wID'].'" value="'.$rowWorkOrder['wID'].'">Afmelden&nbsp;<i class="bi bi-check-lg"></i></button>';
              $workOrderOutput .= '</div>';
            $workOrderOutput .= '</div>';
          $workOrderOutput .= '</div>';
        $workOrderOutput .= '</div>';
      }
    } else {
      $workOrderOutput .= '<a href="#" class="list-group-item list-group-item-action" aria-current="true">';
        $workOrderOutput .= '<div class="d-flex w-100 justify-content-between">';
          $workOrderOutput .= '<h5 class="mb-1"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Geen werkorder beschikbaar</h5>';
        $workOrderOutput .= '</div>';
      $workOrderOutput .= '</a>';
    }
  }

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
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <div class="container-fluid p-3">

      <div class="row mb-3">

        <div class="col-md-12">          
          <h1><i class="bi bi-list-task"></i> Werkorders</h1>
          <hr>
        </div>

      </div>

      <div class="row mb-3 mb-md-0">

        <div class="col-md-8 mb-3 mb-md-0 d-none d-lg-block">
          <h4>Overzicht haltes</h4>
          <hr>
          <table id="busStopTable" class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>Haltenaam</th>
                <th>Haltenummer</th>
                <th>Actie</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $tableBusstopOutput; ?>
            </tbody>
          </table>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <h4>Openstaande werkorders</h4>
          <hr>            
          <div class="list-group overflow-scroll" id="workorder-overview" style="max-height:600px;">
            <?php echo $workOrderOutput; ?>
          </div>
        </div>        

      </div>

    </div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let table = new DataTable('#busStopTable',{
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/nl-NL.json',
      },
      order: [1, 'asc'],
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
      ],
    });
  </script>

</html>