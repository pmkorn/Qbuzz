<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);
  
  include('conn/db.inc.php');
  if (isset($_SESSION['employeeID'])) {
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

  include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">
<head>

  <base href="/">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/bootstrap-icons.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/flag-icon.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

  <title>InfraGD | <?php echo $page; ?></title>

</head>
  <body class="bg-blue-touch">

  <header class="fixed-top">
    <?php include('include/navbar.inc.php'); ?>
  </header>

  <main class="main">

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Startpagina</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col">
            <div class="callout callout-orange h-100">
              <strong>LET OP!!!</strong>
              Stremming <strong>GD24-G001</strong> is afgelopen.
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col">
            <div class="callout callout-orange h-100">
              <strong>LET OP!!!</strong>
              Stremming <strong>GD24-D002</strong> is per direct ingegaan.
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col">
            <div class="callout callout-orange h-100">
              <strong>LET OP!!!</strong>
              Stremming <strong>GD24-S003</strong> is per direct ingegaan. Alle wijzigingen zullen worden meegenomen in de wjziging.
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>

  </body>
</html>