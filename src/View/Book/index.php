<?php 

use Core\Controller\UserController;

?>

<div class="container MainContent">
    <form class="row" action="<?php echo WEB_ROOT ?>recherche" method="post" novalidate>
        <div class="col-md-4">
            <label for="search">Recherche:</label>
            <input type="text" class="form-control" name="query" placeholder="Astérix et Obélix" required
                   value="<?php echo (!is_null($query)) ? htmlspecialchars($query) : null; ?>"/>
        </div>
        <div class="col-md-4">
            <label for="filter">Appliquer un filtre</label>
            <select class="form-select" aria-label="Filtrer" name="filter">
                <option value="" selected>Filtrer...</option>
                <option value="1" <?php echo (!is_null($filter) and $filter === 1) ? 'selected="selected"' : null; ?>>
                    Triez le Titre par ordre croissant (A-Z)
                </option>
                <option value="2" <?php echo (!is_null($filter) and $filter === 2) ? 'selected="selected"' : null; ?>>
                    Triez le Titre par ordre décroissant (Z-A)
                </option>
                <option value="3" <?php echo (!is_null($filter) and $filter === 3) ? 'selected="selected"' : null; ?>>
                    Triez l'Auteur par ordre croissant (A-Z)
                </option>
                <option value="4" <?php echo (!is_null($filter) and $filter === 4) ? 'selected="selected"' : null; ?>>
                    Triez l'Auteur par ordre décroissant (Z-A)
                </option>
            </select>
        </div>
        <div class="col-md-4">
            <br/>
            <button class="btn btn-primary" name="recherche" type="submit">Rechercher</button>
        </div>
    </form>
    <div class="SearchResult container">
        <hr/>
        <?php if (!is_null($query)) { ?>
            <p class="alert alert-success">Résultat(s) de votre recherche: <?php echo htmlspecialchars($query); ?></p>
        <?php } ?>
    </div>
    <ul class="list-group list-group-flush Books mt-20px">
        <?php
        foreach ($datas as $data) { ?>
            <li class="list-group-item Book d-flex">
                <div class="me-auto d-flex flex-column">
                    <div class="d-flex">
                        <h1><?php echo htmlspecialchars($data['titre']); ?></h1>
                        <?php if (!is_null($data['retour'])) {
                            echo '<p class="badge bg-danger align-self-end" style="margin-left: 10px;">Disponible le
                                : ' . $data['retour'] . '</p>';
                        } ?>
                    </div>
                    <h3><?php echo htmlspecialchars($data['nom']) . ' / ' . htmlspecialchars($data['annee']); ?></h3>
                </div>
                <div class="d-grid gap-2 d-md-flex align-self-center justify-content-md-end">
                    <?php
                        if (UserController::isConnected()) {
                            echo '<a href="'.WEB_ROOT.'emprunt/'.$data['isbn'].'/nouveau" ><button class="btn btn-secondary">Emprunter</button></a>';
                        }
                    ?>
                    <a href="<?php echo WEB_ROOT . 'livre/profil/' . $data['isbn']; ?>">
                        <button class="btn btn-primary">Plus d'informations</button>
                    </a>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>