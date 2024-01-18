<main>
<div class="container-fluid px-4 py-4">

  <div class="row">
    <div class="col-md-12">
      <h1 class="mt-4"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Invoer stremming</h1>
      <hr class="mb-3">
    </div>
  </div>

  <form id="insertObstructionForm">

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

          <div class="col-md-12">
            <div class="mb-3">
              <label for="obstructionLines" class="form-label"><strong>Lijnen:</strong></label>
              </div>  
              
              <?php

                include('includes/db.inc.php');

                $lineOutput = "";
                $sqlRoutes = "SELECT * FROM routes";
                if ($resultRoutes = mysqli_query($conn, $sqlRoutes)) {
                  while ($row = mysqli_fetch_array($resultRoutes)) {
                    $lineOutput .= '<div class="form-check form-check-inline" title="Lijn '.$row['routeNumber']." ".$row['routeDescription'].'">';
                      $lineOutput .= '<input class="form-check-input obstructionLines" type="checkbox" id="'.$row['routeID'].'" name="obstructionLine" value="'.$row['routeNumber'].'">';
                      $lineOutput .= '<label class="form-check-label" for="obstructionLine"> '.$row['routeCode'].' </label>';
                    $lineOutput .= '</div>';
                  }
                }
                
                echo $lineOutput;

              ?>

              <div class="form-check mb-3">
                <input id="selectAllCheckboxesOnAdd" class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="selectAllCheckboxesOnAdd"><strong>Selecteer alles:</strong></label>
              </div>
            
          </div>
          
        </div>

      </div>

      <div class="col-md-6">

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

        <div class="mb-3">
          <label for="obstructionRoute" class="form-label"><strong>Te rijden route:</strong></label>
          <textarea name="obstructionRoute" id="obstructionRoute" cols="30" rows="10" class="form-control"></textarea>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <hr class="mb-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <h6>Haltes:</h6>
      </div>
      <div class="col-md-4">
        <h6>Vervallen haltes:</h6>
      </div>
      <div class="col-md-4">
        <h6>Tijdelijke haltes:</h6>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <textarea class="form-control" name="" id="" cols="30" rows="15"></textarea>
      </div>
      <div class="col-md-4">
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
        <div class="input-group mb-3">
          <button id="" class="btn btn-orange bi bi-chevron-double-right"></button>
          <input type="text" class="form-control" id="obstructionExpiredStop1" placeholder="">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <hr class="mb-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="mb-3">
          <label for="obstructionMap" class="form-label"><strong>Kaart:</strong></label>
          <!--<input type="file" class="form-control" id="obstructionMap" name="obstructionMap">-->
          <!--<iframe width="100%" height="600" src="https://www.openstreetmap.org/export/embed.html?bbox=6.162385940551759%2C53.05741392736408%2C6.305723190307618%2C53.10196073552362&amp;layer=opnvkarte" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=14/53.0797/6.2341&amp;layers=O">Grotere kaart weergeven</a></small>-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26270.078395826848!2d5.783051298791366!3d53.19977660179044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1snl!2snl!4v1701449586143!5m2!1snl!2snl" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>      
    </div>

    <div class="row">
      <div class="col-md-12">
        <hr class="mb-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-end">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Annuleer</button>
        <button  class="btn btn-warning text-white" id="btnResetObstruction"><i class="bi bi-arrow-clockwise"></i> Reset</button>
        <button  class="btn btn-success" id="btnSaveObstruction"><i class="bi bi-floppy"></i> Opslaan</button>
      </div>
    </div>

  </form>
  
</div>
</main>