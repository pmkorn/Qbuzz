<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

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

  <title>PATRICKKORN | <?php echo $page; ?></title>

</head>
  <body>

  <div class="container">
    <div class="row align-align-items-center">
      <div class="col-md-6">
        <div id="alert-success" class="alert alert-success" role="alert">
          Het aanmaken van uw account is gelukt! U kunt nu inloggen.
        </div>
        <div id="alert-danger" class="alert alert-danger" role="alert">
          Het aanmaken van uw account is niet gelukt! Probeer opnieuw.
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row align-items-center justify-content-center vh-100">
      
      <div class="col-md-3 login-section-wrapper bg-white p-5 rounded">
        <h2 class="fw-bold site-logo mb-3"><strong>PATRICK<span class="fw-bold fs-5 ms-1">KORN</span></strong></h2>
        <h5 class="fw-bold mb-3">Wachtwoord reset</h5>
        <form id="password-reset--form" autocomplete="off">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
          </div>
          <div class="d-grid mb-3">
            <button type="button" id="btnUserRegister" class="btn btn-yellow btn-lg">Wachtwoord resetten</button>
          </div>
          <div class="d-flex">
            <div class="me-auto small">
              Al een account?<br> <a href="inloggen/">Inloggen</a>
            </div>
            <div class="ms-auto small">
              <a href="registreren/">Registreren</a>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>

  </body>
</html>