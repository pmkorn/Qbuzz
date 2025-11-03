<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include('conn/db.inc.php');
if (isset($_SESSION['employeeID'])) {
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

include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">

<head>

    <base href="/">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/flag-icon.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <title>Qbuzz | <?php echo $page_title; ?></title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">

        <!-- page title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-title"> <?php echo $page_title; ?> </h1>
                </div>
            </div>
        </div>

        <!-- table output -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-success mb-3 me-3" data-bs-toggle="modal" data-bs-target="#modalDataInsert">Data uploaden</button>
                    <button class="btn btn-sm btn-success mb-3 me-3" data-bs-toggle="modal" data-bs-target="#modalDataAdd">Toevoegen data</button>
                    <button class="btn btn-sm btn-danger mb-3 float-end">Tabel legen</button>
                    <button class="btn btn-sm btn-primary mb-3 me-3 float-end">Export to Excel</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Zoek op dienst, omloop, beginplaats, eindplaats..." aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-sm table-bordered table-hover">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Dienst</th>
                                <th>Omloop</th>
                                <th>Begintijd</th>
                                <th>Beginplaats</th>
                                <th>Eindplaats</th>
                                <th>Eindtijd</th>
                                <th>Opmerking</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1;
                            $rows = 10;

                            while ($i <= $rows) {
                                echo '
                                        <tr>
                                            <td>' . $i . '</td>
                                            <td>' . $i . '</td>
                                            <td>6:32</td>
                                            <td>Leeuwarden</td>
                                            <td>Heerenveen</td>
                                            <td>7:56</td>
                                            <td>Bus voor dienst D' . $i . '</td>
                                            <td>
                                                <i class="bi bi-check text-success mx-1 shift-success" data-shift=' . $i . '></i>
                                                <i class="bi bi-x text-danger mx-1 shift-error"></i>
                                            </td>
                                        </tr>
                                    ';
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <p>Pagina <strong>1</strong> van <strong>5</strong></p>
                </div>
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="First">
                                    <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Last">
                                    <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal for loading data -->
    <div class="modal fade" id="modalDataInsert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Inladen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Upload hieronder uw bestand waarvan u de data wilt zien. <br>Let op, het bestand moet van het formaat <code>'*.csv' of '*.xlsx'</code> zijn.</p>
                    <div class="mb-3">
                        <!-- <label for="formFile" class="form-label">Zoek het:</label> -->
                        <!-- <input class="form-control" type="file" accept=".csv" id="formFile" class="formFile"> -->
                        <input class="form-control" type="file" id="formFile" class="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Annuleren</button>
                    <button type="button" class="btn btn-sm btn-success">Laden</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding data -->
    <div class="modal fade" id="modalDataAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel"><i class="bi bi-list-task me-3"></i>Data Toevoegen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="piecesToCoverAdd">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shiftPersonOff" class="form-label"><strong>Wie komt eraf:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftPersonOff" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="shiftPersonOffNumber" class="form-label"><strong>Pers. Nr:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftPrsonOffNumber" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="shiftNumberOff" class="form-label"><strong>Dienstnummer:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftNumberOff" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="startTime" class="form-label"><strong>Starttijd:</strong></label>
                                        <input type="time" class="form-control form-control-sm" id="startTime" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="startPlace" class="form-label"><strong>Startplaats:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="startPlace" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="circulationNumber" class="form-label"><strong>Omloop:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="circulationNumber" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shiftPersonOn" class="form-label"><strong>Wie komt erop:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftPersonON" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="shiftPersonONNumber" class="form-label"><strong>Pers. Nr.:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftPrsonOnNumber" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="shiftNumberOnn" class="form-label"><strong>Dienstnummer:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="shiftNumberOnn" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="endTime" class="form-label"><strong>Eindtijd:</strong></label>
                                        <input type="time" class="form-control form-control-sm" id="endTime" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="endPlace" class="form-label"><strong>Eindplaats:</strong></label>
                                        <input type="text" class="form-control form-control-sm" id="endPlace" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Opmerking:</strong></label>
                                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Annuleren</button>
                    <button type="button" class="btn btn-sm btn-success">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/modals.php'); ?>

    <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
    <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.shift-success').on('click', function() {
                let shiftID = $(this).attr("data-shift");
                console.log(shiftID);
                //alert('ok');
            });
        });
    </script>

</body>

</html>