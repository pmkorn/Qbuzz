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
          <a class="nav-link" href="/">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stremmingen/aanmaken/">Stremmingen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="haltes/overzicht/">Haltes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="werkorders/">Werkorders</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">    
        <li class="nav-item dropdown dropstart">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item disabled" id="logout" data-logout="logout" aria-disabled="true">
                Account
              </a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">
                <?php echo $employeeFirstName." ".$employeeLastName; ?>
              </a>
            </li>
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