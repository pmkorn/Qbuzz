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

    <title>Qbuzz | Uitrijlijst</title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Uitrijlijst</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Voertuigtype</th>
                                <th>Aantal</th>
                                <td>Afwijkend</td>
                                <th>Totaal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>l11S</td>
                                <td>3</td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">+</button>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>l13S</td>
                                <td>5</td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">+</button>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>l13B</td>
                                <td>4</td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">+</button>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>S13B</td>
                                <td>3</td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">+</button>
                                </td>
                                <td>
                                    <input type="text" inputmode="numeric" class="formp-control">
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