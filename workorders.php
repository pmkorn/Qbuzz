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
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <!-- MODAL FOR DISPLAYING WORKORDER DETAILS -->
    <div class="modal fade" id="workorderDetails" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
          <!-- -->
        </div>
      </div>
    </div>
    <!-- END MODAL FOR DISPLAYING WORKORDER DETAILS -->

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3">Werkorders</h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12 mb-3">
            <button class="btn btn-orange" data-bs-toggle="text" data-bs-target="#test">Invoer workorder</button>
          </div>
        </div>

        <div class="row">

          <table id="workorderTable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Workorder ID</th>
                <th>Halte</th>
                <th>Datum</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>WO-24000001</td>
                <td>Veendam, Eems (12635010)</td>
                <td>01-01-2024</td>
                <td><span class="badge bg-warning">Pending...</span></td>
                <td>
                  <i class="bi bi-clipboard2-check me-3"></i>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>

      <div class="container-fluid d-block d-md-none">
        <div class="row">
          <div class="col-md-12">
            <div class="list-group">
              <div href="" class="list-group-item list-group-workorder-item list-group-item-action" aria-current="true" data-id="1">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Haltenaam</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Haltenummer</p>
                <small>Hier een duidelijke omschrijving over het mankement met betrekking tot de halte</small>
                <div>
                  <i class="bi bi-person-fill"></i>
                </div>
              </div>
              <div href="" class="list-group-item list-group-workorder-item list-group-item-action" aria-current="true" data-id="2">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Haltenaam</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Haltenummer</p>
                <small>Hier een duidelijke omschrijving over het mankement met betrekking tot de halte</small>
                <div>
                  <i class="bi bi-person-fill"></i>
                </div>
              </div>
              <div href="" class="list-group-item list-group-workorder-item list-group-item-action" aria-current="true" data-id="3">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Haltenaam</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Haltenummer</p>
                <small>Hier een duidelijke omschrijving over het mankement met betrekking tot de halte</small>
                <div>
                  <i class="bi bi-person-fill"></i>
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
  <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let openWorkorderTable = new DataTable('#workorderTable', {
      language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
      },
      order: [0, 'asc'],
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
      ],
    });
  </script>

</html>