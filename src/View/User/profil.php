<?php

use Core\Controller\UserController;

?>
<div class="container MainContent">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="<?php echo WEB_ROOT; ?>profil/<?php echo $_SESSION['code']; ?>" class="nav-link active"
               data-bs-toggle="tab" data-bs-target="#member"
               role="tab" aria-selected="true">Onglet membre</a>
        </li>
        <?php if (UserController::isCurrentAdmin()) { ?>
            <li class="nav-item">
                <a href="<?php echo WEB_ROOT; ?>livre/admin" class="nav-link" role="tab" aria-selected="true">Onglet
                    administrateur</a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="member" role="tabpanel" aria-labelledby="member-tab">
            <div class="container mt-20px">
                <div class="row PersonnalInformation">
                    <i class="fas fa-user col-md-1 display-1 float-start"></i>
                    <div class="col-md-4">
                        <h1>Bienvenue <?php echo htmlspecialchars($datas['nom']); ?> !</h1>
                        <p>Bienvenue dans votre espace personnel</p>
                    </div>
                </div>
                <hr>
                <div class="row Emprunts">
                    <h1>Emprunts</h1>
                    <div class="list-group list-group-flush">
                        <?php foreach ($takes as $take) { ?>
                            <li class="list-group-item d-flex">
                                <div class="d-flex me-auto">
                                    <div class="d-flex flex-column">
                                        <p class="h4 text-center"><?php echo htmlspecialchars($take['nom']); ?></p>
                                        <div class="d-flex">
                                            <a class="h2" style="text-decoration: none;"
                                               href="<?php echo WEB_ROOT; ?>livre/profil/<?php echo $take['isbn']; ?>"><?php echo htmlspecialchars($take['titre']); ?></a>
                                            <p class="badge bg-primary align-self-end ShowBookTitle"
                                               style="margin-left: 10px;"> A rendre
                                                le <?php echo htmlspecialchars($take['retour']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if (UserController::isConnected()) { ?>
                                    <div>
                                        <a href="<?php echo WEB_ROOT . 'emprunt/' . $take['isbn'] . '/supprimer'; ?>"
                                           class="btn btn-danger align-self-center">Annuler l'emprunt</a>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>