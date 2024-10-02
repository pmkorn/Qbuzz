<?php

  session_start();

  ini_set('display_errors','1');
  ini_set('display_startup_errors','1');
  error_reporting(E_ALL);

  include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">
<head>

  <base href="/">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-icons.css">
  <link rel="stylesheet" href="css/flag-icon.css">
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

    <section class="py-5">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </section>

    <section id="team" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 section__team mb-5">
            <h2 class="section__team-title">Ons team</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">

          <div class="col-md-4 team__item">
            <div class="team__item-image">
              <img src="images/patrick-korn.jpeg" alt="Team member" class="img-fluid">
            </div>
            <div class="team__item-content">
              <h2 class="team__item-content-title">Patrick Korn</h2>
              <h4 class="team__item-content-subtitle">CEO & Founder</h4>
              <div class="team__item-content-social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-pinterest"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-4 team__item">
            <div class="team__item-image">
              <img src="https://placehold.co/1500x1700" alt="Team member" class="img-fluid">
            </div>
            <div class="team__item-content">
              <h2 class="team__item-content-title">John Doe</h2>
              <h4 class="team__item-content-subtitle">Designer</h4>
              <div class="team__item-content-social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-pinterest"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-4 team__item">
            <div class="team__item-image">
              <img src="https://placehold.co/1500x1700" alt="Team member" class="img-fluid">
            </div>
            <div class="team__item-content">
              <h2 class="team__item-content-title">John Doe</h2>
              <h4 class="team__item-content-subtitle">Designer</h4>
              <div class="team__item-content-social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-pinterest"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
        
    <!-- FOOTER -->
    <?php include('include/footer.inc.php'); ?>
    
  </section>

  <?php include('include/modals.php'); ?>
  
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.7.1.js"></script>
  <script src="js/functions.js"></script>

  </body>
</html>