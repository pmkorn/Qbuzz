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

    <!-- CONTACT FORM -->
     <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="https://placehold.co/1920x1080" alt="Maps" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h5>Contact informatie</h5>
            <p>Voor vragen vul het onderstaande formulier in en wij zullen zo spoedig mogelijk contact met u opnemen.</p>
            <form id="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Naam">
                    <label for="name">Naam</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="massage" style="height: 150px"></textarea>
                    <label for="massage">Bericht</label>
                  </div>
                </div>
              </div>
            </form>
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