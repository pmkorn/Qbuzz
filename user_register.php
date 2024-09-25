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
            Het aanmaken van uw account is gelukt! U kunt nu inloggen.
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
          <div class="card signup-screen">
            <div class="card-body p-5">
              <div class="logo-container">
                <img src="images/qbuzz-logo.png" alt="Qbuzz Logo" width="200px" class="img-fluid flex mb-3 mx-auto">
              </div>
              <div>
                <h2 class="card-title mb-3 text-center">REGISTREREN</h2>
              </div>              
              <form id="userLoginForm" action="" autocomplete="off">
                <div class="form-group mb-3">
                  <label for="employeeFirstName">Voornaam</label>
                  <input type="email" class="form-control" id="employeeFirstName" placeholder="">                      
                </div>
                <div class="form-group mb-3">
                  <label for="employeeLastName">Achternaam</label>
                  <input type="email" class="form-control" id="employeeLastName" placeholder="">                      
                </div>
                <div class="form-group mb-3">
                  <label for="employeeEmail">Email</label>
                  <input type="email" class="form-control" id="employeeEmail" placeholder="">                      
                </div>
                <div class="form-group mb-3">
                  <label for="employeeUserPassword">Wachtwoord</label>
                  <input type="password" class="form-control" id="employeeUserPassword" placeholder="">
                </div>
                <div class="form-group mb-5">
                  <label for="employeeUserPasswordRepeat">Herhaal wachtwoord</label>
                  <input type="password" class="form-control" id="employeeUserPasswordRepeat" placeholder="">
                </div>
                <div class="d-grid mb-3">
                  <button class="btn btn-orange" id="btnEmployeeRegister" type="button">Registreren</button>
                </div>  
              </form>
              <p>Al een account? Klik <a href="account/login/" id="openUserRegistrationForm">hier</a> om in te loggen.</p>
              <p>Wachtwoord vergeten? Klik <a href="account/password-reset/" id="openUserPasswordResetForm">hier</a> om je wachtwoord te resetten.</p>
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