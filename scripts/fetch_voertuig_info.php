<?php

$voertuigNummer = $_POST['voertuigNummer'];

include('../conn/db.inc.php');

$sql = "SELECT * FROM voertuigen WHERE voertuigNummer = $voertuigNummer";
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        if ($row['voertuigStatus'] == 1) {
            $voertuigStatusOutput = '
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">Inzetbaar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">In behandeling</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Niet inzetbaar</label>
                        </div>
                    </div>
                    ';
        } else if ($row['voertuigStatus'] == 2) {
            $voertuigStatusOutput = '
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Inzetbaar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
                            <label class="form-check-label" for="inlineRadio2">In behandeling</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Niet inzetbaar</label>
                        </div>
                    </div>
                    ';
        } else if ($row['voertuigStatus'] == 3) {
            $voertuigStatusOutput = '
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Inzetbaar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">In behandeling</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" checked>
                            <label class="form-check-label" for="inlineRadio3">Niet inzetbaar</label>
                        </div>
                    </div>
                    ';
        } else {
            $voertuigStatusOutput = 'Oeps! Er is iets fout gegaan';
        }
        echo '
            <p class="mb-3"><i class="bi bi-bus-front-fill fs-1"></i> <span class="badge text-bg-dark">' . $row['voertuigNummer'] . '</span></p>
            <div class="row">
                <div class="col-md-7">
                    '.$voertuigStatusOutput.'
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
