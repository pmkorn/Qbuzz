<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$vestiging = '';
include('conn/db.inc.php');
$sql = "SELECT * FROM vestiging";
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        $vestiging .= '<option value='.$row['vestiging'].' data-id='.$row['vestigingCode'].'>'.$row['vestiging'].' ('.$row['vestigingCode'].')</option>';
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <title>PATRICKKORN | <?php echo $page; ?></title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main">

        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="section-title">Openstaande diensten/omlopen</h1>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#omloopModal">Toevoegen</a>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="vestiging" class="form-label">Vestiging:</label>
                            <select id="vestiging" class="form-select">
                                <option selected>---Nog geen data---</option>
                                <?php echo $vestiging; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" id="GoTo">Ga <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h5>Openstaand</h5>
                        <div class="alert alert-danger">
                            <div class="top-section d-flex">
                                <div class="d-flex flex-column text-center">
                                    <span class="bi bi-bus-front-fill fs-3"></span>7614
                                </div>
                                <div class="vehicle-details">
                                    <span class="badge bg-danger">FRL</span>
                                    <span class="badge bg-danger">Setra S 419 UL 100 km 15 meter FRL</span>
                                </div>
                            </div>
                            <div class="bottom-section">
                                <span class="badge bg-danger">Lijn F315</span>
                                <span class="badge bg-danger">Rit 1045</span>
                                <span class="badge bg-danger">Omloop 200061</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>In behandeling</h5>
                        <div class="alert alert-warning">
                            <div class="top-section d-flex">
                                <div class="d-flex flex-column text-center">
                                    <span class="bi bi-bus-front-fill fs-3"></span>7614
                                </div>
                                <div class="vehicle-details">
                                    <span class="badge bg-warning">FRL</span>
                                    <span class="badge bg-warning">Setra S 419 UL 100 km 15 meter FRL</span>
                                </div>
                            </div>
                            <div class="bottom-section">
                                <span class="badge bg-warning">Lijn F315</span>
                                <span class="badge bg-warning">Rit 1045</span>
                                <span class="badge bg-warning">Omloop 200061</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>Afgerond</h5>
                        <div class="alert alert-success">
                            <div class="top-section d-flex">
                                <div class="d-flex flex-column text-center">
                                    <span class="bi bi-bus-front-fill fs-3"></span>7614
                                </div>
                                <div class="vehicle-details">
                                    <span class="badge bg-success">FRL</span>
                                    <span class="badge bg-success">Setra S 419 UL 100 km 15 meter FRL</span>
                                </div>
                            </div>
                            <div class="bottom-section">
                                <span class="badge bg-success">Lijn F315</span>
                                <span class="badge bg-success">Rit 1045</span>
                                <span class="badge bg-success">Omloop 200061</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include('include/modals.php'); ?>

    <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
    <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script> -->
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            //Initialize datatable
            let table = new DataTable("#uitrukTable", {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/nl-NL.json',
                },
                responsive: true
            });

        });
    </script>

</body>

</html>