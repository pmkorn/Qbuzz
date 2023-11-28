<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark py-3" data-bs-theme="dark"">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="../images/qbuzz-logo.png" width="100px" alt="Qbuzz logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
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
          <a class="nav-link" aria-current="page" href="/"><span class="bi bi-house"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stremmingen</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="stremmingen/overzicht/">Overzicht</a></li>
            <?php
              if ($employeeRole == 3) {
                echo '<li><a class="dropdown-item" href="stremmingen/aanmaken/">Aanmaken</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Haltes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Overzicht</a></li>
            <li><a class="dropdown-item" href="haltes/werkorders/">Werkorders</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $employeeFirstName." ".$employeeLastName; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="account/profile/">Profiel</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="account/logout/">Logout</a></li>
            <li><a class="dropdown-item disabled" id="logout" data-logout="logout" aria-disabled="true">Test</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/admin/">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>