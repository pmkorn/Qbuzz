<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {
    include('includes/db.inc.php');
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
  <body oncontextmenu="return false">

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content">
      <div class="container-fluid p-3">   
        <div class="row">
          <div class="col col-md-12 col-xl-8">
            <div class="item-container">
              <h4><strong><i class="bi bi-list-task"></i> Overzicht stremmingen</strong></h4>
              <hr class="py-3">
              <table id="overzichtStremmingen" class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Stremmingsnr</th>
                    <th>Plaats</th>
                    <th>Van - Tot</th>
                    <th>PDF</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                  <tr>
                    <td>GD23-G001</td>
                    <td>Sorghvlietlaan, Veendam</td>
                    <td>01/12/2023 - 09/12/2023</td>
                    <td><i class="bi bi-file-pdf text-danger"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col col-md-12 col-xl-4">
            <div class="item-container">
              <h4><strong><i class="bi bi-info-circle"></i> Informatie</strong></h4>
              <hr class="py-3">
              <div class="callout callout-success">
                <strong><i class="bi bi-info-circle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is toegevoegd!
              </div>
              <div class="callout callout-danger">
                <strong><i class="bi bi-exclamation-triangle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is gewijzigd!
              </div>
              <div class="callout callout-success">
                <strong><i class="bi bi-info-circle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is toegevoegd!
              </div>
              <div class="callout callout-danger">
                <strong><i class="bi bi-exclamation-triangle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is gewijzigd!
              </div>
              <div class="callout callout-success">
                <strong><i class="bi bi-info-circle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is toegevoegd!
              </div>
              <div class="callout callout-danger">
                <strong><i class="bi bi-exclamation-triangle-fill"></i> </strong>Stremming <strong>GD23-G001</strong> te <strong>Sorghvlietlaan, Veendam</strong> is gewijzigd!
              </div>
            </div>
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
    let table = new DataTable('#overzichtStremmingen',{
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