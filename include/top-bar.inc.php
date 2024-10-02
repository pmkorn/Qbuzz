<div class="top-bar py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
          <p class="m-0">
            <span class="flag-icon flag-icon-squared flag-icon-nl rounded-circle"></span> NL
          </p>
          <p class="m-0 top-bar-icons">
            <?php 
              if (isset($_SESSION['memberID'])) {
                echo '<a href="uitloggen/" class="me-3"><i class="bi bi-unlock"></i> uitloggen</a>';
              } else {
                echo '<a href="" class="me-3" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-person"></i> Inloggen</a>
                      <a href="" data-bs-toggle="modal" data-bs-target="#modalRegister"><i class="bi bi-lock"></i> Registreren</a>';
              }
            ?>
            
            <!-- <a href="mailto:info@patrickkorn.nl" class="me-3">
              <i class="bi bi-envelope-at"></i>
            </a>
            <a href="tel:+31624969445" class="me-3">
              <i class="bi bi-telephone"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=+31624969445">
              <i class="bi bi-whatsapp"></i>
            </a> -->
          </p>
        </div>
      </div>
    </div>
  </div>
</div>