<div class="container MainContent">
    <form class="row" action="" method="post" novalidate>
        <div class="col-md-4">
            <label for="search">Recherche:</label>
            <input type="text" class="form-control" name="search" placeholder="Astérix et Obélix" required>
        </div>
        <div class="col-md-4">
            <label for="filter">Appliquer un filtre <span class="badge bg-danger">WIP</span></label>
            <select class="form-select" aria-label="Filtrer" name="filter">
                <option value="none" selected>Filtrer...</option>
                <option value="1">Triez le Titre par ordre croissant (A-Z)</option>
                <option value="2">Triez le Titre par ordre décroissant (Z-A)</option>
                <option value="3">Triez l'Auteurice par ordre croissant (A-Z)</option>
                <option value="4">Triez l'Auteurice par ordre décroissant (Z-A)</option>
            </select>
        </div>
        <button class="col-md-1 btn fas fa-search offset-md-2" name="recherche"></button>
    </form>
    <div class="SearchResult container">
        <hr>
        <p class="alert alert-success">Résultat(s) de votre recherche: X</p>
        <p class="alert alert-danger">Recherche invalide, réessayez</p>
    </div>
    <ul class="list-group list-group-flush Books mt-20px">
        <?php
        foreach ($datas as $data) { ?>
            <li class="list-group-item Book d-flex">
                <div class="me-auto d-flex flex-column">
                    <div class="d-flex">
                        <h1><?php echo $data['titre']; ?></h1>
                        <?php if (!is_null($data['retour'])) {
                            echo '<p class="badge bg-danger align-self-end" style="margin-left: 10px;">Disponible le
                                : ' . $data['retour'] . '</p>';
                        } ?>
                    </div>
                    <h3><?php echo $data['nom'] . ' / ' . $data['annee']; ?></h3>
                </div>
                <div class="d-grid gap-2 d-md-flex align-self-center justify-content-md-end">
                    <a href="<?php echo WEB_ROOT . 'livre/' . $data['isbn']; ?>">
                        <button class="btn btn-primary">Plus d'informations</button>
                    </a>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>