<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

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

    <div class="container-fluid">
      <div class="row justify-content-center align-content-center vh-100">
        <div class="col-md-3">
          <div class="haltebord-container">
            <div class="haltebord-header py-5">
              <img src="images/bus_logo.jpg" alt="" width="150px;">
              <div class="halte-id d-flex justify-content-between">
                <span class="zone-nummer">1000</span>
                <span class="halte-nummer">1000</span>
              </div>
              
            </div>
            <div class="haltebord-body py-5">
              <form action="">

              </form>
            </div>
            <div class="haltebord-footer py-5">

            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>

</html>