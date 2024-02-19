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
  
  $busStopNumber = $_GET['busStopNumber'];

  $busStopName = '';
  $sqlGetBusStopNumber = "SELECT * FROM busstops WHERE busStopNumber = '".$busStopNumber."' ";
  if ($resultGetBusStopNumber = mysqli_query($conn, $sqlGetBusStopNumber)) {
    while ($row = mysqli_fetch_array($resultGetBusStopNumber)) {
      $busStopName = $row['busStopName'];
      $busStopNumber = $row['busStopNumber'];
    }
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
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3"><?php echo $busStopName; ?> <small>(<?php echo $busStopNumber ?>)</small></h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-md-3">

            <div class="haltebord">
              <div class="haltebord-header text-center py-3">
                <span class="haltebord-zonepart zone"><?php echo substr($busStopNumber, 0, 4) ?></span>
                <img src="images/bus_logo.jpg" class="rounded" alt="Logo bus" title="Logo bus" height="100px">
                <span class="haltebord-zonepart"><?php echo substr($busStopNumber, 4, 8) ?></span>
              </div>
              <div class="haltebord-body">
                <div class="haltebord-haltenaam py-2 fs-5"><?php echo $busStopName; ?></div>
              </div>
              <div class="haltebord-footer">
                <div class="haltebord-logo py-2">
                  <img src="images/qbuzz-logo.png" alt="Logo Qbuzz" title="Logo Qbuzz" height="100px">
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-9">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success mb-3">Nieuwe werkorder <i class="bi bi-pencil-square"></i></button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Omschrijving</th>
                        <th>Status</th>
                        <th>Actie</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>0000-00-00-00-1</td>
                        <td>Haltevertrekstaat mist bij de halte.</td>
                        <td><span class="badge bg-warning text-white">Pending</span></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>    

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <script src="js/functions.js"></script>

</html>