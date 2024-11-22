<?php

    session_start();

    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
    error_reporting(E_ALL);

    include('../include/title.inc.php');
    include('../scripts/user_access.php');
    access('ADMIN');

    include('../conn/db.inc.php');

    $output_provincie = '';
    $sql_provincie = "SELECT * FROM provincies";
    if ($result_provincie = mysqli_query($conn, $sql_provincie)) {
        while ($row_provincie = mysqli_fetch_array($result_provincie)) {
            $output_provincie.= '<option value="'.$row_provincie['provincie'].'" data-provincie="'.$row_provincie['provincie'].'">'.$row_provincie['provincie'].'</option>';
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
                        <h1 class="mt-4 section-title">Stremmingen - Aanmaken <i class="bi bi-exclamation-triangle-fill text-danger"></i></h1>
                        <form action="">
                            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="obstructionType" class="form-label">Type:</label>
                                        <select class="form-select" id="obstructionType">
                                            <option selected>---Kies type---</option>
                                            <option value="Dienstmededeling">Dienstmededeling</option>
                                            <option value="Omleiding">Omleiding</option>
                                            <option value="Verkeershinder">Verkeershinder</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="obstructionPriority" class="form-label">Soort:</label>
                                        <select class="form-select" id="obstructionPriority">
                                            <option selected>---Kies type---</option>
                                            <option value="Normaal">Normaal</option>
                                            <option value="Spoed">Spoed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="obstructionRegion" class="form-label">Provincie:</label>
                                        <select id="obstructionRegion" class="form-select">
                                            <option selected>---Kies Provincie---</option>
                                            <?php echo $output_provincie; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="obstructionCounty" class="form-label">Gemeente:</label>
                                        <select id="obstructionCounty" class="form-select">
                                            <option selected>---Nog geen data---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="obstructionPlace" class="form-label">Plaats:</label>
                                        <select id="obstructionPlace" class="form-select">
                                            <option selected>---Nog geen data---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
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
