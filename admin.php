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


  include('includes/headertitle.inc.php');
  include('includes/access.php');
  access('ADMIN');
  return true;

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
        <link href="css/style_admin.css" rel="stylesheet" />

        <title>Qbuzz InfraGD | <?php echo $page; ?></title>
    
    </head>
    <body class="sb-nav-fixed">
        <?php include('includes/admin.navbar.top.inc.php'); ?>
        <div id="layoutSidenav">
            <?php include('includes/admin.navbar.side.inc.php'); ?>
            <div id="layoutSidenav_content">
                <main class="py-5">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="section-title">Dashboard</h1>
                                <hr>
                            </div>
                        </div>                   
                        
                    </div>
                </main>
            </div>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/jquery-3.7.2.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/scripts.js"></script>
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
