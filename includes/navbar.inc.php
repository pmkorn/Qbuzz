<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark py-3 fixed-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="../images/qbuzz-logo.png" width="100px" alt="Qbuzz logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link disabled">
            <?php
              $Y = date("Y");
              $M = date("m");
              $D = date("d");
              include('version.php');

              $daySerial = $Y . $M . $D . $v;

              echo $daySerial;
            ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stremmingen</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="stremmingen/overzicht/"><i class="bi bi-eye me-2"></i> Overzicht</a></li>
            <?php
              if ($employeeRole == 3) {
                echo '<li><a class="dropdown-item" href="stremmingen/aanmaken/"><i class="bi bi-pencil me-2"></i> Aanmaken</a></li>';
              }
            ?>
            <?php
              if ($employeeRole == 3) {
                echo '<li><a class="dropdown-item" href="stremmingen/afmelden/"><i class="bi bi-box-arrow-right me-2"></i> Afmelden</a></li>';
              }
            ?>
            <?php
              if ($employeeRole == 3) {
                echo '<li><a class="dropdown-item" href="stremmingen/printen/"><i class="bi bi-printer me-2"></i> Printen</a></li>';
              }
            ?>
            <?php
              if ($employeeRole == 3) {
                echo '<li><a class="dropdown-item" href="stremmingen/mailen/"><i class="bi bi-envelope me-2"></i> Mailen</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Haltes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="haltes/overzicht/"><i class="bi bi-eye me-2"></i> Overzicht</a></li>
            <li><a class="dropdown-item" href="haltes/werkorders/"><i class="bi bi-check2-square me-2"></i> Werkorders</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="werkorders/">Werkorders</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $employeeFirstName." ".$employeeLastName; ?>
          </a>
          <ul class="dropdown-menu">
          <li>
              <a class="dropdown-item disabled" id="logout" data-logout="logout" aria-disabled="true">
                Account
              </a>
            </li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="account/profile/">Profiel</a></li>
            <li><a class="dropdown-item" href="account/logout/">Logout</a></li>            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin/">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>