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
          $employeeOutput .= '<td>'.$row['employeeID'].'</td>';
          $employeeOutput .= '<td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>';
          $employeeOutput .= '<td>'.$row['employeeUserName'].'</td>';
          $employeeOutput .= '<td>'.date("d-F-Y", strtotime($row['employeeSignUpDate'])).'</td>';
          $employeeOutput .= '<td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Aktief</label>
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
                                <button class="btn btn-yellow mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-file-plus"></i> Gebruiker toevoegen</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Naam</th>
                                                <th>Gebruikersnaam</th>
                                                <th>Account sinds</th>
                                                <th>Status</th>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nieuwe blog toevoegen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="blogTitle" class="form-label">Blog titel</label>
                                <input type="text" class="form-control" id="blogTitle">
                            </div>
                            <div class="mb-3">
                                <label for="blogSubtitle" class="form-label">Blog subtitel</label>
                                <input type="text" class="form-control" id="blogSubtitle">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="blogContent" class="form-label">Blog subtitel</label>
                                <textarea class="form-control" name="blogContent" id="blogContent" rows="20"></textarea>
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
        <script src="../js/functions.js?<?php echo time(); ?>"></script>
        <script src="../js/scripts.js?<?php echo time(); ?>"></script>
        
    </body>
</html>
