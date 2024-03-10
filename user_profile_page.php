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

  <div class="row mb-3">

    <div class="col-md-12">          
      <h1><i class="bi bi-person-circle"></i> Account</h1>
      <hr>
    </div>

  </div>

  <div class="row mb-3">
    <div class="col-md-3">

      <img class="img-thumbnail rounded-circle mb-3" src="https://via.placeholder.com/800x800" width="150px" alt="Profile pic" title="Profile pic">
      <ul class="list-group">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
        <li class="list-group-item">
          <a class="btn btn-link" href="account/logout/">Uitloggen</a>
        </li>
      </ul>

    </div>
  </div>

  <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="https://placehold.co/20x20" class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

  

</div>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="js/functions.js"></script>
  <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
      })
    }
  </script>

</html>