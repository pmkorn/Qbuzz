<?php

  $obstructionID = $_POST['obstructionID'];

  include('../includes/db.inc.php');

  $sql = "SELECT * FROM obstructions WHERE obstructionID = '$obstructionID'";

  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
      ?>

        <div class="container-fluid">
          <div class="row">
            <form action="" id="updateObstructionForm">
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
                        <input type="text" class="form-control" id="obstructionPlace" value="<?php echo $row['obstructionPlace'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="obstructionTrajectory" class="form-label"><strong>Traject:</strong></label>
                        <input type="text" class="form-control" id="obstructionTrajectory" value="<?php echo $row['obstructionTrajectory'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="obstructionReason" class="form-label"><strong>Reden:</strong></label>
                        <input type="text" class="form-control" id="obstructionReason"  value="<?php echo $row['obstructionReason'] ?>">
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
                                    <input type="datetime-local" class="form-control" name="obstructionStartDate" id="obstructionStartDate" value="<?php echo $row['obstructionStartDate'] ?>">
                                  </div>
                                </div>
                              </div>                       
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <label for="obstructionEndDate" class="form-label"><strong>Einddatum en tijd:</strong></label>
                                    <input type="datetime-local" class="form-control" name="obstructionEndDate" id="obstructionEndDate" value="<?php echo $row['obstructionEndDate'] ?>">
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
                                <textarea class="form-control" name="obstructionRoute" id="obstructionRoute" rows="10"><?php echo $row['obstructionRoute'] ?></textarea>
                              </div>
                            </div>
                            <div class="div col-md-4">
                              <div class="mb-3">
                                <label for="obstructionDocument" class="form-label"><strong>Kaart:</strong></label>
                                <input type="file" class="form-control" id="obstructionDocument" name="obstructionDocument" value="<?php echo $row['obstructionDocument'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="obstructionCommentsExternal" class="form-label"><strong>Opmerking Extern:</strong></label>
                                <textarea class="form-control" name="obstructionCommentsExternal" id="obstructionCommentsExternal" rows="3"><?php echo $row['obstructionCommentsExternal'] ?></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="obstructionCommentsInternal" class="form-label"><strong>Opmerking Intern:</strong></label>
                                <textarea class="form-control" name="obstructionCommentsInternal" id="obstructionCommentsInternal" rows="3"><?php echo $row['obstructionCommentsInternal'] ?></textarea>
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

      <?php
    }
  }

?>