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

      <div class="container-fluid d-none d-md-block">

        <div class="row">

          <div class="col-md-6">

            <ul class="nav nav-tabs" id="workOrdersTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="open-tab" data-bs-toggle="tab" data-bs-target="#workorderOpen" type="button" role="tab" aria-controls="workOrderOpen" aria-selected="true">Openstaand <span class="badge rounded-pill text-bg-primary ms-3">0</span></button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="progress-tab" data-bs-toggle="tab" data-bs-target="#workorderInProgress" type="button" role="tab" aria-controls="workorderInProgress" aria-selected="false">In behandeling <span class="badge rounded-pill text-bg-primary ms-3">0</span></button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tad" data-bs-toggle="tab" data-bs-target="#workorderCompleted" type="button" role="tab" aria-controls="workordercompleted" aria-selected="false">Afgerond <span class="badge rounded-pill text-bg-primary ms-3">0</span></button>
              </li>
            </ul>
            <div class="tab-content" id="workOrdersContent">
              <div class="tab-pane fade show active py-3" id="workorderOpen" role="tabpanel" aria-labelledby="open-tab" tabindex="0">
                <table id="openWorkorderTable" class="table table-hover table-striped table-bordered display-table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Halte</th>
                      <th>Datum</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>W202401011</strong></td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td><strong>W202401012</strong></td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td><strong>W202401013</strong></td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade py-3" id="workorderInProgress" role="tabpanel" aria-labelledby="progress-tab" tabindex="0">
                <table id="progressWorkorderTable" class="table table-hover table-striped table-bordered display-table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Halte</th>
                      <th>Datum</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade py-3" id="workorderCompleted" role="tabpanel" aria-labelledby="completed-tab" tabindex="0">
                <table id="completedWorkorderTable" class="table table-hover table-striped table-bordered display-table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Halte</th>
                      <th>Datum</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                    <tr>
                      <td>20240101-1</td>
                      <td>2e Exlo rmond, A. de Vesstraat (18790070)</td>
                      <td>01 jan. 7:30</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

          <div class="col-md-6">

            <div id="workOrder">

              <div class="card">
                <div class="card-header">
                  <b>Incident 20240101-1</b>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-2">
                      <b>Melder</b>
                    </div>
                    <div class="col-sm-4">
                      Patrick Korn
                    </div>
                    <div class="col-sm-2">
                      <b>Tijdstip</b>
                    </div>
                    <div class="col-sm-4">
                      01-01-2024 07:30:24
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                      <b>Regio</b>
                    </div>
                    <div class="col-sm-4">
                      Groningen-Drenthe
                    </div>
                  </div>
                  <div class="row">
                    <hr>
                  </div>
                  <div class="row">
                    <h3><span class="bi bi-h-square text-danger"></span> Halte</h3>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                      <b>Beschrijving</b>
                    </div>
                    <div class="col-sm-4">
                      Halte bord zit verbogen in het frame
                    </div>
                  </div>
                  <div class="row">
                    <hr>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                      <b>Werkzaamheden</b>
                    </div>
                    <div class="col-sm-10">
                      <textarea name="" id="" class="form-control" cols="50" rows="10"></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <button id="btnCompleteWorkorder" class="btn btn-success float-end">Afmelden</button>
                    </div>                  
                  </div>
                </div>
              </div>

            </div>

          </div>

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
  <!-- <script>
    let table = new DataTable('.display-table', {
      language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
      },
      order: [0, 'asc'],
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
      ],
    });
  </script> -->
  <script>
    let openWorkorderTable = new DataTable('#openWorkorderTable', {
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
  <script>
    let progressWorkorderTable = new DataTable('#progressWorkorderTable',{
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
  <script>
    let completedWorkorderTable = new DataTable('#completedWorkorderTable',{
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