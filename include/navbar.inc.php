<nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
  <div class="container">
    <a class="navbar-brand fw-bold me-5" href="/"><strong>PATRICK<span class="ms-1 fs-6">KORN</span></strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 left-bar">
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" href="blog/">Blog</a>
        </li>
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" href="gallerij/">Gallerij</a>
        </li>
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" href="projecten/">Projecten</a>
        </li>
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" href="over-mij/">Over mij</a>
        </li>
        <li class="nav-item me-lg-3 mb-3 mb-lg-0">
          <a class="nav-link" href="contact/">Contact</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 right-bar">
        <li class="nav-item">
          <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i></button>
        </li>
        <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="bi bi-person-circle"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">																		
            <?php

              if (isset($_SESSION['memberID'])) {
                echo '<li><a class="dropdown-item disabled" href="#">'. $_SESSION['memberName'] .'</a></li>';
                echo '<li><hr class="dropdown-divider" href="#"></li>';
              } else {

              }

            ?>
            <?php

              if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] === 'admin')) {
                echo '<li><a class="dropdown-item" href="admin/">Dashboard</a></li>';
                echo '<li><a class="dropdown-item" href="profiel/">Profiel</a></li>';
                echo '<li><a class="dropdown-item" href="users/">Leden</a></li>';
              } elseif (isset($_SESSION['userRole']) && ($_SESSION['userRole'] === 'user')) {
                echo '<li><a class="dropdown-item disabled" href="">Overzicht</a></li>';
                echo '<li><a class="dropdown-item" href="profiel/">Profiel</a></li>';
                echo '<li><a class="dropdown-item" href="users/">Leden</a></li>';

              } else {
                echo "";
              }

            ?>
          </ul>
				</li>
      </ul>
    </div>
  </div>
</nav>


