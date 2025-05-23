<!-- Modal Search -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="">
                    <h4 class="modal-title">Zoek binnen website...</h4>
                    <div class="input-group border my-3">
                        <input type="search" class="form-control bg-transparent border-0 rounded-0 shadow-none" placeholder="Search" aria-label="Search" aria-describedby="search">
                        <a href="" class="input-group-text bg-transparent border-0 rounded-0" id="searchQuery"><i class="bi bi-search"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Subscribe -->
<div class="modal fade" id="subscribeNewsletter" tabindex="-1" aria-labelledby="subscribeNewsletterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="subscribeNewsletterLabel">Inschrijven nieuwsbrief</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Schrijf je nu in voor de nieuwsbrief en ontvang als eerste informatie over onze nieuwe items en aanbiedingen.</p>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" name="subscribeEmail" id="subscribeEmail" class="form-control border-0 rounded-0 shadow-none" placeholder="Uw email..." aria-label="Uw email..." aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" name="newsletter_subscribe" id="newsletter_subscribe"><i class="bi bi-send"></i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Inschrijven!</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLoginLabel">Inloggen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login-form" autocomplete="off">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="employeeUserName" placeholder="Gebruikersnaam">
                        <label for="employeeUserName">Gebruikersnaam</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="employeeUserPassword" placeholder="Wachtwoord">
                        <label for="employeeUserPassword">Wachtwoord</label>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="button" id="btnUserLogin" class="btn btn-yellow btn-lg">Inloggen</button>
                        <button class="btn btn-yellow btn-lg" id="btnSpinner" style="display: none;" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Bezig met inloggen...</span>
                        </button>
                    </div>
                    <div class="d-flex">
                        <div class="me-auto small">
                            Geen geen account?<br> <a href="registreren/">Registreer</a>
                        </div>
                        <div class="ms-auto small">
                            <a href="wachtwoord-reset/">Wachtwoord vergeten?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="modalRegister" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalRegisterLabel">Registreren</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="register-form" autocomplete="off">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstName" placeholder="Voornaam">
                        <label for="firstName">Voornaam</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastName" placeholder="Achternaam">
                        <label for="lastName">Achternaam</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="userPassword" placeholder="Wachtwoord">
                        <label for="userPassword">Wachtwoord</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="repeatUserPassword" placeholder="Herhaal wachtwoord">
                        <label for="repeatUserPassword">Herhaal wachtwoord</label>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="button" id="btnUserRegister" class="btn btn-yellow btn-lg">Registreren</button>
                    </div>
                    <div class="d-flex">
                        <div class="me-auto small">
                            Al een account?<br> <a href="inloggen/">Inloggen</a>
                        </div>
                        <div class="ms-auto small">
                            <a href="wachtwoord-reset/">Wachtwoord vergeten?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal omloop -->
<div class="modal fade" id="omloopModal" tabindex="-1" aria-labelledby="omloopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="">
                    <div class="row mb-3">
                        <h4 class="modal-title">Toevoegen</h4>
                    </div>

                    <div class="row mb-3">
                        <label for="omloop" class="col-sm-2 col-form-label">Omloop</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="omloop" minlength="6" maxlength="6">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="voertuig" class="col-sm-2 col-form-label">Voertuig</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="voertuig" minlength="4" maxlength="4">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="beginplaats" class="col-sm-2 col-form-label">Beginplaats</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="beginplaats">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="begintijd" class="col-sm-2 col-form-label">Begintijd</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="begintijd">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="eindtijd" class="col-sm-2 col-form-label">Eindtijd</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="eindtijd">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="eindplaats" class="col-sm-2 col-form-label">Eindplaats</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="eindplaats">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dienst" class="col-sm-2 col-form-label">Dienst</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="dienst" minlength="4" maxlength="4">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="voertuig" class="col-sm-2 col-form-label">Chauffeur</label>
                        <div class="col-sm-10">
                            <input type="chauffeur" class="form-control" id="chauffeur">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-danger me-3">Annuleren <i class="bi bi-x-circle"></i></button>
                            <button class="btn btn-success">Opslaan <i class="bi bi-floppy"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Voertuiginzet -->
<div class="modal fade" id="voertuigInzet" tabindex="-1" aria-labelledby="voertuigInzet" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Voertuig inzetbaarheid</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Opslaan</button>
            </div>
        </div>
    </div>
</div>