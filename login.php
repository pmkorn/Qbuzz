<?php

    session_start();

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
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
                    Inloggen gelukt, U wordt nu doorgestuurd naar de homepagina.
                </div>
                <div id="alert-danger" class="alert alert-danger" role="alert">
                    Inloggen is niet gelukt! Probeer opnieuw.
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    <?php
                        $password = "P@trickK0rn1978";
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        echo "Wachtwoord: " . $password . "<br>";
                        echo "Gehasht wachtwoord: " . $hashedPassword . "<br>";
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center justify-content-center text-center vh-100">

            <div class="col-md-3 login-section-wrapper bg-white p-5 rounded">
                <img src="images/qbuzz-logo.png" alt="Qbuzz logo" class="img-fluid mb-3" width="150px">
                <h5 class="fw-bold mb-3">Inloggen</h5>
                <form id="login-form" autocomplete="off">
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-sm" id="userEmail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-sm" id="userPassword" placeholder="Wachtwoord">
                    </div>
                    <div class="d-grid mb-3">
                        <button type="button" id="btnUserLogin" class="btn btn-yellow btn-sm">Inloggen</button>
                        <button class="btn btn-yellow btn-lg" id="btnSpinner" style="display: none;" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Bezig met inloggen...</span>
                        </button>
                    </div>
                    <div class="ms-auto small">
                        <a href="wachtwoord-reset/">Wachtwoord vergeten?</a>
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