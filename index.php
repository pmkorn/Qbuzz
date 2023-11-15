<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {
    include('includes/db.inc.php');
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
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <div class="container-fluid p-3">

      <div class="row mb-3">
      
        <div class="col-md-12 mb-3 mb-md-0">          
          <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
          <hr>
        </div>

      </div>

      <div class="row mb-5">
        <div class="col-sm-2 mb-3 mb-md-0">
          <a href="" class="icon-container">
            <span class="icon bi bi-file-pdf text-danger"></span>
            <span class="icon-text">Overzicht stremmingen</span>
          </a>          
        </div>
        <div class="col-sm-2 mb-3 mb-md-0">
          <a href="" class="icon-container">
            <span class="icon bi bi-exclamation-triangle text-danger"></span>
            <span class="icon-text">Stremmingen Aanmaken</span>
          </a>          
        </div>
        <div class="col-sm-2 mb-3 mb-md-0">
          <a href="" class="icon-container">
            <span class="icon bi bi-file-earmark-text text-danger"></span>
            <span class="icon-text">Werkorder rapportage</span>
          </a>          
        </div>
      </div>

      <div class="row mb-5">

        <div class="col-md-12 mb-3 mb-md-0">          
          <h3>Overzicht stremmingen</h3>
        </div>

        <div class="col-md-3 mb-3 mb-md-0">
          <div class="card">
            <div class="card-header">
              <i class="bi bi-list-task"></i> Groningen
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Aantal</th>
                    </tr>
                </thead>
                <tbody>
                  <tr><td>Aankomend</td><td><span class="badge text-bg-warning text-light"><strong>0</strong></span></td></tr><tr><td>Lopend</td><td><span class="badge text-bg-success"><strong>0</strong></span></td></tr><tr><td>Geeïndigd</td><td><span class="badge text-bg-danger"><strong>1</strong></span></td></tr>                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3 mb-md-0">
          <div class="card">
            <div class="card-header">
              <i class="bi bi-list-task"></i> Drenthe
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Aantal</th>
                    </tr>
                </thead>
                <tbody>
                  <tr><td>Aankomend</td><td><span class="badge text-bg-warning text-light"><strong>0</strong></span></td></tr><tr><td>Lopend</td><td><span class="badge text-bg-success"><strong>0</strong></span></td></tr><tr><td>Geeïndigd</td><td><span class="badge text-bg-danger"><strong>1</strong></span></td></tr>                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3 mb-md-0">
          <div class="card">
            <div class="card-header">
              <i class="bi bi-list-task"></i> Stad
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Aantal</th>
                    </tr>
                </thead>
                <tbody>
                  <tr><td>Aankomend</td><td><span class="badge text-bg-warning text-light"><strong>0</strong></span></td></tr><tr><td>Lopend</td><td><span class="badge text-bg-success"><strong>0</strong></span></td></tr><tr><td>Geeïndigd</td><td><span class="badge text-bg-danger"><strong>1</strong></span></td></tr>                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <div class="row mb-5">

        <div class="col-md-12 mb-3 mb-md-0">          
          <h3>Overzicht werkorders</h3>
        </div>

        <div class="col-md-3 mb-3 mb-md-0">
          <div class="card">
            <div class="card-header">
              <i class="bi bi-list-task"></i> Overzicht Werkorders
            </div>
            <div class="card-body">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Groningen, Bedrijven Peizerweg</h5>
                  </div>
                  <p class="mb-1">10007190</p>
                  <small>Arbiposter mist adfn bkbn kbn kn adbn df;kbn dgken gkadn kadrn dfbg i</small>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-3">
        <select class="form-control" id="obstructionLinesList" multiple aria-label="Multiple select" size="20">
          <optgroup label="Veendam, Eems">
            <option value="Veendam, Eems (12635010)">Veendam, Eems (12635010)</option>
            <option value="Veendam, Eems (12635020)">Veendam, Eems (12635020)</option>
          </optgroup>
          <optgroup label="Veendam, Gelrelaan">
            <option value="Veendam, Gelrelaan (12635110)">Veendam, Gelrelaan (12635110)</option>
            <option value="Veendam, Gelrelaan (12635120)">Veendam, Gelrelaan (12635120)</option>
            <option value="Veendam, Gelrelaan (12635120)">Lanterna</option>
          </optgroup>
        </select>
        </div>
      </div>

    </div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>

</html>