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
  $employeeTableOutput = '';
  $sqlAllEmployees = "SELECT * FROM employees WHERE employeeID NOT IN ('".$employeeID."')";
  if ($sqlResultAllEmployees = mysqli_query($conn, $sqlAllEmployees)) {
    while ($row = mysqli_fetch_array($sqlResultAllEmployees)) {      
      if ($row['employeeIsActive'] == 0) {
        $switchbox = '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-status="'.$row['employeeIsActive'].'">';
      } else {
        $switchbox = '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" data-status="'.$row['employeeIsActive'].'" checked>';
      }
      $employeeTableOutput .= '
                                <tr class="align-middle">
                                  <td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>
                                  <td>'.$row['employeeSignUpDate'].'</td>
                                  <td>'.$row['employeeLastLogin'].'</td>
                                  <td><span class="badge bg-primary">'.$row['employeeRole'].'</span></td>
                                  <td>
                                    <span class="badge bg-primary">'.$row['employeePermissions'].'</span>
                                  </td>
                                  <td>
                                    <button class="btn btn-sm btn-orange me-2 edit-employee" data-id="'.$row['employeeID'].'"><i class="bi bi-info-circle"></i> Meer info...</button>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch user-status-switch" id="employee-'.$row['employeeID'].'">
                                      '.$switchbox.'
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
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/">
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <link rel="shortcut icon" href="images/favicon_qbuzz.ico" type="image/x-icon">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/bootstrap-icons.css">
      <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">

      <title>Qbuzz InfraGD | <?php echo $page; ?></title>
  
  </head>
  <body>
    <?php include('includes/navbar.inc.php'); ?>

    <!-- MODAL FOR DISPLAYING EMPLOYEE DETAILS -->
    <div class="modal fade" id="employeeDetails" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
          <!-- -->
        </div>
      </div>
    </div>
    <!-- END MODAL FOR DISPLAYING EMPLOYEE DETAILS -->

    <section class="main-content py-5">
      
      <div class="container-fluid">   
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Overzicht gebruikers</h1>
            <hr>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table id="employeeTable" class="table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                  <th>Naam</th>
                  <th>Account sinds</th>
                  <th>Laatste login</th>
                  <th>Accounttype</th>
                  <th>Permissions</th>
                  <th>Action</th>
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

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/popover.js"></script>    
    <script src="js/jquery-3.7.2.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
    <script>
      const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
      const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
    <script>
      let employeeTable = new DataTable('#employeeTable',{
        language: {
          url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/nl-NL.json',
        },
        order: [0, 'asc'],
        lengthMenu: [
          [10, 25, 50, -1],
          [10, 25, 50, 'All'],
        ],
      });
    </script>
  </body>
</html>
