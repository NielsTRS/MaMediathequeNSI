<div class="container MainContent">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a href="<?php echo WEB_ROOT; ?>livre/admin" class="nav-link" role="tab"
                                aria-selected="true">Livre</a></li>
        <li class="nav-item"><a href="<?php echo WEB_ROOT; ?>emprunt/admin" class="nav-link active" data-bs-toggle="tab"
                                role="tab" aria-selected="true">Emprunt</a></li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane" id="member" role="tabpanel" aria-labelledby="member-tab">Membre</div>
        <div class="tab-pane show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
            <div class="d-flex gap-2 mt-20px col-md-12">
                <div id="admin-stuff" class="overflow-auto col" style="resize:vertical;min-height:250px;height:500px;">
                    <div id="emprunts">
                        <h1>Emprunts</h1>
                        <div class="list-group list-group-flush">
                            <?php foreach ($datas as $data) { ?>
                                <li class="list-group-item d-flex">
                                    <div class="d-flex me-auto">
                                        <div class="d-flex flex-column">
                                            <p class="h4 text-center"><?php echo "".htmlspecialchars($data['nom'])." ".htmlspecialchars($data['prenom']); ?></p>
                                            <div class="d-flex">
                                                <a class="h2" style="text-decoration: none;"
                                                   href="<?php echo WEB_ROOT; ?>livre/profil/<?php echo $data['isbn']; ?>"><?php echo htmlspecialchars($data['titre']); ?></a>
                                                <p class="badge bg-primary align-self-end ShowBookTitle"
                                                   style="margin-left: 10px;"> A rendre
                                                    le <?php echo htmlspecialchars($data['retour']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?php echo WEB_ROOT . 'emprunt/' . $data['isbn'] . '/supprimer'; ?>"
                                           class="btn btn-danger align-self-center">Annuler l'emprunt</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>