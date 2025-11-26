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

// FETCH MEDEWERKERS

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
                    <h1 class="section-title">Planning</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row rows-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Voertuig:</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="Typ voertuignummer in...">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Omloop:</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="Typ omloop in...">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tijd:</label>
                        <input type="time" class="form-control form-control-sm" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Plaats:</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="Geef afruillocatie aan...">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-sm btn-success">Toevoegen</button>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 draggable vehicle-item py-1 d-flex border border-danger border-2 bg-danger-subtle text-danger rounded-1 justify-content-center align-items-center ui-draggable ui-draggable-handle" style="position: relative;">
                        <div class="flex-grow-1">
                            <i class="bi bi-bus-front text-danger"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Voertuig:</small>
                            <p>7401</p>
                            <small>Omloop:</small>
                            <p>644001</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Tijd:</small>
                            <p>17:00</p>
                            <small>Locatie:</small>
                            <p>CS</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Door:</small>
                            <p>P. Korn</p>
                            <small>Status:</small>
                            <p class="bi bi-check"></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 draggable vehicle-item py-1 d-flex border border-warning border-2 bg-warning-subtle text-warning rounded-1 justify-content-center align-items-center ui-draggable ui-draggable-handle" style="position: relative;">
                        <div class="flex-grow-1">
                            <i class="bi bi-bus-front text-warning"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Voertuig:</small>
                            <p>7401</p>
                            <small>Omloop:</small>
                            <p>644001</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Tijd:</small>
                            <p>17:00</p>
                            <small>Locatie:</small>
                            <p>CS</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Door:</small>
                            <p>P. Korn</p>
                            <small>Status:</small>
                            <p class="bi bi-check"></p>
                        </div>
                    </div>
                </div>
                <div class="col3">
                    <div class="mb-3 draggable vehicle-item py-1 d-flex border border-success border-2 bg-success-subtle text-success rounded-1 justify-content-center align-items-center ui-draggable ui-draggable-handle" style="position: relative;">
                        <div class="flex-grow-1">
                            <i class="bi bi-bus-front text-success"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Voertuig:</small>
                            <p>7401</p>
                            <small>Omloop:</small>
                            <p>644001</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Tijd:</small>
                            <p>17:00</p>
                            <small>Locatie:</small>
                            <p>CS</p>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small>Door:</small>
                            <p>P. Korn</p>
                            <small>Status:</small>
                            <p class="bi bi-check"></p>
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

</body>

</html>