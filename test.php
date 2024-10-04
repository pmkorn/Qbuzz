<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  // Get obstruction information
  include('conn/db.inc.php');
  // $json=array();
  // $sql = "SELECT * FROM obstructions";
  // $stmt = $conn->prepare($sql);
  // $stmt->execute();
  // $result=$stmt->get_result();
  // echo '<pre>';
  // while($row=$result->fetch_assoc()){
  //   array_push($json, $row);
  // }
  // echo json_encode($json);

  $vandaag = strtotime(date("Y-m-d H:i"));
  $nu = date("Y-m-d H:i");
  $out = '';
  $sql = "SELECT * FROM obstructions WHERE obstructionEndDate >= '$nu'";
  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
      // $out .= $nu.'<br>';
      // $out .= $row['obstructionID'].'<br>';
      // $out .= 'Vandaag '.$vandaag.'<br>';
      // $out .= 'Start '.strtotime(date($row['obstructionStartDate'])).'<br>';
      // $out .= 'Eind '.strtotime(date($row['obstructionEndDate'])).'<br>';
      $out .= $row['obstructionID'];

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
  <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.css">
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

  <title>PATRICKKORN | <?php echo $page; ?></title>

</head>
  <body class="bg-blue-touch">

  <div class="result"><?php echo $out; ?></div>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.js"></script>
  <script>
    $(document).ready(function(){

    });
  </script>

  </body>
</html>