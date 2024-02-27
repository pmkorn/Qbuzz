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

    <section class="main-content py-5">
      <div class="container-fluid">   
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Dashboard</h1>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </section>

  </body>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.2.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Okt', 'Nov', 'Dec'],
        datasets: [
          {
          label: 'Drenthe',
          FillColor: 'blue',
          data: [8, 14, 10, 9, 5, 12, 6, 16, 8, 10, 12, 8],
          borderWidth: 3
          },
          {
          label: 'Friesland',
          fillColor: "red",
          data: [12, 19, 3, 5, 2, 3, 8, 14, 9, 11, 12, 15],
          borderWidth: 3
        },
        {
          label: 'Groningen',
          FillColor: 'yellow',
          data: [14, 11, 9, 10, 11, 15, 7, 3, 11, 8, 13, 8],
          borderWidth: 3
        }

      ]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Overzicht stremmingen per regio',
            font: {
              size: '16'
            }

          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</html>