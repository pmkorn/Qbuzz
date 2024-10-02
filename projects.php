<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('conn/db.inc.php');
  if (isset($_SESSION['memberID'])) {
    $memberID = $_SESSION['memberID'];
    $sqlSelectmemberData = "SELECT * FROM members WHERE memberID = '$memberID' LIMIT 1";
    if ($sqlResultSelectmemberData = mysqli_query($conn, $sqlSelectmemberData)) {
      while ($row = mysqli_fetch_array($sqlResultSelectmemberData)) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $userRole = $row['userRole'];
      }
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
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

  <title>PATRICKKORN | <?php echo $page; ?></title>

</head>
  <body>

  <header class="fixed-top">
    <?php include('include/top-bar.inc.php'); ?>
    <?php include('include/navbar.inc.php'); ?>
  </header>

  <section class="main">

    <!-- HERO -->
    <?php include('include/hero.inc.php'); ?>

    <!-- PROJECTS -->
     <section class="projects py-5">
        <div class="container">

          <?php

            $i = 1;
            while ($i <= 3) {
              echo '
              <div class="row project__home mb-5">
                <div class="col-md-7 project__home-image">
                  <img src="https://placehold.co/1920x1080" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 project__home-info">
                  <div class="project__home-info-box">
                    slfvn dlkvdfn l
                  </div>
                </div>
              </div>
              ';
              $i++;
            }
          ?>         
          
        </div>
     </section>
  
        
    <!-- FOOTER -->
    <?php include('include/footer.inc.php'); ?>
    
  </section>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
  <script src="js/functions.js?<?php echo time(); ?>"></script>

  </body>
</html>