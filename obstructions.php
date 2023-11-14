<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {
    include('includes/db.inc.php');
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

  include('includes/headertitle.inc.php');

?>

<!doctype html>
<html lang="nl">
  <head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/favicon_qbuzz.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger"></i> InfraGD | Invoer nieuwe stremming</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <form action="" id="insertObstructionForm">
                  <div class="row">

                    <div class="col-md-6 left">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionRegion" class="form-label"><strong>Regio:</strong></label>
                            <select id="obstructionRegion" class="form-select">
                              <option selected>Kies...</option>
                              <option value="1">Drenthe</option>
                              <option value="2">Friesland</option>
                              <option value="3">Groningen</option>
                              <option value="4">Stad</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionNumber" class="form-label"><strong>Stremmingsnummer:</strong></label>
                            <input type="text" class="form-control" id="obstructionNumber" placeholder="" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionType" class="form-label"><strong>Type:</strong></label>
                            <select id="obstructionType" class="form-select">
                              <option selected>Kies...</option>
                              <option value="1">Diensmededeling</option>
                              <option value="2">Omleiding</option>
                              <option value="3">Verkeershinder</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionPriority" class="form-label"><strong>Prioriteit:</strong></label>
                            <select id="obstructionPriority" class="form-select">
                              <option selected>Kies...</option>
                              <option value="1">Normaal</option>
                              <option value="2">Spoed</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionPlace" class="form-label"><strong>Plaats:</strong></label>
                            <input type="text" class="form-control" id="obstructionPlace" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionTrajectory" class="form-label"><strong>Traject:</strong></label>
                            <input type="text" class="form-control" id="obstructionTrajectory" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="obstructionReason" class="form-label"><strong>Reden:</strong></label>
                            <input type="text" class="form-control" id="obstructionReason" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card mb-3">
                            <div class="card-header"><i class="bi bi-calendar"></i> Van - Tot</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <div class="mb-3">
                                        <label for="obstructionDateStart" class="form-label"><strong>Startdatum:</strong></label>
                                        <input type="date" class="form-control" name="obstructionDateStart" id="obstructionDateStart">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="obstructionTimeStart" class="form-label"><strong>Starttijd:</strong></label>
                                        <input type="time" class="form-control" name="obstructionTimeStart" id="obstructionTimeStart">
                                      </div>
                                    </div>
                                  </div>                       
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <div class="mb-3">
                                        <label for="obstructionDateEnd" class="form-label"><strong>Einddatum:</strong></label>
                                        <input type="date" class="form-control" name="obstructionDateEnd" id="obstructionDateEnd">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="obstructionTimeEnd" class="form-label"><strong>Starttijd:</strong></label>
                                        <input type="time" class="form-control" name="obstructionTimeEnd" id="obstructionTimeEnd">
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header"><i class="bi bi-bus-front"></i> Lijnen</div>
                          </div>
                          <div class="card-body">

                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card mb-3">
                            <div class="card-header"><i class="bi bi-map"></i> Omleidingroute + Kaart</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="div col-md-8">
                                  <div class="mb-3">
                                    <label for="obstructionRoute" class="form-label"><strong>Te rijden route:</strong></label>
                                    <textarea class="form-control" name="obstructionRoute" id="obstructionRoute" rows="10"></textarea>
                                  </div>
                                </div>
                                <div class="div col-md-4">
                                  <div class="mb-3">
                                    <label for="obstructionMap" class="form-label"><strong>Kaart:</strong></label>
                                    <input type="file" class="form-control" id="obstructionMap" name="obstructionMap">
                                  </div>
                                  <div class="mb-3">
                                    <label for="obstructionComment" class="form-label"><strong>Opmerking:</strong></label>
                                    <textarea class="form-control" name="obstructionComment" id="obstructionComment" rows="6"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header"><i class="bi bi-sign-stop"></i> Halteverwijzingen</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label class="form-label" for="obstructionLinesList"><strong>Haltes:</strong></label>
                                  <select class="form-control" id="obstructionLinesList" multiple aria-label="Multiple select" size="20">
                                    <option value="Halte 1">Halte 1</option>
                                    <option value="Halte 2">Halte 2</option>
                                    <option value="Halte 3">Halte 3</option>
                                    <option value="Halte 4">Halte 4</option>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <label for="expiredStops"><strong>Vervallen haltes:</strong></label>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button" id="btnTempExpiredStops1"><i class="bi bi-copy"></i> 1</button>
                                        <input type="text" class="form-control" id="tempExpiredStops1">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 2</button>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 3</button>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 4</button>
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="tempStops"><strong>Tijdelijke haltes:</strong></label>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button" id="btnTempStops1"><i class="bi bi-copy"></i> 1</button>
                                        <input type="text" class="form-control" id="tempStops1">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 2</button>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 3</button>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="input-group mb-3">
                                        <!--<span class="input-group-text" id=""><i class="bi bi-copy"></i></span>-->
                                        <button class="btn btn-orange" type="button"><i class="bi bi-copy"></i> 4</button>
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Annuleer</button>
            <button  class="btn btn-success" id="btnSaveObstruction"><i class="bi bi-floppy"></i> Opslaan</button>
          </div>
        </div>
      </div>
    </div>

    <?php include('includes/navbar.inc.php'); ?>

    <div class="container-fluid p-3">

      <div class="row mb-3">

        <div class="col-md-12 mb-3 mb-md-0">          
          <h1><i class="bi bi-list-task"></i> Stremmingen</h1>
          <hr>
        </div>

      </div>

      <div class="row mb-5">

        <div class="col-md-12 mb-3">
          <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-folder-plus"></i> Invoer stremming</button>
        </div>

        <div class="col-md-12 mb-3 mb-md-0">          
          <h3>Overzicht stremmingen</h3>
        </div>

        <div class="col-md-9 mb-3 mb-md-0">
          <div class="card">
            <div class="card-header">
              <i class="bi bi-list-task"></i> Stremmingen
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Stremmingsnr.</th>
                      <th>Plaats</th>
                      <th>Traject</th>
                      <th>Van - Tot</th>
                      <th>Lijnen</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>3</td>
                    <td>GD23-D001</td>
                    <td>Emmen</td>
                    <td>Hondsrugweg</td>
                    <td>01-01-2023 - 01-02-2023</td>
                    <td>3, 4, 44</td>
                    <td><i class="dot dot-danger"></i></td>
                    <td><i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i><i class="bi bi-trash me-3" title="Verwijderen"></i></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>GD23-G001</td>
                    <td>Veendam</td>
                    <td>Sorghvlietlaan</td>
                    <td>01-01-2023 - 01-02-2023</td>
                    <td>71, 171, 310</td>
                    <td><i class="dot dot-success"></i></td>
                    <td><i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i><i class="bi bi-trash me-3" title="Verwijderen"></i></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>GD23-S001</td>
                    <td>Groningen</td>
                    <td>Vondellaan</td>
                    <td>01-01-2023 - 01-02-2023</td>
                    <td>9, 19</td>
                    <td><i class="dot dot-warning"></i></td>
                    <td><i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i><i class="bi bi-trash me-3" title="Verwijderen"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>  

</html>