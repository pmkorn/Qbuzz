<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  date_default_timezone_set('Europe/Amsterdam');
  
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
  $sqlSelectObstructionData = "SELECT * FROM obstructions ORDER BY obstructionID DESC";
  if ($sqlResultObstructionData = mysqli_query($conn, $sqlSelectObstructionData)) {
    while ($rowObstruction = mysqli_fetch_array($sqlResultObstructionData)) {
      $vandaag = strtotime(date("Y-m-d H:i"));
      if ($vandaag < strtotime(date($rowObstruction['obstructionStartDate']))) {
        $status = '<span class="badge bg-warning">Aankomend</span>';                        
      } else if ($vandaag >= strtotime(date($rowObstruction['obstructionStartDate'])) && $vandaag <= strtotime(date($rowObstruction['obstructionEndDate']))) {
        $status = '<span class="badge bg-success">Lopend</span>';
      } else {
        $status = '<span class="badge bg-danger">Afgelopen</span>';
      }
      $lines= '';
      $string = explode(',',$rowObstruction['obstructionLines']);
      for($i = 0; $i < sizeof($string); $i++) {
        $lines .= '<span class="badge bg-secondary">'.$string[$i].'</span> ';
      }
      $obstructionOutput .= '
                              <tr>
                                <td><strong>'.$rowObstruction['obstructionNumber'].'</strong></td>
                                <td>'.$rowObstruction['obstructionPlace'].', '.$rowObstruction['obstructionTrajectory'].'</td>
                                <td>Van <strong>'.date('d M Y h:i', strtotime($rowObstruction['obstructionStartDate'])).'</strong> tot <strong>'.date('d M Y H:i', strtotime($rowObstruction['obstructionEndDate'])).'</strong></td>
                                <!--<td>'.str_replace(',', ', ', $rowObstruction['obstructionLines']).'</td>-->
                                <td>'.$lines.'</td>
                                <td class="obstruction-status">'.$status.'</td>
                                <td>
                                  <i class="bi bi-person-fill text-secondary me-3" title="Door: '.$rowObstruction['obstructionMadeBy'].'"></i>
                                  <i class="bi bi-check2-square me-3 obstructionSignOut" data-bs-toggle="modal" data-bs-target="#obstructionSignOut'.$rowObstruction['obstructionID'].'" data-id="'.$rowObstruction['obstructionID'].'" title="Afmelden"></i>
                                  <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="bi bi-pencil-square me-3 edit-obstruction" data-id="'.$rowObstruction['obstructionID'].'" title="Wijzigen"></i></a>
                                  <a href="'.$rowObstruction['obstructionPDF'].'" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a>
                                  <a href="stremming_output.php?obstructionID='.$rowObstruction['obstructionID'].'" target="_blank"><i class="bi bi-file-pdf me-3 pdf" title="Print"></i></a>
                                  <a><i class="bi bi-envelope-at me-3" title="Mailen"></i></a>
                                </td>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css">
    <link rel="stylesheet" href="css/flag-icon.css">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <!-- Modal for making obstruction -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger"></i> InfraGD | Nieuwe invoer stremming</h1>
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
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="obstructionStartDate" class="form-label"><strong>Startdatum en tijd:</strong></label>
                                        <input type="datetime-local" class="form-control" name="obstructionStartDate" id="obstructionStartDate">
                                      </div>
                                    </div>
                                  </div>                       
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="obstructionEndDate" class="form-label"><strong>Einddatum en tijd:</strong></label>
                                        <input type="datetime-local" class="form-control" name="obstructionEndDate" id="obstructionEndDate">
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
                                    <label for="obstructionDocument" class="form-label"><strong>Kaart:</strong></label>
                                    <input type="file" class="form-control" id="obstructionDocument" name="obstructionDocument">
                                  </div>
                                  <div class="mb-3">
                                    <label for="obstructionCommentsExternal" class="form-label"><strong>Opmerking Extern:</strong></label>
                                    <textarea class="form-control" name="obstructionCommentsExternal" id="obstructionCommentsExternal" rows="3"></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label for="obstructionCommentsInternal" class="form-label"><strong>Opmerking Intern:</strong></label>
                                    <textarea class="form-control" name="obstructionCommentsInternal" id="obstructionCommentsInternal" rows="3"></textarea>
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
              <input class="form-control" type="hidden" id="obstructionMadeBy" value="<?php echo $employeeFirstName.' '.$employeeLastName ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for updating obstruction -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger"></i> InfraGD | Wijziging stremming</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Annuleer</button>
            <button  class="btn btn-warning text-white" id="btnResetObstruction"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            <button  class="btn btn-success" id="btnSaveObstruction"><i class="bi bi-floppy"></i> Opslaan</button>
            <div class="mb-3">
              <input class="form-control" type="hidden" id="obstructionYear" value="<?php echo substr(date("Y"),2,2) ?>">
              <input class="form-control" type="hidden" id="obstructionMadeBy" value="<?php echo $employeeFirstName.' '.$employeeLastName ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal for singing of obstruction -->
    <div class="modal fade" id="obstructionSignOut" tabindex="-1" aria-labelledby="obstructionSignOut" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="PDFModalLabel"><i class="bi bi-geo-fill"></i> GD24-Q001 | Emmen, Hondsrugweg</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <embed src="obstructions/facture2424488670.pdf" frameborder="0" width="100%" height="100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Generating PDF -->
    <div class="modal fade" id="PDFModal" tabindex="-1" aria-labelledby="PDFModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="PDFModalLabel"><i class="bi bi-geo-fill"></i> GD24-Q001 | Emmen, Hondsrugweg</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <embed src="obstructions/facture2424488670.pdf" frameborder="0" width="100%" height="100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <?php include('includes/navbar.inc.php'); ?>
    
    <!-- Desktop layout -->
    <section class="main-content py-5 ">

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
            
            <table id="obstructionTable" class="table table-hover table-bordered table-responsive">
              <thead>
                  <tr>
                    <th>Stremmingsnr.</th>
                    <th>Plaats + Traject</th>
                    <th>Periode</th>
                    <th>Lijnen</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>
                <?php echo $obstructionOutput; ?>
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
  <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let table = new DataTable('#obstructionTable',{
      language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
      },
      order: [0, ''],
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, 'All'],
      ]
    });
  </script>
  <script>
    // SHOW BUSSTOP INFO
    $('.obstructionSignOut').on('click', function(){

      let obstructionID = $(this).data('id');
      $.ajax({
        url: 'scripts/update_obstruction_status.php',
        type: 'POST',
        data: {
          obstructionID: obstructionID
        },
        success: function(response) {
          location.reload(true);
        }
      });

    });

  </script>

</html>