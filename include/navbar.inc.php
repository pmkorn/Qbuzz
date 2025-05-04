<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold me-5" href="/"><img src="../images/qbuzz-logo.png" alt="Qbuzz logo" width="80px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 left-bar">
                <li class="nav-item me-lg-3 mb-3 mb-lg-0">
                    <a class="nav-link" href="voertuigen/">Voertuigen</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 right-bar">
                <?php
                if (!isset($_SESSION['employeeID'])) {
                    echo '<li class="nav-item me-lg-3 mb-3 mb-lg-0">';
                    //echo '<a class="me-3 nav-link" href="" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-lock"></i> Inloggen</a>';
                    echo '<a class="me-3 nav-link" href="" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-lock"></i></a>';
                    echo '</li>';
                    // echo '<li class="nav-item me-lg-3 mb-3 mb-lg-0">';
                    //   echo '<a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#modalRegister"><i class="bi bi-person"></i> Registreren</a>';
                    // echo '</li>';
                } else if (isset($_SESSION['employeeID']) && $_SESSION['employeeRole'] === 'admin') {
                    echo '<li class="nav-item me-lg-3 mb-3 mb-lg-0">';
                    echo '<a class="nav-link" href="admin/"><i class="bi bi-speedometer2"></i> Admin</a>';
                    echo '</li>';
                    echo '<li class="nav-item me-lg-3 mb-3 mb-lg-0">';
                    echo '<a class="nav-link" href="uitloggen/"><i class="bi bi-unlock"></i> Uitloggen</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item me-lg-3 mb-3 mb-lg-0">';
                    echo '<a class="nav-link" href="uitloggen/"><i class="bi bi-unlock"></i> Uitloggen</a>';
                    echo '</li>';
                }
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>