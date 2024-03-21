<?php

  $busStopID = $_POST['busStopID'];

  include('../includes/db.inc.php');

  $sql = "SELECT * FROM busstops WHERE busStopID = '$busStopID' LIMIT 1";
  if ($result = mysqli_query($conn, $sql)){
    while ($row = mysqli_fetch_array($result)) {
      $parts = explode(", ", $row['busStopName']);
      $html .= '<div class="modal-header">';
        $html .= '<h5 class="modal-title">Halte: NL:Q:'.$row['busStopNumber'].'</h5>';
        $html .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
      $html .= '</div>';
      $html .= '<div class="modal-body">';
        $html .= '<h4 class="mb-3">'.$row['busStopName'].'</h4>';   
        $html .= '
        <ul class="nav nav-underline nav-fill mb-3" id="pills-tab" role="tablist">
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
            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Melding maken</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <table class="table">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td width="50%"><strong>Naam:</strong></td>
                  <td>'.$parts[1].'</td>
                </tr>
                <tr>
                  <td><strong>Straat:</strong></td>
                  <td></td>
                </tr>
                <tr>
                  <td><strong>Plaats:</strong></td>
                  <td>'.$parts[0].'</td>
                </tr>
                <tr>
                  <td><strong>Modaliteit:</strong></td>
                  <td>Bus</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
          
          </div>
          <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
            <hr class="my-5">
            <p>Geef in onderstaand formulier in een zo duidelijke omschrijving aan wat er aan mankement aan de halte of ABRI is en druk dan op aanmaken om een nieuwe werkorder te creeëren.</p>
            <form>
              <div class="mb-3 row">
                <label for="busStopNumber" class="col-sm-2 col-form-label"><strong>Halte:</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext fw-bold" id="busStopNumber" value="NL:Q:'.$row['busStopNumber'].'" disabled>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><strong>Onderwerp:</strong></label>
                <div class="col-sm-10">
                  <select class="form-select">
                    <option selected>---Selecteer---</option>
                    <option value="ABRI">ABRI</option>
                    <option value="ABRI kast">ABRI kast</option>
                    <option value="Haltebord">Haltebord</option>
                    <option value="Haltepaal">Haltepaal</option>
                    <option value="HVS">HVS</option>
                    <option value="HVS kast">HVS kast</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="workOrderDescription" class="col-sm-2 col-form-label"><strong>Mankement:</strong></label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" id="workOrderDescription" rows="6"></textarea>
                </div>
              </div>
              <button id="addNewWorkOrder" class="btn btn-success float-end">Melding maken</button>
            </form>
          </div>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Halteverwijzingen
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the first items accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. Its also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
        <div class="callout">
          Dit is een <strong>Slecht toegankelijke halte</strong>, minder goed geschikt voor reizigers met een motorische en reizigers met een visuele beperking.
        </div>  
        '; 
      $html .= '</div>';
      $html .= '
        <div class="modal-footer py-4">
        
        </div>
      ';
    }
  }

  echo $html;

?>