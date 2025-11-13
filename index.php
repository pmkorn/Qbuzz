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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="bi bi-buildings"></i>&nbsp;Appingedam&nbsp;<small>(apggar)</small>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Voertuig</th>
                                                <th>Gepland</th>
                                                <th>Aanwezig</th>
                                                <th>Telling</th>
                                                <th>Delta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bus 1</td>
                                                <td>10</td>
                                                <td>9</td>
                                                <td>9</td>
                                                <td class="text-danger">-1</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 2</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td class="text-success">0</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 3</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>13</td>
                                                <td class="text-success">+1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-buildings"></i>&nbsp;Assen&nbsp;<small>(asngrg)</small>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Voertuig</th>
                                                <th>Gepland</th>
                                                <th>Aanwezig</th>
                                                <th>Telling</th>
                                                <th>Delta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bus 1</td>
                                                <td>10</td>
                                                <td>9</td>
                                                <td>9</td>
                                                <td class="text-danger">-1</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 2</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td class="text-success">0</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 3</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>13</td>
                                                <td class="text-success">+1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="bi bi-buildings"></i>&nbsp;Emmen&nbsp;<small>(emngrg)</small>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Voertuig</th>
                                                <th>Gepland</th>
                                                <th>Aanwezig</th>
                                                <th>Telling</th>
                                                <th>Delta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bus 1</td>
                                                <td>10</td>
                                                <td>9</td>
                                                <td>9</td>
                                                <td class="text-danger">-1</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 2</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td>8</td>
                                                <td class="text-success">0</td>
                                            </tr>
                                            <tr>
                                                <td>Bus 3</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>13</td>
                                                <td class="text-success">+1</td>
                                            </tr>
                                        </tbody>
                                    </table>
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

</body>

</html>