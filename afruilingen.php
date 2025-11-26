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

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-success mb-3">Afruiling <i class="bi bi-plus"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Voertuig</th>
                                <th>Omloop</th>
                                <th>Tijd</th>
                                <th>Reden afruiling</th>
                                <th>Plaats</th>
                                <th>Status</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>7440</td>
                                <td>458671</td>
                                <td>22:59</td>
                                <td>SoC</td>
                                <td>CS</td>
                                <td><span class="badge bg-success">In afwachting</span></td>
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
                            <tr>
                                <td>7440</td>
                                <td>458671</td>
                                <td>22:59</td>
                                <td>SoC</td>
                                <td>CS</td>
                                <td><span class="badge bg-warning">In behandeling</span></td>
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
                            <tr>
                                <td>7440</td>
                                <td>458671</td>
                                <td>22:59</td>
                                <td>SoC</td>
                                <td>CS</td>
                                <td><span class="badge bg-danger">Afgehandeld</span></td>
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