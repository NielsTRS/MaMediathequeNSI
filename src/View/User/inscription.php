<div class="container col-md-6 MainContent">
    <div class="row">
        <div class="d-flex gap-2 justify-content-center">
            <a class="btn btn-primary col-md-5" id="login" type="button" href="<?php echo WEB_ROOT . 'connexion'; ?>">Connexion</a>
            <a class="btn btn-primary col-md-5 disabled" id="register" type="button">Inscription</a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <form class="col-md-10 mt-20px" action="<?php echo WEB_ROOT; ?>inscription" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" class="form-control" name="nom" placeholder="Dupont" required/>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Dupont" required/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="test@example.com"
                       required/>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" id="email" class="form-control" name="adresse" placeholder="15 rue des Champs"
                       required/>
            </div>
            <div class="mb-3">
                <label for="cp" class="form-label">Code Postal</label>
                <input type="text" id="cp" class="form-control" name="cp" required/>
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" id="ville" class="form-control" name="ville" placeholder="Paris" required/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required/>
                <div id="userHelp" class="form-text">Ne partagez jamais votre mot de passe.</div>
            </div>
            <button type="submit" class="btn btn-primary" id="connect" name="inscription">S'inscrire</button>
        </form>
    </div>
    <?php if (!is_null($msg)) {
        echo '<div class="d-flex justify-content-center">
        <p class="col-md-10 alert alert-info mt-20px">' . $msg . '</p>
    </div>';
    } ?>
</div>