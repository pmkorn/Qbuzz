<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // if (!isset($_SESSION['employeeID'])) {
  //   header('Location: account/login/'); 
  // } else {
  //   include('includes/db.inc.php');
  //   $employeeID = $_SESSION['employeeID'];
  //   $sqlSelectEmployeeData = "SELECT * FROM employees WHERE employeeID = '$employeeID' LIMIT 1";
  //   if ($sqlResultSelectEmployeeData = mysqli_query($conn, $sqlSelectEmployeeData)) {
  //     while ($row = mysqli_fetch_array($sqlResultSelectEmployeeData)) {
  //       $employeeFirstName = $row['employeeFirstName'];
  //       $employeeLastName = $row['employeeLastName'];
  //       $employeeRole = $row['employeeRole'];
  //     }
  //   }   
  // }

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
  <!--<body oncontextmenu="return false">-->
  <body>


    <div class="vh-100 container-fluid">
      <div class="row h-100 justify-content-center align-content-center">
        <div class="col-md-12 text-center">
          <i class="bi bi-exclamation-triangle-fill text-danger display-1 mb-5"></i>
          <h1 class="display-1 mb-5">Toegang geweigerd</h1>
          <hr class="mb-5">
          <h5 class="mb-5">U heeft geen toegang tot deze pagina. Voor vragen kunt u terecht bij de beheerder van deze applicatie.</h5>
          <a class="btn btn-orange btn-lg" href="/">Inloggen</a>
        </div>
      </div>
    </div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/functions.js"></script>
</html>