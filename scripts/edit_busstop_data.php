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
          
            <div class="container">
              <div class="mb-3 row">
                <label for="busStopNumber" class="col-sm-2 col-form-label"><strong>Haltenummer:</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="updateBusStopNumber" value="'.$row['busStopNumber'].'">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="busStopNumber" class="col-sm-2 col-form-label"><strong>Haltenaam:</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="updateBusStopName" value="'.$row['busStopName'].'">
                </div>
              </div>
              <input type="hidden" id="updateBusStopID" value="'.$row['busStopID'].'">
              <button id="saveEditBusstopData" class="btn btn-success float-end">Opslaan <i class="bi bi-floppy"></i></button>
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