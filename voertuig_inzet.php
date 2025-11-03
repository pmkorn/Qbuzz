<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include('scripts/functions.php');
// include('conn/db.inc.php');

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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <title>InfraGD | <?php echo $page_title; ?></title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <!-- Page title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-title"> <?php echo $page_title; ?> </h1>
                </div>
            </div>
        </div>

        <!-- Output vestigingen -->
        <div class="container-fluid">
            <div class="row">
                <div class="col--md-12">
                    <?php $depots = getDepotName(); ?>
                    <div class="accordion" id="accordionExample">

                        <?php
                        foreach ($depots as $depot) {
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $depot['vestigingCode']; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <?php echo $depot['vestiging']; ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $depot['vestigingCode']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>GroepID</th>
                                                    <th>Voertuiggroep</th>
                                                    <th>Depot</th>
                                                    <th>Omloop</th>
                                                    <th>Totaal</th>
                                                    <th>Uitruk morgen</th>
                                                    <th>Niet inzetbaar</th>
                                                    <th>Delta<i class="bi bi-info-circle ms-3"></i></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>l13B</td>
                                                    <td>Crossway NF 13 mtr Qliner 100 kmh FRL</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td><a href="">Bekijk Voertuigen</a></td>
                                                </tr>
                                                <tr>
                                                    <td>M15B</td>
                                                    <td>Intergro L 100 kmh 15 mtr</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td><a href="">Bekijk Voertuigen</a></td>
                                                </tr>
                                                <tr>
                                                    <td>S15B</td>
                                                    <td>Qliner 15 mtr FRL</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>-2</td>
                                                    <td><a href="">Bekijk Voertuigen</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
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