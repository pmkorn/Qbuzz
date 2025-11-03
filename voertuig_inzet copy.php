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

$filterOutput = '';
$sqlFilter = "SELECT DISTINCT(voertuigConsessieCode) FROM voertuigen ORDER BY voertuigConsessieCode ASC";
if ($sqlFilterResult = mysqli_query($conn, $sqlFilter)) {

    while ($row = mysqli_fetch_array($sqlFilterResult)) {
        $filterOutput .= '<div class="form-check form-check-inline">
                            <input class="form-check-input consessie-filter" type="checkbox" name="voertuigConsessieCode" id="' . $row['voertuigConsessieCode'] . '" value="' . $row['voertuigConsessieCode'] . '" checked>
                            <label class="form-check-label" for="inlineCheckbox1">' . $row['voertuigConsessieCode'] . '</label>
                        </div>';
    }
}

$voertuigOutput = '';
$sqlVoertuigen = "SELECT * FROM voertuigen";
if ($sqlResultVoertuigen = mysqli_query($conn, $sqlVoertuigen)) {
    while ($row = mysqli_fetch_array($sqlResultVoertuigen)) {
        $voertuigOutput .= '<tr>';
        if ($row['voertuigStatus'] == '1') {
            $voertuigOutput .= '<td>
                                            <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '"> 
                                                <span class="dot dot-success"></span>
                                            </div>
                                        </td>';
        } else if ($row['voertuigStatus'] == '2') {
            $voertuigOutput .= '<td>
                                            <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                <span class="dot dot-warning"></span>
                                            </td>
                                        </td>';
        } else if ($row['voertuigStatus'] == '3') {
            $voertuigOutput .= '<td>
                                            <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                <span class="dot dot-danger"></span>
                                            </td>
                                        </td>';
        } else {
            $voertuigOutput .= '<td>
                                            <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                <span class="dot"></span>
                                            </td>
                                        </td>';
        }
        $voertuigOutput .= '<td><i class="bi bi-bus-front-fill me-3"></i>' . $row['voertuigNummer'] . '</td>';
        $voertuigOutput .= '</tr>';
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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <title>InfraGD | <?php echo $page_title; ?></title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <strong>Consessie:</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $filterOutput; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <table class="table" id="tblVoertuigen">
                        <thead>
                            <th>Status</th>
                            <th>Voertuig</th>
                        </thead>
                        <tbody>
                            <?php echo $voertuigOutput; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="bi bi-bus-front-fill me-3"></i>Voertuig 1001 <i class="bi bi-floppy float-end"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="bi bi-stoplights-fill me-3 mb-3"></i>Voertuig status</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkDefault" checked>
                                        <label class="form-check-label" for="checkDefault">
                                            Inzetbaar
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkChecked">
                                        <label class="form-check-label" for="checkChecked">
                                            Wacht op opdracht
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="checkChecked">
                                        <label class="form-check-label" for="checkChecked">
                                            Niet inzetbaar
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Datum van:</label>
                                        <input type="datetime-local" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Datum tot:</label>
                                        <input type="datetime-local" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Opmerking</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="bi bi-list-task me-3 mb-3"></i>Voertuig historie</p>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small>3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small>And some small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">List group item heading</h5>
                                                <small class="text-body-secondary">3 days ago</small>
                                            </div>
                                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                                            <small class="text-body-secondary">And some muted small print.</small>
                                        </a>
                                    </div>
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
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            // let table = new DataTable("#", {
            //     language: {
            //         url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/nl-NL.json',
            //     },
            //     responsive: true,
            //     layout: {
            //         bottomEnd: {
            //             paging: {
            //                 type: 'numbers'
            //             }
            //         },

            //     }
            // });
        });
    </script>

</body>

</html>