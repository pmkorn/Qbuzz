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
        $tableBusstopOutput .= '<td><img src="images/haltebord.png" width="25px" /></td>';
        $tableBusstopOutput .= '<td>'.$rowBusStop['busStopName'].'</td>';
        $tableBusstopOutput .= '<td>'.$rowBusStop['busStopNumber'].'</td>';
        $tableBusstopOutput .= '<td><a href="haltes/overzicht/'.$rowBusStop['busStopNumber'].'/"><i class="bi bi-info-circle"></i> Meer info...</a>';
        $tableBusstopOutput .= '</td>';
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
            <table id="busStopTable" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Haltenaam:</th>
                  <th>Haltenummer:</th>
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
      ],
    });
  </script>

</html>