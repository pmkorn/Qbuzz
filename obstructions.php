<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  include('includes/db.inc.php');
  
  // Get user information
  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {    
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

  $lineOutput = "";
  $sqlRoutes = "SELECT * FROM routes";
  if ($resultRoutes = mysqli_query($conn, $sqlRoutes)) {
    while ($row = mysqli_fetch_array($resultRoutes)) {
      $lineOutput .= '<div class="col-2">';
        $lineOutput .= '<div class="form-check form-check-inline" title="Lijn '.$row['routeNumber']." ".$row['routeDescription'].'">';
          $lineOutput .= '<input class="form-check-input obstructionLines" type="checkbox" id="'.$row['routeID'].'" name="obstructionLine" value="'.$row['routeNumber'].'">';
          $lineOutput .= '<label class="form-check-label" for="obstructionLine"> '.$row['routeCode'].' </label>';
        $lineOutput .= '</div>';
      $lineOutput .= '</div>';
    }
  }


  // Get obstruction information
  $obstructionOutput = '';
  $sqlSelectObstructionData = "SELECT * FROM obstructions";
  if ($sqlResultObstructionData = mysqli_query($conn, $sqlSelectObstructionData)) {
    while ($rowObstruction = mysqli_fetch_array($sqlResultObstructionData)) {
      $obstructionOutput = '
                              <tr>
                                <td><strong>GD23-D001</strong></td>
                                <td>Emmen</td>
                                <td>Hondsrugweg</td>
                                <td>01-jan-23 / 01-feb-23</td>
                                <td>3, 4, 44</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td><i class="bi bi-three-dots-vertical"></i></td>
                                <td><i class="bi bi-person-fill me-3" title="Door: Patrick Korn"></i> <i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i></td>
                              </tr>
                            ';
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
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger"></i> InfraGD | Nieuwe invoer</h1>
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
                              <option value="Drenthe">Drenthe</option>
                              <option value="Friesland">Friesland</option>
                              <option value="Groningen">Groningen</option>
                              <option value="Stad">Stad</option>
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
                              <option value="Dienstmededeling">Dienstmededeling</option>
                              <option value="Omleiding">Omleiding</option>
                              <option value="Verkeershinder">Verkeershinder</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="obstructionPriority" class="form-label"><strong>Prioriteit:</strong></label>
                            <select id="obstructionPriority" class="form-select">
                              <option selected>Kies...</option>
                              <option value="Normaal">Normaal</option>
                              <option value="Spoed">Spoed</option>
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
                            <div class="card-header">
                                <i class="bi bi-bus-front"></i> Lijnen
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <?php
                                  echo $lineOutput;
                                ?>
                              </div>                      
                              <div class="row my-3">
                                <div class="col-md-12">
                                  <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="selectAllCheckboxesOnAdd">
                                    <label class="form-check-label" for="selectAllCheckboxesOnAdd">
                                      <strong>Selecteer alles</strong>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
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
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d19119.44335951701!2d6.529798593946442!3d53.20116406123705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sOv-haltes!5e0!3m2!1snl!2snl!4v1713261001824!5m2!1snl!2snl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            <button  class="btn btn-warning text-white" id="btnResetObstruction"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            <button  class="btn btn-success" id="btnSaveObstruction"><i class="bi bi-floppy"></i> Opslaan</button>
            <div class="mb-3">
              <input class="form-control" type="hidden" id="obstructionYear" value="<?php echo substr(date("Y"),2,2) ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('includes/navbar.inc.php'); ?>
    
    <!-- Desktop layout -->
    <section class="main-content py-5 d-none d-md-block">

      <div class="container-fluid mb-3">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3">Stremmingen</h1>
            <hr>
          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12 mb-3">
            <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#exampleModal">Invoer stremming</button>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3 mb-md-0">
            
            <table class="table table-striped table-hover table-bordered table-responsive">
              <thead>
                  <tr>
                    <th>Stremmingsnr.</th>
                    <th>Plaats</th>
                    <th>Traject</th>
                    <th>Periode</th>
                    <th>Lijnen</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>GD23-D001</strong></td>
                  <td>Emmen</td>
                  <td>Hondsrugweg</td>
                  <td>01-jan-23 / 01-feb-23</td>
                  <td>3, 4, 44</td>
                  <td><span class="badge bg-warning">Aankomend</span></td>
                  <td><i class="bi bi-three-dots-vertical"></i></td>
                  <td><i class="bi bi-person-fill me-3" title="Door: Patrick Korn"></i> <i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i></td>
                </tr>
                <tr>
                  <td><strong>GD23-D001</strong></td>
                  <td>Emmen</td>
                  <td>Hondsrugweg</td>
                  <td>01-jan-23 / 01-feb-23</td>
                  <td>3, 4, 44</td>
                  <td><span class="badge bg-success">Lopend</span></td>
                  <td><i class="bi bi-three-dots-vertical"></i></td>
                  <td><i class="bi bi-person-fill me-3" title="Door: Patrick Korn"></i> <i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i></td>
                </tr>
                <tr>
                  <td><strong>GD23-D001</strong></td>
                  <td>Emmen</td>
                  <td>Hondsrugweg</td>
                  <td>01-jan-23 / 01-feb-23</td>
                  <td>3, 4, 44</td>
                  <td><span class="badge bg-danger">Afgelopen</span></td>
                  <td><i class="bi bi-three-dots-vertical"></i></td>
                  <td><i class="bi bi-person-fill me-3" title="Door: Patrick Korn"></i> <i class="bi bi-check2-square me-3" data-bs-toggle="modal" data-bs-target="#obstructionSignOut4" data-id="4" title="Afmelden"></i><a href="" data-bs-toggle="modal" data-bs-target="#obstructionEdit"><i class="bi bi-pencil-square me-3" title="Bewerken"></i></a><a href="#" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a><i class="bi bi-envelope-at me-3" title="Mailen"></i></td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>

      </div>

    </section>

    <!-- Mobile layout -->
    <section class="main-content py-5 d-block d-md-none">
      
      <div class="container-fluid mb-3">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3">Stremmingen</h1>
            <hr>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">

          <div class="col-6 col-sm-12 mb-3">
            <div class="card obstruction-card">
              <div class="card-body text-center">
                <h5 class="card-title">Stadskanaal</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Atlantislaan</h6>
                <p class="card-text">GD24-G001</p>
                <i class="bi bi-file-pdf text-danger display-1"></i>
                <div>
                  <span class="badge bg-warning">Aankomend</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-12 mb-3">
            <div class="card obstruction-card">
              <div class="card-body text-center">
                <h5 class="card-title">Stadskanaal</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Atlantislaan</h6>
                <p class="card-text">GD24-G001</p>
                <i class="bi bi-file-pdf text-danger display-1"></i>
                <div>
                  <span class="badge bg-success">Lopend</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-12 mb-3">
            <div class="card obstruction-card">
              <div class="card-body text-center">
                <h5 class="card-title">Stadskanaal</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Atlantislaan</h6>
                <p class="card-text">GD24-G001</p>
                <i class="bi bi-file-pdf text-danger display-1"></i>
                <div>
                  <span class="badge bg-danger">Afgelopen</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>  

</html>