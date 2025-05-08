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
                    <h2 class="fs-4">Open diensten</h2>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-sm btn-success"><i class="bi bi-plus me-3"></i>Toevoegen</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm table-striped table-hover table-bordered my-3">
                        <thead>
                            <td>Voertuig</td>
                            <td>Omloop</td>
                            <td>Begintijd</td>
                            <td>Beginplaats</td>
                            <td>Eindplaats</td>
                            <td>Eindtijd</td>
                            <td>Opmerking</td>
                            <td>Actie</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-bus-front me-1"></i>1001</td>
                                <td>200211</td>
                                <td>6:37</td>
                                <td>lwdbus</td>
                                <td>bwdbus</td>
                                <td>7:45</td>
                                <td>Bus moet van Leeuwarden naar Sneek</td>
                                <td><i class="bi bi-check me-3 text-success"></i><i class="bi bi-x text-danger"></i></td>
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