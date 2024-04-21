<?php

  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include('includes/db.inc.php');

  if (!isset($_SESSION['employeeID'])) {
    header('Location: account/login/'); 
  } else {
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

  //Get all users info for table output
  $employeeID = $_SESSION['employeeID'];
  $sqlAllEmployees = "SELECT * FROM employees WHERE employeeID NOT IN ('".$employeeID."')";
  if ($sqlResultAllEmployees = mysqli_query($conn, $sqlAllEmployees)) {
    while ($row = mysqli_fetch_array($sqlResultAllEmployees)) {
      $employeeTableOutput .= '
                                <tr>
                                  <td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>
                                  <td>'.$row['employeeSignUpDate'].'</td>
                                  <td>'.$row['employeeLastLogin'].'</td>
                                  <td><span class="badge bg-primary">'.$row['employeeRole'].'</span></td>
                                  <td>
                                    <div class="form-check form-switch user-status-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-id="'.$row['employeeID'].'" data-on-text="active" data-off-text="inactive" checked>
                                      <label class="form-check-label" for="flexSwitchCheckChecked"><span class="badge bg-success">Active</span></label>
                                    </div>                                  
                                  </td>
                                </tr>
                              ';
    }
  }

  include('includes/headertitle.inc.php');
  include('includes/access.php');
  access('ADMIN');

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
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

    <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  </head>
  <!--<body oncontextmenu="return false">-->
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content">

      <div class="container-fluid">   
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Gebruikers</h1>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table id="employeeTable" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Naam</th>
                  <th>Account sinds</th>
                  <th>Laatste login</th>
                  <th>Accounttype</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $employeeTableOutput; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
  <script src="js/functions.js"></script>
  <script>
    let table = new DataTable('#employeeTable',{
      language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
      },
      order: [0, 'asc'],
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, 'All'],
      ]
    });
  </script>
</html>