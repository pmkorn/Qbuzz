<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

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

    <title>Qbuzz InfraGD | Home</title>
  </head>
  <body>

    <div class="container">
      <div class="row ">
        <div class="col-md-6">
          <div id="alert-success" class="alert alert-success" role="alert">
            U bent succesvol ingelogd. U wordt nu doorgezet naar de homepage.
          </div>
          <div id="alert-danger" class="alert alert-danger" role="alert">
            Het aanmaken van uw account is niet gelukt! Probeer opnieuw.
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row align-content-center justify-content-center vh-100">
        <div class="col-md-6 col-xl-3">
          <div class="card password-reset-screen">
            <div class="card-body p-5">
              <div class="logo-container">
                <img src="images/qbuzz-logo.png" alt="Qbuzz Logo" width="200px" class="img-fluid flex mb-3 mx-auto">
              </div>
              <div>
                <h2 class="card-title mb-3 text-center">WACHTWOORD RESET</h2>
              </div>       
              <form id="userLoginForm" action="" autocomplete="off">
                <div class="form-group mb-3">
                  <label for="employeeUserName">Gebruikersnaam</label>
                  <input type="text" class="form-control" id="employeeUserName" placeholder="">                      
                </div>
                <div class="d-grid mb-3">
                  <button class="btn btn-orange" id="btnEmployeePasswordReset" type="button">Wachtwoord reset</button>
                </div>
              </form>
              <p>Al een account? Klik <a href="account/login/" id="openUserRegistrationForm">hier</a> om in te loggen.</p>
              <p>Nog geen account? Klik <a href="account/register/" id="openUserRegistrationForm">hier</a> om te registreren.</p>
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