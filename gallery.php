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

  $galleryOutput = '';
  $sql = "SELECT DISTINCT galleryAlbum, galleryImageCountryCode, galleryImageYear FROM gallery";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) < 1) {
    $galleryOutput = "Er zijn nog geen album om te laten zien.";
  } else {
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $galleryAlbum = $row['galleryAlbum'];
      $galleryImageCountryCode = $row['galleryImageCountryCode'];
      $galleryImageYear =$row['galleryImageYear'];
      $countQuery = mysqli_query($conn, "SELECT COUNT(galleryID) FROM gallery WHERE galleryAlbum = '$galleryAlbum'");
      $countRow = mysqli_fetch_row($countQuery);
      $count = $countRow[0];
      $galleryOutput .= '<div class="col-md-4 gallery__album mb-3">';
        $galleryOutput .= '<div class="gallery__album-item">';
          $galleryOutput .= '<div class="gallery__album-item-wrapper">';
            $galleryOutput .= '<img src="https://placehold.co/1920x1080" class="img-fluid gallery__album-item-wrapper-image">';
            $galleryOutput .= '<div class="gallery__album-item-wrapper-image-overlay">';
              $galleryOutput .= '<p class="gallery__album-item-wrapper-image-overlay-text">';
                $galleryOutput .= '<a href="album/'.strtolower($galleryAlbum).'/" class="btn btn-outline-light">Bekijk album</a>';
              $galleryOutput .= '</p>';
            $galleryOutput .= '</div>';
          $galleryOutput .= '</div>';
          $galleryOutput .= '<div class="gallery__album-item-content p-3">';
            $galleryOutput .= '<div class="gallery__album-item-content-meta mb-3">';
              $galleryOutput .= '<i class="bi bi-calendar3 me-2"></i>'.date("Y", strtotime($galleryImageYear));
            $galleryOutput .= '</div>';
            $galleryOutput .= '<h4 class="gallery__album-item-content-title"><i class="flag-icon flag-icon-'.$galleryImageCountryCode.' flag-icon-squared rounded-circle"></i> '.$galleryAlbum.'</h4>';
          $galleryOutput .= '</div>';
        $galleryOutput .= '</div>';
      $galleryOutput .= '</div>';
    }
  }

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

    <!-- GALLERY -->
    <section class="galleries py-5">
      <div class="container">
        <div class="row">
          <?php echo $galleryOutput; ?>
          <!-- <button class="btn btn-primary btn-print" type="print" onclick="window.print()"><i class="bi bi-printer mx-5"></i></button> -->
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