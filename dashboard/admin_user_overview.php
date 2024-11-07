<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('../include/title.inc.php');
  include('../scripts/user_access.php');
  access('ADMIN');

  include('../conn/db.inc.php');
  $employeeOutput = '';
  $sql = "SELECT * FROM employees WHERE employeeID NOT IN ('".$_SESSION['employeeID']."')";
  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        $employeeOutput .= '<tr>';
          $employeeOutput .= '<td><img src="https://placehold.co/30x30" alt="Profile picture" class="img-fluid rounded-circle me-3">'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>';
          $employeeOutput .= '<td>'.$row['employeeUserName'].'</td>';
          $employeeOutput .= '<td>'.$row['employeeEmail'].'</td>';
          if ($row['employeeIsActive'] == 0) {
            $employeeOutput .= '<td>
                                    <div class="form-check form-switch" id="employee-status-'.$row['employeeID'].'">
                                        <input class="form-check-input" type="checkbox" role="switch" id="employee-'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-is-active="'.$row['employeeIsActive'].'">
                                        <!--<label class="form-check-label" for="flexSwitchCheckChecked">Aktief</label>-->
                                    </div>
                                </td>';
          } else {
            $employeeOutput .= '<td>
                                    <div class="form-check form-switch id="employee-status-'.$row['employeeID'].'"">
                                        <input class="form-check-input" type="checkbox" role="switch" id="employee-'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-is-active="'.$row['employeeIsActive'].'" checked>
                                        <!--<label class="form-check-label" for="flexSwitchCheckChecked">Aktief</label>-->
                                    </div>
                                </td>';
          }
          $employeeOutput .= '<td>
                                    <div class="dropwdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actie
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="">Rechten</a>
                                                <a class="dropdown-item" href="">Gegevens</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>';
        $employeeOutput .= '</tr>';
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
                            <div class="col-md-12">
                                <button class="btn btn-link mb-4"><i class="bi bi-dash-circle me-3"></i>Verwijderen</button>
                                <button class="btn btn-link mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle me-3"></i>Gebruiker toevoegen</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="employeeTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Gebruikersnaam</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Opties</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php
                                                echo $employeeOutput;
                                            ?>
                                        </tbody>
                                    </table>
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
        <script>
            let table = new DataTable('#employeeTable', {
              language: {
                url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/nl-NL.json',
              }
            });
        </script>
        
    </body>
</html>
