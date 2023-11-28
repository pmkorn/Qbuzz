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
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <div class="container-fluid p-3">   
      <div class="row">
        <div class="col-md-6">
          <div class="item-container">
            <h4><i class="bi bi-list-task"></i> Overzicht stremmingen</h4>
            <hr>
            <table class="table table-striped table-bordered table-hover">
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
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
                <tr>
                  <td>GD23-G001</td>
                  <td>Sorgvlietlaan, Veendam</td>
                  <td>01/12/2023 - 09/12/2023</td>
                  <td><i class="bi bi-file-pdf text-danger"></i></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>

</html>