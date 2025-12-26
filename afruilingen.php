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

    <title>Qbuzz | Home</title>

</head>

<body class="bg-blue-touch">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Voertuiginzet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="busNumber" class="form-label">Busnummer</label>
                                <input type="text" class="form-control form-control-sm" id="busNumber" placeholder="Vul het busnummer in">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="omloop" class="form-label">Omloop</label>
                                <input type="text" class="form-control form-control-sm" id="omloop" placeholder="Vul het omloopnummer in">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="busNumber" class="form-label">Busnummer</label>
                                <input type="text" class="form-control form-control-sm" id="busNumber" placeholder="Vul het busnummer in">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="omloop" class="form-label">Omloop</label>
                                <input type="text" class="form-control form-control-sm" id="omloop" placeholder="Vul het omloopnummer in">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-success">Busruiling aanmaken</button>
                </div>
            </div>
        </div>
    </div>

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Afruiling <i class="bi bi-plus"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>Busnr.</th>
                                <th>Omloop</th>
                                <th>Tijd</th>
                                <th>Plaats</th>
                                <th>Status</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>7701</td>
                                <td>644001</td>
                                <td><i class="bi bi-clock"></i> 15:44</td>
                                <td>Groningen CS</td>
                                <td><span class="badge bg-warning">Openstaand</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i> <!-- Bootstrap Icons -->
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">In behandeling</a></li>
                                            <li><a class="dropdown-item" href="#">Afronden</a></li>
                                            <li><a class="dropdown-item text-danger" href="#">Verwijderen</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>7702</td>
                                <td>644002</td>
                                <td><i class="bi bi-clock"></i> 16:44</td>
                                <td>Groningen CS</td>
                                <td><span class="badge bg-danger">In behandeling</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i> <!-- Bootstrap Icons -->
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">In behandeling nemen</a></li>
                                            <li><a class="dropdown-item" href="#">Afronden</a></li>
                                            <li><a class="dropdown-item text-danger" href="#">Verwijderen</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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