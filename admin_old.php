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
  $sqlAllEmployees = "SELECT * FROM employees";
  if ($sqlResultAllEmployees = mysqli_query($conn, $sqlAllEmployees)) {
    while ($row = mysqli_fetch_array($sqlResultAllEmployees)) {
      $employeeTableOutput .= '
                                <tr>
                                  <td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>
                                  <td>'.$row['employeeSignUpDate'].'</td>
                                  <td>'.$row['employeeLastLogin'].'</td>
                                  <td>
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-on-text="active" data-off-text="inactive" checked>
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
            <h1 class="section-title">Dashboard</h1>
            <hr>
          </div>
        </div>

        <div class="row">

          <div class="col-xl-3 col-md-6">
            <div class="region-card card mb-4">
              <div class="card-body">
                <img src="images/nederland-vlag.png" width="50px" alt="Vlag Nederland">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                    <div class="fs-4">Totaal stremmingen</div>
                        <div class="display-2 fw-bold">100<small class="display-5 fw-bold">/100</small></div>
                    </div>
                    <i class="bi bi-signpost-split fs-1"></i>
                  </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small " href="#">Naar overzicht</a>
                  <div class="small"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
              <div class="card-body">
                <img src="images/drenthe-vlag.png" width="50px" alt="Vlag Nederland">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                    <div class="fs-4">Totaal stremmingen</div>
                        <div class="display-2 fw-bold">100<small class="display-5 fw-bold">/100</small></div>
                    </div>
                    <i class="bi bi-signpost-split fs-1"></i>
                  </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small " href="#">Naar overzicht</a>
                  <div class="small"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
              <div class="card-body">
                <img src="images/friesland-vlag.png" width="50px" alt="Vlag Nederland">
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="me-3">
                          <div class="fs-4">Totaal stremmingen</div>
                          <div class="display-2 fw-bold">100<small class="display-5 fw-bold">/100</small></div>
                      </div>
                      <i class="bi bi-signpost-split fs-1"></i>
                  </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small " href="#">Naar overzicht</a>
                  <div class="small"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
              <div class="card-body">
                <img src="images/groningen-vlag.png" width="50px" alt="Vlag Nederland">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                    <div class="fs-4">Totaal stremmingen</div>
                        <div class="display-2 fw-bold">100<small class="display-5 fw-bold">/100</small></div>
                    </div>
                    <i class="bi bi-signpost-split fs-1"></i>
                  </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small " href="#">Naar overzicht</a>
                  <div class="small"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <i class="bi bi-bar-chart"></i> Overzicht stremmingen in %
              </div>
              <div class="card-body">
                <div id="myChart1"></div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <i class="bi bi-bar-chart"></i> Overzicht stremmingen in aantallen
              </div>
              <div class="card-body">
                <div id="myChart2"></div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Naam</th>
                  <th>Account sinds</th>
                  <th>Laatste login</th>
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
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
      ]
    });
  </script>
  <script>
    var options = {
          series: [{
          name: 'Drenthe',
          data: [44, 55, 41, 67, 22, 43, 21, 49]
        }, {
          name: 'Friesland',
          data: [13, 23, 20, 8, 13, 27, 33, 12]
        }, {
          name: 'Groningen',
          data: [11, 17, 15, 15, 21, 14, 15, 13]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          },
          stackType: '100%'
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        xaxis: {
          categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2',
            '2012 Q3', '2012 Q4'
          ],
        },
        fill: {
          opacity: 1
        },
        legend: {
          position: 'right',
          offsetX: 0,
          offsetY: 50
        },
        };

        var chart = new ApexCharts(document.querySelector("#myChart1"), options);
        chart.render();
  </script>
  <script>
    var options = {
          series: [{
          name: 'Drenthe',
          data: [44, 55, 41, 67, 22, 43]
        }, {
          name: 'Friesland',
          data: [13, 23, 20, 8, 13, 27]
        }, {
          name: 'Groningen',
          data: [11, 17, 15, 15, 21, 14]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            horizontal: false,
            borderRadius: 10,
            dataLabels: {
              total: {
                enabled: true,
                style: {
                  fontSize: '13px',
                  fontWeight: 900
                }
              }
            }
          },
        },
        xaxis: {
          type: 'datetime',
          categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
            '01/05/2011 GMT', '01/06/2011 GMT'
          ],
        },
        legend: {
          position: 'right',
          offsetY: 40
        },
        fill: {
          opacity: 1
        }
        };

        var chart = new ApexCharts(document.querySelector("#myChart2"), options);
        chart.render();
    </script>

  <!--<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Okt', 'Nov', 'Dec'],
        datasets: [
          {
          label: 'Drenthe',
          fillColor: 'blue',
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
          fillColor: 'yellow',
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
  </>-->
</html>