<div class="container col-md-6 MainContent">
    <div class="row">
        <div class="d-flex gap-2 justify-content-center">
            <a class="btn btn-primary col-md-5 disabled" id="login" type="button">Connexion</a>
            <a class="btn btn-primary col-md-5" id="register" type="button" href="<?php echo WEB_ROOT; ?>inscription">Inscription</a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <form class="col-md-10 mt-20px" action="<?php echo WEB_ROOT; ?>connexion" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="nom" aria-describedby="userHelp" required/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" required/>
                    <div class="input-group-addon">
                        <a href="" id="togglePassword"><i class="fas fa-eye-slash" id="eyeIcon" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div id="userHelp" class="form-text">Ne partagez jamais votre mot de passe.</div>
            </div>
            <button type="submit" class="btn btn-primary" id="connect" name="connexion">Se connecter</button>
        </form>
    </div>
    <?php if (!is_null($msg)) {
        echo '<div class="d-flex justify-content-center">
        <p class="col-md-10 alert alert-danger">' . $msg . '</p>
    </div>';
    } ?>
</div>