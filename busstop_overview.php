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
      $tableBusstopOutput .= '<tr id="'.$rowBusStop['busStopNumber'].'">';
        $tableBusstopOutput .= '<td><img src="images/haltebord.png" width="25px" /></td>';
        $tableBusstopOutput .= '<td>
                                 '.$rowBusStop['busStopName'].'<br>
                               </td>';
        $tableBusstopOutput .= '<td>
                                 '.$rowBusStop['busStopNumber'].'
                               </td>';                        
        $tableBusstopOutput .= '<td></td>';
        $tableBusstopOutput .= '<td></td>';
        $tableBusstopOutput .= '<td>
                                  <i data-id="'.$rowBusStop['busStopNumber'].'" class="showBusstopDetail bi bi-eye text-dark me-3"></i>
                                  <i class="bi bi-pencil text-info me-3 edit-record" data-id="'.$rowBusStop['busStopID'].'" title="Info & werkorder"></i>
                                  <i class="bi bi-trash text-danger me-3"></i>
                                </td>';
      $tableBusstopOutput .= '</tr>';
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

    <!-- MODAL FOR MAKING NEW BUSSTOP -->
    <div class="modal fade" id="newBusstopPlace" tabindex="-1">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Aanmaken nieuwe bushalte</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">1</div>
                <div class="col-md-4">1</div>
                <div class="col-md-4">1</div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning text-white">Reset</button>
            <button type="button" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL FOR MAKING NEW BUSSTOP -->

    <!-- MODAL FOR DISPLAYING BUSSTOP DETAILS -->
    <div class="modal fade" id="busstopDetails" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <!-- -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning text-white">Reset</button>
            <button type="button" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL FOR DISPLAYING BUSSTOP DETAILS -->

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3">Halteoverzicht</h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#newBusstopPlace">Aanmaken halte <i class="bi bi-stoplights-fill"></i></button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table id="busStopTable" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Halte:</th>
                  <th>Haltenummer:</th>
                  <th>Lijnen:</th>
                  <th>GPS:</th>
                  <th>Actie</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $tableBusstopOutput; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </section>    

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
      ]
    });
  </script>
  <script>
    $('.showBusstopDetail').on('click', function(){
      let busStopNumberID = $(this).data('id');
      window.location = ('haltes/overzicht/'+busStopNumberID+'/');
      alert(busStopNumberID);
    });
    //$('#busStopTable').on('click', 'tbody tr', function(){
      //let busStopNumberID = $(this).closest('tr').attr('id');
      //window.location = ('haltes/overzicht/'+busStopNumberID+'/');
      //alert(busStopNumberID);
    //});
  </script>

</html>