<?php

use Core\Controller\UserController;

?>
<div class="container MainContent">
    <div class="d-flex col-10 offset-md-1">
        <div class="flex-columns col-8">
            <div class="d-flex no-wrap">
                <h1><?php echo htmlspecialchars($datas['titre']); ?></h1>
            </div>
            <h3>Auteur: <?php echo htmlspecialchars($datas['nom']); ?></h3>
        </div>
        <div class="flex-columns col-4 align-self-center">
            <?php if (is_null($datas['retour'])) {
                if (UserController::isConnected()) { ?>
                    <a href="<?php echo WEB_ROOT ?>emprunt/<?php echo $datas['isbn']; ?>/nouveau"
                       class="btn btn-primary">Emprunter</a>
                <?php } else { ?>
                    <a href="<?php echo WEB_ROOT ?>emprunt/<?php echo $datas['isbn']; ?>/nouveau"
                       class="btn btn-primary disabled">Emprunter</a>
                <?php } ?>
            <?php } else { ?>
                <p class="badge bg-danger align-self-end" style="margin-left: 20px;">Livre emprunté, retour prévu le
                    <?php echo htmlspecialchars($datas['retour']); ?></p>
            <?php } ?>
        </div>
    </div>

</div>