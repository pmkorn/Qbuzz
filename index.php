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
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <!--<body oncontextmenu="return false">-->
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">   
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Home</h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <p>Hier vind je alles over de aankomende en lopende stremmingen. Mocht je vragen hebben over een van de stremmingen neem dan contact op met een van jouw collega's van <strong>InfraGD</strong> of via <a href="mailto:stremmingenGD@qbuzz.nl">mail</a>.</p>
            <p>Mochten er onduidelijkheden zijn laat het ons graag weten.</p>
            <p>Mocht je niet kunnen inloggen of kunnen navigeren binnen de webomgeving neem dan contact op met <a href="mailto:patrick.korn@qbuzz.nl">Patrick Korn</a></p>
            <p>Team <strong>InfraGD</strong>.</p>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <h5>Updates</h5>
            <p></p>
          </div>
        </div>
      </div>

    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>

</html>