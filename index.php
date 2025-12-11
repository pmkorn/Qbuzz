<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css?<?php echo time(); ?>">
    <style>
        #map {
            height: 300px;
        }

        .card-body {
            padding: 0;
        }

        .card-fullscreen {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 9999;
            overflow: auto;
            .card-body{
                height: calc(100vh - 56px) !important;
                #map {
                height: 100% !important;
                width: 100% !important;
            }
            }
        }
    </style>

    <title>Qbuzz | Home</title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">Voertuig overzicht</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    Test
                </div>
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">test</div>
                        <div class="col-12 col-md-6 col-lg-4">test</div>
                        <!-- Column for displaying card with roadmap -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div id=cardFullScreen class="card">
                                <div class="card-header">
                                    Positie voertuig
                                    <i id="fullScreen" class="bi bi-arrows-fullscreen float-end"></i>
                                    <i class="bi bi-list-task float-end mx-3"></i>
                                </div>
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/modals.php'); ?>

    <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
    <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js?<?php echo time(); ?>"></script>
    <script src="js/map.js"></script>
    <script>
        const cardEl = document.getElementById("cardFullScreen");
        const expand = document.getElementById("fullScreen");

        expand.addEventListener("click", () => {
            cardEl.classList.toggle("card-fullscreen");
        });
    </script>

</body>

</html>