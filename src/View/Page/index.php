<?php

use Core\Controller\UserController;

?>
<div class="container MainContent">
    <div class="row align-items-center">
        <div class="col-md-5 offset-md-1">
            <h1>Une bibliothèque à portée de clic</h1>
            <p>Réservez vos livres sans attendre une seule seconde, et récupérez-les sur les lieux.</p>
        </div>
        <div class="col-md-3 offset-md-2">
            <div class="d-flex flex-column -mt-auto">
                <?php if (UserController::isConnected()) {
                    echo '<a class="btn btn-lg btn-primary" href="' . WEB_ROOT . 'deconnexion">Se déconnecter <span class="fas fa-user"></span></a>';
                } else {
                    echo '<a class="btn btn-lg btn-primary" href="' . WEB_ROOT . 'connexion">Espace Personnel <span class="fas fa-user"></span></a>';
                } ?>

                <a class="btn btn-lg btn-info mt-20px" href="<?php echo WEB_ROOT; ?>recherche">Rechercher <span
                            class="fas fa-search"></span></a>
            </div>
        </div>
    </div>
</div>