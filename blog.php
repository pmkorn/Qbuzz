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

    <!-- BLOG -->
    <section class="blogs py-5 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog__post">
            <?php

              $i = 1;
              while ($i <= 10) {
                echo '
                <div class="blog__post-item mb-5">
                  <div class="blog__post-item-wrapper">
                    <img src="https://placehold.co/1920x1080" alt="Blog Image" class="img-fluid blog__post-item-wrapper-image">
                    <div class="blog__post-item-wrapper-image-overlay">
                      <p class="blog__post-item-wrapper-image-overlay-text">                  
                        <a href="blog/'.$i.'/" class="btn btn-outline-light">Bekijk blog</a>
                      </p>
                    </div>
                  </div>
                  <div class="blog__post-item-content p-3">
                    <div class="blog__post-item-content-meta">
                      <p>
                        <i class="bi bi-person me-1"></i> Patrick Korn
                        <i class="bi bi-bookmark me-1 ms-3"></i> Travel
                        <i class="bi bi-clock me-1 ms-3"></i> 01-jan-2024
                      </p>
                    </div>
                    <h4 class="blog__post-item-content-title">Blog title '.$i.'</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam itaque totam voluptates libero. Earum, quis deserunt? Dolorem nihil voluptatum laborum?</p>
                    <div class="blog__post-item-content-comment">
                      <p>
                        <i class="bi bi-chat"></i> (3) Reactie
                      </p>
                    </div>
                    <div class="blog__post-item-content-footer d-flex">
                      <div class="blog__post-item-content-footer-social me-auto">
                        <a href="" class="blog__post-item-content-footer-social-icon me-3">
                          <i class="bi bi-facebook"></i>
                        </a>
                        <a href="" class="blog__post-item-content-footer-social-icon me-3">
                          <i class="bi bi-instagram"></i>
                        </a>
                        <a href="" class="blog__post-item-content-footer-social-icon me-3">
                          <i class="bi bi-google"></i>
                        </a>
                        <a href="" class="blog__post-item-content-footer-social-icon me-3">
                          <i class="bi bi-pinterest"></i>
                        </a>
                        <a href="" class="blog__post-item-content-footer-social-icon me-3">
                          <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=+31624969445&text=https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'/'.$i.'" class="blog__post-item-content-footer-social-icon">
                          <i class="bi bi-whatsapp"></i>
                        </a>
                      </div>
                      <div class="blog__post-item-content-footer-rating ms-auto">
                        <i class="bi bi-hand-thumbs-up blog__post-item-content-footer-rating-icon"></i> <span>10</span>
                        <i class="bi bi-hand-thumbs-down blog__post-item-content-footer-rating-icon"></i> <span>4</span>
                      </div>
                    </div>
                  </div>
                </div>
                ';
                $i++;
              }

            ?>
            
          </div>
          <div class="col-md-4 blog__posts-widgets">
            <div class="blog__posts-widgets-container">
              <h5 class="blog__posts-widgets-container-title">Zoeken</h5>
            </div>
            <div class="blog__posts-widgets-container">
              <h5 class="blog__posts-widgets-container-title">Categorie</h5>
            </div>
            <div class="blog__posts-widgets-container">
              <h5 class="blog__posts-widgets-container-title">Recente Posts</h5>
            </div>
            <div class="blog__posts-widgets-container">
              <h5 class="blog__posts-widgets-container-title">Tags</h5>
            </div>
          </div>
        </div>
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