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
                            <input class="form-check-input consessie-filter" type="checkbox" name="voertuigConsessieCode" id="'.$row['voertuigConsessieCode'].'" value="'.$row['voertuigConsessieCode'].'" checked>
                            <label class="form-check-label" for="inlineCheckbox1">'.$row['voertuigConsessieCode'].'</label>
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
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    </td>';
        } else if ($row['voertuigStatus'] == '2') {
            $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                            <span class="dot"></span>
                                            <span class="dot dot-warning"></span>
                                            <span class="dot"></span>
                                        </td>
                                    </td>';
        } else if ($row['voertuigStatus'] == '3') {
            $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot dot-danger"></span>
                                        </td>
                                    </td>';
        } else {
            $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>
                                    </td>';
        }
        $voertuigOutput .= '<td><span class="badge text-bg-dark">' . $row['voertuigNummer'] . '</span></td>';
        $voertuigOutput .= '<td>' . $row['voertuigMerk'] . ' ' . $row['voertuigType'] . '</span></td>';
        if ($row['voertuigKenteken'] == '') {
            $voertuigOutput .= '<td></td>';
        } else {
            $voertuigOutput .= '<td><span class="kenteken">' . $row['voertuigKenteken'] . '</td>';
        }
        $voertuigOutput .= '<td>' . $row['voertuigConsessieCode'] . '</td>';
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

    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <title>InfraGD | <?php echo $page_title; ?></title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main">

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <span class="me-5 mb-3">
                            <strong>Consessie:</strong>
                        </span>
                        <?php echo $filterOutput; ?>
                        <table id="voertuigTable" class="table">
                            <thead>
                                <tr>
                                    <th>VoertuigStatus</th>
                                    <th>Voertuig</th>
                                    <th>Type</th>
                                    <th>Kenteken</th>
                                    <th>Consessie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $voertuigOutput; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include('include/modals.php'); ?>

    <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
    <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
    <script src="js/functions.js?<?php echo time(); ?>"></script>

</body>

</html>