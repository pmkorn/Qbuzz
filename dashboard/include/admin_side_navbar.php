<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="admin/">
                    <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="bi bi-globe"></i></div>
                    Website
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bi bi-layout-split"></i></div>
                    Stremmingen
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="admin/stremmingen/overzicht/">Overzicht</a>
                        <a class="nav-link" href="admin/stremmingen/aanmaken/">Aanmaken</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="bi bi-sign-stop"></i></div>
                    Haltes
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Overzicht</a>
                        <a class="nav-link" href="">Aanmaken</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseWorkorders" aria-expanded="false" aria-controls="collapseWorkorders">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-task"></i></div>
                    Werkorders
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapseWorkorders" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="admin/werkorders/overzicht/">Overzicht</a>
                        <a class="nav-link" href="admin/werkorders/aanmaken/">Aanmaken</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNotofications" aria-expanded="false" aria-controls="collapseNotofications">
                    <div class="sb-nav-link-icon"><i class="bi bi-bell"></i></div>
                    Meldingen
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapseNotofications" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Overzicht</a>
                        <a class="nav-link" href="">Aanmaken</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Gebruikers</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                    Gebruikers
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="admin/gebruikers/overzicht/">Overzicht</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="uitloggen/" >
                    <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-right"></i></div>
                    Uitloggen
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Ingelogd als:</div>
            <?php echo $_SESSION['employeeName']; ?>
        </div>
    </nav>
</div>