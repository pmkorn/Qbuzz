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
          <div id="alert-success" class="alert alert-success text-center" role="alert">
            <strong>U bent succesvol ingelogd. U wordt nu doorgezet naar de homepage.</strong>
          </div>
          <div id="alert-danger" class="alert alert-danger text-center" role="alert">
           <strong> Het inloggen op uw account is niet gelukt! Probeer opnieuw.</strong>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row align-content-center justify-content-center vh-100">
        <div class="col-md-6 col-xl-3">
          <div class="card login-screen">
            <div class="card-body p-5">
              <div class="logo-container">
                <img src="images/qbuzz-logo.png" alt="Qbuzz Logo" width="200px" class="img-fluid flex mb-3 mx-auto">
              </div>
              <div>
                <h2 class="card-title mb-3 text-center">INLOGGEN</h2>
              </div>              
              <form id="userLoginForm" action="" autocomplete="off">
                <div class="form-group mb-3">
                <label class="form-label" for="employeeUserName"><strong>Gebruikersnaam</strong></label>
                  <input type="text" class="form-control" id="employeeUserName" name="employeeUserName" placeholder="">                      
                </div>
                <div class="form-group mb-3">
                <label class="form-label" for="userPassword"><strong>Wachtwoord</strong></label>
                  <input type="password" class="form-control" id="employeeUserPassword" name="employeeUserPassword" placeholder="">
                </div>
                <div class="text-end mb-5">
                  <a href="account/password-reset/" id="openUserPasswordResetForm">Wachtwoord vergeten?</a>
                </div>
                <div class="d-grid mb-3">
                  <button class="btn btn-orange" id="btnEmployeeLogin" type="button">Inloggen</button>
                  <button class="btn btn-orange" id="btnSpinner" style="display: none;" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Bezig met inloggen...</span>
                  </button>
                </div>
              </form>
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