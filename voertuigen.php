<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);
  
  include('conn/db.inc.php');
  if (isset($_SESSION['employeeID'])) {
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

  $voertuigOutput = '';
  $sqlVoertuigen = "SELECT * FROM voertuigen";
  if ($sqlResultVoertuigen = mysqli_query($conn, $sqlVoertuigen)) {
    while ($row = mysqli_fetch_array($sqlResultVoertuigen)) {
        $voertuigOutput .= '<tr>';
            if ($row['voertuigStatus'] == '1') {
                $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="'.$row['voertuigNummer'].'"> 
                                            <span class="dot dot-success"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    </td>';
            } else if ($row['voertuigStatus'] == '2') {
                $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="'.$row['voertuigNummer'].'">
                                            <span class="dot"></span>
                                            <span class="dot dot-warning"></span>
                                            <span class="dot"></span>
                                        </td>
                                    </td>';
            } else if ($row['voertuigStatus'] == '3') {
                $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="'.$row['voertuigNummer'].'">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot dot-danger"></span>
                                        </td>
                                    </td>';
            } else {
                $voertuigOutput .= '<td>
                                        <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="'.$row['voertuigNummer'].'">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>
                                    </td>';
            }
            $voertuigOutput .= '<td>'.$row['voertuigNummer'].'</td>';
            $voertuigOutput .= '<td>'.$row['voertuigMerk'].'</td>';
            $voertuigOutput .= '<td>'.$row['voertuigType'].'</td>';
            $voertuigOutput .= '<td>'.$row['voertuigKenteken'].'</td>';
            $voertuigOutput .= '<td>'.$row['voertuigConsessie'].'</td>';
        $voertuigOutput .= '</tr>';
    }
  }

  include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">
<head>

  <base href="/">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/bootstrap-icons.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/flag-icon.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

  <title>InfraGD | <?php echo $page; ?></title>

</head>
  <body class="bg-blue-touch">

  <header class="fixed-top">
    <?php include('include/navbar.inc.php'); ?>
  </header>

  <main class="main">

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="section-title">Voertuigen</h1>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="voertuigTable" class="table">
                    <thead>
                        <tr>
                            <th>VoertuigStatus</th>
                            <th>VoertuigNummer</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Kenteken</th>
                            <th>Consessie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $voertuigOutput; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>

  </main>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>

  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
  <script>
    $(document).ready(function(){
       //Initialize datatable
       let table = new DataTable("#voertuigTable", {
        language: {
                url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/nl-NL.json',
        },
        responsive: true
       });

    });
  </script>

  </body>
</html>