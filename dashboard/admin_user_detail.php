<?php

    // Start session
    session_start();

    // Display error notifications on display
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
    error_reporting(E_ALL);

    // 
    include('../include/title.inc.php');
    include('../scripts/user_access.php');
    access('ADMIN');

    include('../conn/db.inc.php');

    $employeeID = $_GET['employeeID'];

    $employee_name = '';

    $sql = "SELECT * FROM employees WHERE employeeID = '$employeeID' LIMIT 1";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $employee_name = $row['employeeFirstName'].' '.$row['employeeLastName'];
            $employeeMobile = $row['employeeMobile'];
        }
    }

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
      <base href="/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - <?php echo $page; ?></title>

        <link rel="stylesheet" href="../css/bootstrap.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/bootstrap-icons.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/styles.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/main.css?<?php echo time(); ?>">

    </head>
    <body class="sb-nav-fixed">
    <?php include('include/admin_top_navbar.php'); ?>
        <div id="layoutSidenav">
        <?php include('include/admin_side_navbar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="section-title mt-4">Gebruikers - Overzicht</h1>
                        <hr class="dropdown-divider mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card p-3">
                                    <div class="profile-img mb-3">
                                        <img src="https://placehold.co/300x300" alt="" class="img-fluid img-thumbnail rounded-circle">
                                    </div>
                                    <div class="profile-meta text-center">
                                        <h5 class="mb-3"><?php echo $employee_name; ?></h5>
                                        <a class="btn btn-yellow" href="tel:<?php echo $employeeMobile; ?>">Bellen</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Personalia</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Rechten</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Berichten</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <h6>Personalia</h6>
                                    </div>
                                    <div class="tab-pane p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                        <h6>Rechten</h6>
                                    </div>
                                    <div class="tab-pane p-3" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                                        <h6>Berichten</h6>
                                    </div>
                                    <div class="tab-pane p-3" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">
                                        <h6>Instellingen</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-person-add"></i> Werknemer toevoegen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addEmployee">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeFirstName" class="form-label">Voornaam</label>
                                        <input type="text" class="form-control" id="employeeFirstName">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeLastName" class="form-label">Achternaam</label>
                                        <input type="text" class="form-control" id="employeeLastName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeEmail" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="employeeEmail">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeMobile" class="form-label">Mobiel</label>
                                        <input type="text" class="form-control" id="employeeMobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                         <label for="employeePermissions">Rechten</label>
                                    </div>                                   
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Afsluiten</button>
                        <button type="button" class="btn btn-success">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
        <script src="../js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js?<?php echo time(); ?>"></script>
        <script src="../js/functions.js?<?php echo time(); ?>"></script>
        <script src="../js/scripts.js?<?php echo time(); ?>"></script>
        
    </body>
</html>
