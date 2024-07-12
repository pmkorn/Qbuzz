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

  $optionList = '';
  $sqlBusstopInfo = "SELECT * FROM busstops ORDER BY busStopNumber ASC";
  if ($sqlResultBusstopInfo = mysqli_query($conn, $sqlBusstopInfo)) {
    while ($row = mysqli_fetch_array($sqlResultBusstopInfo)) {
      $optionList .= '<option id="'.$row['busStopID'].'" value="'.$row['busStopName'].' ('.$row['busStopNumber'].')">';
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
    <div class="modal fade" id="inputWorkOrder" tabindex="-1" aria-labelledby="inputWorkOrderLabel">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Invoer werkorder</h1>
          </div>
          <div class="modal-body">

            <div class="row mb-3">
              <div class="col-md-12">
                <label for="busstop"><strong>Halte:</strong></label>
                <input class="form-control" list="datalistBusstopDetail" id="busstopList" placeholder="Zoek op haltenummer of naam">
                <datalist id="datalistBusstopDetail">
                  <?php echo $optionList; ?>
                </datalist>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                slgngsgl
              </div>
              <div class="col-md-6">
                <label for=""><strong>Omschrijving:</strong></label>
                <textarea class="form-control" name="" id="" rows="10"></textarea>
              </div>
            </div>
            <input type="hidden" name="" value="<?php echo $_SESSION['employeeName']; ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Annuleer</button>
            <button  class="btn btn-warning text-white" id="btnResetObstruction"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            <button  class="btn btn-success" id="btnSaveObstruction"><i class="bi bi-floppy"></i> Opslaan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL FOR DISPLAYING WORKORDER DETAILS -->

    <?php include('includes/navbar.inc.php'); ?>

    <!-- Desktop layout -->
    <section class="main-content py-5 d-none d-md-block">

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
            <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#inputWorkOrder">Invoer werkorder</button>
          </div>
        </div>

        <div class="row">

          <table id="workorderTable" class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>Workorder ID</th>
                <th>Halte</th>
                <th>Datum</th>
                <th style="width: 30%;">Omschrijving:</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <td>WO-24000001</td>
                <td>
                  Veendam, Eems<br>
                  12635010
                </td>
                <td>01-01-2024 12:00:00</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, reprehenderit fugit? Dolorum error delectus aut maxime perspiciatis, ducimus fugiat repellat tempora placeat blanditiis id nulla vel aperiam inventore doloremque commodi?</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>
                  <i class="bi bi-clipboard2-check me-3 fs-5"></i>
                  <i class="bi bi-person-fill fs-5" title=""></i>
                </td>
              </tr>
              <tr>
                <td>WO-24000001</td>
                <td>
                  Veendam, Eems<br>
                  12635010
                </td>
                <td>01-01-2024 12:00:00</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, reprehenderit fugit? Dolorum error delectus aut maxime perspiciatis, ducimus fugiat repellat tempora placeat blanditiis id nulla vel aperiam inventore doloremque commodi?</td>
                <td><span class="badge bg-primary">In Progress</span></td>
                <td>
                  <i class="bi bi-clipboard2-check me-3 fs-5"></i>
                  <i class="bi bi-person-fill text-danger fs-5" title="Patrick Korn"></i> 
                </td>
              </tr>
              <tr>
                <td>WO-24000001</td>
                <td>
                  Veendam, Eems<br>
                  12635010
                </td>
                <td>01-01-2024 12:00:00</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, reprehenderit fugit? Dolorum error delectus aut maxime perspiciatis, ducimus fugiat repellat tempora placeat blanditiis id nulla vel aperiam inventore doloremque commodi?</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>
                  <i class="bi bi-clipboard2-check me-3 fs-5"></i>
                  <i class="bi bi-person-fill fs-5" title=""></i>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>

    </section>

    <!-- Mobile layout -->
    <section class="main-content py-5 d-block d-md-none">

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
          <div class="col-md-12">
            
            <div class="card mb-3">
              <h5 class="card-header">WO-24000001</h5>
              <div class="card-body">
                <h5>Veendam, Eems (12635010)</h5>
                <p>2 days ago</p>
                <p class="card-text"><strong>Omschrijving:</strong> Supporting text below as a natural lead-in to additional content.</p>
                <div class="mb-3">
                  <i class="bi bi-person-fill display-5"></i>
                </div>
                <a href="#" class="btn btn-orange">In behandeling nemen</a>
              </div>
            </div>

            <div class="card mb-3">
              <h5 class="card-header">WO-24000002</h5>
              <div class="card-body">
                <h5>Veendam, Eems (12635010)</h5>
                <p>2 days ago</p>
                <p class="card-text"><strong>Omschrijving:</strong> Supporting text below as a natural lead-in to additional content.</p>
                <div class="mb-3">
                  <i class="bi bi-person-fill display-5"></i>
                </div>
                <a href="#" class="btn btn-orange">In behandeling nemen</a>
              </div>
            </div>

            <div class="card mb-3">
              <h5 class="card-header">WO-24000003</h5>
              <div class="card-body">
                <h5>Veendam, Eems (12635010)</h5>
                <p>2 days ago</p>
                <p class="card-text"><strong>Omschrijving:</strong> Supporting text below as a natural lead-in to additional content.</p>
                <div class="pb-3">
                  <i class="bi bi-person-fill display-5"></i>
                </div>
                <a href="#" class="btn btn-orange">In behandeling nemen</a>
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
      columnDefs: [
        {
          targets: '_all',
          className: 'dt-left'
        }
      ]
    });
    DataTable.types().forEach(type => {
      DataTable.type(type, 'detect', () => false);
    });
  </script>

</html>