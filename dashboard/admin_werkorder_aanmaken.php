<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('../include/title.inc.php');
  include('../scripts/user_access.php');
  access('ADMIN');

  include('../conn/db.inc.php');
  
  $busstopListOverview = '';
  $sqlBusstops = "SELECT * FROM busstops";
  if ($resultBusstops = mysqli_query($conn, $sqlBusstops)) {
    while ($row = mysqli_fetch_array($resultBusstops)) {
        $busstopListOverview .= '<option value="'.$row['busStopName'].' '.$row['busStopNumber'].'" data-id="'.$row['busStopID'].'">';
    }
  }

  $categoryList = '';
  $sqlCategory = "SELECT * FROM category WHERE categoryParent = 0";
  if ($resultCategory = mysqli_query($conn, $sqlCategory)) {
    while ($rowCategory = mysqli_fetch_array($resultCategory)) {
        $categoryList .= '<option value="'.$rowCategory['categoryID'].'">'.$rowCategory['categoryName'].'</option>';
    }
  }


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
        <title>Dashboard - <?php echo $page; ?></title>

        <link rel="stylesheet" href="../css/bootstrap.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/bootstrap-icons.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/styles.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/main.css?<?php echo time(); ?>">

    </head>
    <body class="sb-nav-fixed">
    <?php include('include/admin_top_navbar.php'); ?>
        <div id="layoutSidenav">
        <?php include('include/admin_side_navbar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="section-title mt-4">Werkorders - Aanmaken</h1>
                        <hr class="dropdown-divider mb-4">
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="busstopList">Halte</label>
                                    <input type="text" class="form-control" list="busstopListOverview" id="busstopList" placeholder="Type haltenaam of nummer">
                                    <datalist id="busstopListOverview">
                                        <?php echo $busstopListOverview; ?>
                                    </datalist>
                                </div>
                                <div class="mb-3">
                                    <label for="category1" class="form-label">Incident type</label>
                                    <select id="category1" class="form-select">
                                        <option value="">---Selecteer optie---</option>
                                        <?php echo $categoryList; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category2" class="form-label">Incident type</label>
                                    <select id="category2" class="form-select">
                                        <option value="">---Selecteer optie---</option>
                                        
                                    </select>
                                </div>
                                <button id="insertWordkOrder" class="btn btn-yellow">Aanmaken</button>                          
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

        <script src="../js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
        <script src="../js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js?<?php echo time(); ?>"></script>
        <script src="../js/functions.js?<?php echo time(); ?>"></script>
        <script src="../js/scripts.js?<?php echo time(); ?>"></script>
        <script>
            let table = new DataTable('#employeeTable', {
              language: {
                url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/nl-NL.json',
              }
            });
        </script>
        
    </body>
</html>
