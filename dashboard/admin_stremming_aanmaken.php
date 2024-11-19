<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('../include/title.inc.php');
  include('../scripts/user_access.php');
  access('ADMIN');

  include('../conn/db.inc.php');

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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="obstructionType">Type:</label>
                                                <select id="obstructionType" class="form-select">
                                                    <option selected>---Selecteer type---</option>
                                                    <option value="Dienst mededeling">Dienstmededeling</option>
                                                    <option value="Omleiding">Omleiding</option>
                                                    <option value="Verkeershinder">Verkeershinder</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="obstructionPriority">Prioriteit:</label>
                                                <select id="obstructionPriority" class="form-select">
                                                    <option selected>---Selecteer prioriteit---</option>
                                                    <option value="Normaal">Normaal</option>
                                                    <option value="Spoed">Spoed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb3">
                                                <label for="obstructionRegion" class="form-label">Regio:</label>
                                                <select id="obstructionRegion" class="form-select">
                                                    <option selected>---Selecteer regio---</option>
                                                    <option value="Drenthe">Drenthe</option>
                                                    <option value="Friesland">Friesland</option>
                                                    <option value="Groningen">Groningen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="obstructionPlace">Plaats:</label>
                                                <input id="obstructionPlace" class="form-control" list="listObstructionPlaces" placeholder="Type een plaatsnaam">
                                                <datalist id="listObstructionPlaces">
                                                    <option value="Assen">
                                                    <option value="Emmen">
                                                    <option value="Groningen">
                                                    <option value="Veendam">
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="obstructionRoute">Route:</label>
                                        <textarea id="obstructionRoute" class="form-control" rows="10" placeholder="Type routebeschrijving..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="obstructionCommentInternal">Opmerking Intern:</label>
                                        <textarea id="" class="form-control" rows="4" placeholder="Opmerking voor intern"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="obstructionCommentExternal">Opmerking Extern:</label>
                                        <textarea id="" class="form-control" rows="4" placeholder="Opmerking voor inexternern"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="obstructionExpiredStops">Vervallen haltes:</label>
                                        <select id="obstructionExpiredStops" class="form-select" size="10" aria-label="Multiple Select" multiple select>
                                            <option value="Veendam">Veendam</option>
                                            <option value="Groningen">Groningen</option>
                                            <option value="Assen">Assen</option>
                                            <option value="Emmen">Emmen</option>
                                            <option value="Leeuwarden">Leeuwarden</option>
                                            <option value="Drachten">Drachten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="obstructionTempraryStops">Tijdelijke haltes:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4779.091189167631!2d6.543830187224907!3d53.20806519084199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1snl!2snl!4v1730982125619!5m2!1snl!2snl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
