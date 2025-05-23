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
                        <h1 class="mt-4 section-title my-3">Dashboard</h1>

                        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 g-3">

                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-start me-3">
                                                <i class="bi bi-geo-alt display-3"></i>
                                            </div>
                                            <div class="text-start">
                                                <h4>Stremmingen</h4>
                                                <p>Drenthe <small></small></p>
                                                <p>Friesland</p>
                                                <p>Groningen</p>
                                                <p>Groningen Stad</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-start me-3">
                                                <i class="bi bi-sign-stop display-3"></i>
                                            </div>
                                            <div class="text-start">
                                                <h5>Haltes</h5>
                                                <p>slnvslv sfl sfbndbojdnf bk</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-start me-3">
                                                <i class="bi bi-list-task display-3"></i>
                                            </div>
                                            <div class="text-start">
                                                <h5>Werkorders</h5>
                                                <p>slnvslv sfl sfbndbojdnf bk</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-start me-3">
                                                <i class="bi bi-bell display-3"></i>
                                            </div>
                                            <div class="text-start">
                                                <h5>Meldingen</h5>
                                                <p>slnvslv sfl sfbndbojdnf bk</p>
                                            </div>
                                        </div>
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
