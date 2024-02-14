<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include('includes/db.inc.php');

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

  include('includes/headertitle.inc.php');

  $tableBusstopOutput = '';
  $sqlBusStops = 'SELECT * FROM busstops';
  if ($sqlResultBusStops = mysqli_query($conn, $sqlBusStops)) {
    while ($rowBusStop = mysqli_fetch_array($sqlResultBusStops)) {
      $tableBusstopOutput .= '<tr>
                                <td><img src="images/haltebord.png" width="25px" /></td>
                                <td>'.$rowBusStop['busStopName'].'</td>
                                <td>'.$rowBusStop['busStopNumber'].'</td>
                                <td><i class="busstopid btn btn-link bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#newWorkOrder'.$rowBusStop['busStopID'].'" data-id="newWorkOrder'.$rowBusStop['busStopID'].'"></i>&nbsp;&nbsp;&nbsp;<i class="bi bi-info-circle"></i>
                        
                                  <div class="modal fade" id="newWorkOrder'.$rowBusStop['busStopID'].'" tabindex="-1" aria-labelledby="newWorkOrder'.$rowBusStop['busStopID'].'" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <div>
                                          <h3 class="modal-title fw-light fs-5 w-100">'.$rowBusStop['busStopNumber'].'</h3>
                                            <h2 class="modal-title fs-4 w-100" id="exampleModalLabel">'.$rowBusStop['busStopName'].'</h2>
                                          </div>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form id="inputNewWorkOrderForm'.$rowBusStop['busStopID'].'" action="">
                                            <ul class="nav nav-underline nav-fill modal-dialog-scrollable mb-3" id="pills-tab" role="tablist">
                                              <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Algemeen</button>
                                              </li>
                                              <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Toegankelijkheid</button>
                                              </li>
                                              <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Voorzieningen</button>
                                              </li>
                                              <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false"><i class="bi bi-bell-fill text-danger"></i> Melding maken</button>
                                              </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0"></div>
                                              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                                <div class="container text-center">
                                                  
                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-01 perronbreedte.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-02 barrierevrije doorgang.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-03 toegankelijk vanuit omgeving.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-04 perronhoogte.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-05 hoogteverschil perron omgeving.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-06 breedte aanlooproute.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-07 aanwezigheid geleidelijn.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-08 geleidelijn over volle lengte.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-09 aansluiting geleidelijn op omgeving.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-10 instapmarkering aanwezig.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                              </div>
                                              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                              
                                                <div class="container text-center">
                                                    
                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-11 abri.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-12 zitgelegenheden.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-13 stasteun.jpg" alt="" class="img-fluid flex">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-14 verlichting.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-15 afvalbak.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-16 fietsvoorziening.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="row mb-3">
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-17 haltevertrekstaat.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div class="busstop-icon-frame justify-content-between align-content-center p-3">
                                                        <img src="images/pictogram-17 haltevertrekstaat.jpg" alt="" class="img-fluid">
                                                        <small>Ja/Nee</small>
                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                              
                                              </div>
                                              <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                                                <p class="mb-3">Geef hieronder aan in welke categorie de werkorder moet komen en omschrijf zo duidelijk mogelijk het menkement wat er aan de hand is.</p>
                                                <div class="mb-3">
                                                  <label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Omschrijving mankement</strong></label>
                                                  <textarea class="form-control" name="inputNewWorkOrderNotification" id="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'"><strong>Omschrijving mankement</strong></label>
                                                  <textarea class="form-control" name="inputNewWorkOrderNotification" id="inputNewWorkOrderNotification'.$rowBusStop['busStopID'].'" cols="30" rows="10"></textarea>
                                                </div>
                                              </div>
                                            </div>
                                            <input type="hidden" id="busStopIDWorkNumber" value="'.$rowBusStop['busStopID'].'" />
                                            <input type="hidden" id="workOrderInsertedBy" value="'.$employeeFirstName." ".$employeeLastName.'">
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuleren&nbsp;<i class="bi bi-bi-x-circle"></i></button>
                                          <button type="button" class="btn btn-success btnSaveWorkOrder" id="btnSaveWorkOrder'.$rowBusStop['busStopID'].'" value="'.$rowBusStop['busStopID'].'">Opslaan&nbsp;<i class="bi bi-check"></i></button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </td>
                              </tr>';
    }
  }

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
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title mb-3">Halteoverzicht</h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table id="busStopTable" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Haltenaam:</th>
                  <th>Haltenummer:</th>
                  <th>Actie</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $tableBusstopOutput; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </section>    

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let table = new DataTable('#busStopTable',{
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/nl-NL.json',
      },
      order: [1, 'asc'],
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
      ],
    });
  </script>

</html>