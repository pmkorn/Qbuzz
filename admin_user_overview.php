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
if (isset($_SESSION['employeeID'])) {
  $id = $_SESSION['employeeID'];
}
$sqlAllEmployees = "SELECT * FROM employees WHERE employeeID NOT IN('".$id."')";
if ($sqlResultAllEmployees = mysqli_query($conn, $sqlAllEmployees)) {
    $employeeTableOutput .= '
                            <table class="table table-bordered table-hover table-striped">
                              <thead>
                                <tr>
                                  <th>Naam</th>
                                  <th>Sinds</th>
                                  <th>Laatste login</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                            ';
  while ($row = mysqli_fetch_array($sqlResultAllEmployees)) {
    $employeeTableOutput .= '
                                <tr>
                                  <td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>
                                  <td>'.$row['employeeSignUpDate'].'</td>
                                  <td>'.$row['employeeLastLogin'].'</td>
                                  <td>
                                    <div class="form-check form-switch user-status-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked'.$row['employeeID'].'" data-id="'.$row['employeeID'].'" checked>
                                      <label class="form-check-label" for="flexSwitchCheckChecked'.$row['employeeID'].'"><span class="badge bg-success">Active</span></label>
                                    </div>                                  
                                  </td>
                                </tr>                            
                            ';
  }
    $employeeTableOutput .= '
                              </tbody>
                            </table>
                          ';
}

include('includes/headertitle.inc.php');
include('includes/access.php');
access('ADMIN');

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <base href="/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Qbuzz InfraGD | <?php echo $page; ?></title>
        <link rel="shortcut icon" href="images/favicon_qbuzz.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css?q=<?php echo time(); ?>">
        <link rel="stylesheet" href="css/admin.css?q=<?php echo time(); ?>"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><img src="../images/qbuzz-logo.png" width="100px" alt="Qbuzz logo"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/account/logout/">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <?php include('includes/admin.navbar.inc.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <h1 class="section-title mb-3">Gebruikers</h1>
                        <hr>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <?php echo $employeeTableOutput; ?>
                      </div>
                    </div>
                  </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.js" ></script>
        <script src="js/jquery-3.7.2.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/scripts.js"></script>
        
        
    </body>
</html>
