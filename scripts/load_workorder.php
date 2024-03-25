<?php

  include('includes/db.inc.php');

  $workorderID = $_POST['workorderID'];

  // $sql = 'SELECT
  //           *
  //         FROM workorders
  //         JOIN busstops
  //           ON busstops.busstopID = wordorders.busstopID
  //         JOIN employees
  //           on employees.employeeID = workorder.workorderCreatedBy';

  $sql = "SELECT * FROM workorders WHERE workorderID = '$workorderID' LIMIT 1";

  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
      $workrderOutput = '
                        <div id="workOrder">

                          <div class="card">
                            <div class="card-header">
                              Incident 20240101-1
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-2">
                                  <b>Melder</b>
                                </div>
                                <div class="col-sm-4">
                                  Patrick Korn
                                </div>
                                <div class="col-sm-2">
                                  <b>Tijdstip</b>
                                </div>
                                <div class="col-sm-4">
                                  01-01-2024 07:30:24
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-2">
                                  <b>Regio</b>
                                </div>
                                <div class="col-sm-4">
                                  Groningen-Drenthe
                                </div>
                              </div>
                              <div class="row">
                                <hr>
                              </div>
                              <div class="row">
                                <h3><span class="bi bi-h-square text-danger"></span> Halte</h3>
                              </div>
                              <div class="row">
                                <div class="col-sm-2">
                                  <b>Beschrijving</b>
                                </div>
                                <div class="col-sm-4">
                                  Halte bord zit verbogen in het frame
                                </div>
                              </div>
                              <div class="row">
                                <hr>
                              </div>
                              <div class="row">
                                <div class="col-sm-2">
                                  <b>Werkzaamheden</b>
                                </div>
                                <div class="col-sm-10">
                                  <textarea name="" id="" class="form-control" cols="50" rows="10"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="row">
                                <div class="col-md-12">
                                  <button id="btnCompleteWorkorder" class="btn btn-success float-end">Afmelden</button>
                                </div>                  
                              </div>
                            </div>
                          </div>

                        </div>
      ';
    }
  }

  echo $workrderOutput;

?>