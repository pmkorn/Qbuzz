<?php

    $voertuigNummer = $_POST['voertuigNummer'];

    include('../conn/db.inc.php');

    $sql = "SELECT * FROM voertuigen WHERE voertuigNummer = $voertuigNummer";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            echo '
            <p class="mb-3">Voertuig nummer: '.$row['voertuigNummer'].'</p>
            <div class="row">
                <div class="col-md-7">
                    <h3 class="fs-5 mb-3">Voertuig niet inzetbaar</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Datum van:</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Datum tot:</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Opmerking</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 class="fs-5 mb-3">Incidenten</h3>
                </div>
            </div>
            ';
        }
    }

?>