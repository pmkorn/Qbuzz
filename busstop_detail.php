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

    <!-- MODAL -->
    <div class="modal fade" id="newBusstopWorkorder" aria-hidden="true" aria-labelledby="newBusstopWorkorder" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="newBusstopWorkorder">Werkorder</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formAddNewBusstopWorkorder">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Categorie</strong></label>                        
                    <select id="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'" class="form-select mb-3">
                      <option selected>Kies categorie</option>
                      <option>Haltebord</option>
                      <option>Haltevertrekstaat</option>
                      <option>Haltepaal</option>
                      <option>Abriposter</option>
                    <select>
                    <label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Subcategorie</strong></label>                        
                    <select id="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'" class="form-select mb-3">
                      <option selected>Kies subcategorie</option>
                      <option>Haltebord</option>
                      <option>Haltevertrekstaat</option>
                      <option>Haltepaal</option>
                      <option>Abriposter</option>
                    <select>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Omschrijving</strong></label>
                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuleren&nbsp;<i class="bi bi-x-circle"></i></button>
            <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Reset&nbsp;<i class="bi bi-arrow-counterclockwise"></i></button>
            <button class="btn btn-success">Opslaan <i class="bi bi-floppy"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <section class="main-content py-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3"><?php echo $busStopName; ?> <small>(<?php echo $busStopNumber ?>)</small></h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#newBusstopWorkorder">Nieuwe werkorder <i class="bi bi-pencil-square"></i></button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                  <table id="tableWorkOrders" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Incident nr.</th>
                        <th>Categorie</th>
                        <th>Incident</th>
                        <th>Status</th>
                        <th>Actie</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>24-00000000-1</td>
                        <td>Haltevertrekstaat</td>
                        <td>Haltevertrekstaat mist bij de halte.</td>
                        <td><span class="badge bg-warning text-white">In afwachting...</span></td>
                        <td>
                          <i class="bi bi-check2 text-success me-3"></i><i class="bi bi-check2-all text-success me-3"></i>
                        </td>
                      </tr>
                      <tr>
                        <td>24-00000000-2</td>
                        <td>Haltevertrekstaat</td>
                        <td>Haltevertrekstaat mist bij de halte.</td>
                        <td><span class="badge bg-success text-white">Gereed <i class="bi bi-check2"></i></span></td>
                        <td>
                          <i class="bi bi-check2 text-success me-3"></i><i class="bi bi-check2-all text-success me-3"></i>
                        </td>
                      </tr>
                      <tr>
                        <td>24-00000000-3</td>
                        <td>Haltevertrekstaat</td>
                        <td>Haltevertrekstaat mist bij de halte.</td>
                        <td><span class="badge bg-danger text-white">Lang lopend <i class="bi bi-exclamation-triangle"></i></span></td>
                        <td>
                          <i class="bi bi-check2 text-success me-3"></i><i class="bi bi-check2-all text-success me-3"></i>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-3">
                  <h1 class="section-title mb-3">Werkorders historie</h1>
                  <hr class="mb-5">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                      </div>
                    </div>
                  </div>
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