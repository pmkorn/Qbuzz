<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('../include/title.inc.php');
  include('../scripts/user_access.php');
  access('ADMIN');

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

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/main.css">

    </head>
    <body>

        <?php include('include/admin_top_navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('include/admin_side_navbar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <hr class="dropdown-divider">

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 class="text-end">
                                            <i class="bi bi-layout-split float-start"></i>
                                            Blog
                                        </h2>
                                        <p class="text-start">
                                            Totaal items
                                            <span class="float-end">10</span>
                                        </p>
                                        <p class="text-start">
                                            Totaal likes
                                            <span class="float-end">40</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 class="text-end">
                                            <i class="bi bi-image float-start"></i>
                                            Gallerij
                                        </h2>
                                        <p class="text-start">
                                            Totaal items
                                            <span class="float-end">50</span>
                                        </p>
                                        <p class="text-start">
                                            Totaal likes
                                            <span class="float-end">40</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 class="text-end">
                                            <i class="bi bi-boxes float-start"></i>
                                            Projecten
                                        </h2>
                                        <p class="text-start">
                                            Totaal items
                                            <span class="float-end">50</span>
                                        </p>
                                        <p class="text-start">
                                            Totaal likes
                                            <span class="float-end">40</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 class="text-end">
                                            <i class="bi bi-people float-start"></i>
                                            Leden
                                        </h2>
                                        <p class="text-start">
                                            Totaal gebruikers
                                            <span class="float-end">50</span>
                                        </p>
                                        <p class="text-start">
                                            Aantal premium gebuikers
                                            <span class="float-end">40</span>
                                        </p>
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
        <script src="../js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
        <script src="../js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
        <script src="../js/functions.js?<?php echo time(); ?>"></script>
        <script src="../js/scripts.js?<?php echo time(); ?>"></script>
        
    </body>
</html>
