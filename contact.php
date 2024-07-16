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
        $employeeMobile = $row['employeeMobile'];
      }
    }   
  }

  $contacts = '';
  $sqlContacts = "SELECT * FROM employees WHERE employeeID NOT IN('$employeeID') ORDER BY employeeFirstName";
  if ($sqlResultContacts = mysqli_query($conn, $sqlContacts)) {
    while ($row = mysqli_fetch_array($sqlResultContacts)) {
      $contacts .= '<div class="col-xl-2 col-sm-6 mb-5">
                      <div class="card">
                        <div class="card-body">
                          <div class="dropdown float-end">
                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bi bi-three-dots-vertical"></i></a>
                               <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Remove</a></div>
                          </div>
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/100x100" alt="" class="rounded-circle img-thumbnail" />
                            <div class="flex-1 ms-3">
                              <h6 class="font-size-16 mb-1">'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</h6>
                              <span class="badge bg-success mb-0">'.$row['employeePosition'].'</span>
                            </div>
                          </div>
                          <div class="mt-3 pt-1">
                            <p class="text-muted mb-0"><i class="bi bi-telephone-fill font-size-15 align-middle pe-2 text-primary"></i>'.$row['employeeMobile'].'</p>
                            <p class="text-muted mb-0 mt-2"><i class="bi bi-envelope-at-fill font-size-15 align-middle pe-2 text-primary"></i>'.$row['employeeEmail'].'</p>
                            <p class="text-muted mb-0 mt-2"><i class="bi bi-geo-alt-fill font-size-15 align-middle pe-2 text-primary"></i>Peizerweg 126, 9727AK Groningen</p>
                          </div>
                          <div class="d-flex gap-2 pt-4">
                            <a class="btn btn-light w-50"><i class="bi bi-person me-1"></i></a>
                            <a class="btn btn-orange w-50"><i class="bi bi-chat-dots-fill me-1"></i></a>
                            <a class="btn btn-orange w-50" href="tel:'.$row['employeeMobile'].'"><i class="bi bi-telephone-fill me-1"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>';
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
  <!--<body oncontextmenu="return false">-->
  <body>

    <?php include('includes/navbar.inc.php'); ?>

    <section class="main-content py-5">

      <div class="container-fluid">   
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Contact</h1>
            <hr class="mb-5">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <?php echo $contacts; ?>
        </div>
      </div>

    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>

</html>