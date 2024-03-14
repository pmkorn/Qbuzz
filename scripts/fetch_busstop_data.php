<?php

  $busStopID = $_POST['busStopID'];

  include('../includes/db.inc.php');

  $sql = "SELECT * FROM busstops WHERE busStopID = '$busStopID' LIMIT 1";
  if ($result = mysqli_query($conn, $sql)){
    while ($row = mysqli_fetch_array($result)) {
      $html .= '<div class="modal-header">';
        $html .= '<h5 class="modal-title">'.$row['busStopName'].'</h5>';
        $html .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
      $html .= '</div>';
      $html .= '<div class="modal-body">';  
        $html .= $row['busStopNumber'];    
      $html .= '</div>';
    }
  }

  echo $html;


?>