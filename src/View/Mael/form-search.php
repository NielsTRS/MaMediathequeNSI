<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

    <title>Recherche - MaMédiathèque</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-light mt-20px">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/Page Title.svg" alt="">
            </a>
        </div>
    </nav>
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
            <li class="list-group-item Book d-flex">
                <div class="me-auto d-flex flex-column">

                    <div class="d-flex">
                        <h1>Titre</h1>
                        <p class="badge bg-danger align-self-end" style="margin-left: 10px;">Indisponible</p> <!-- A mettre si le livre est indisponible -->
                    </div>
                    <h3>Auteur / Année / Genre</h3>
                </div>
                <div class="d-grid gap-2 d-md-flex align-self-center justify-content-md-end">
                    <button class="btn btn-primary" type="button"><span class="fas fa-info-circle"></span> Plus d'informations</button> <!-- Redirection vers la page du livre -->
                </div>
            </li>
            <!-- <hr>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
        </ul>
    </div>
    <!-- <script src="fontawesome.js" crossorigin="anonymous"></script> -->
    <script src="bootstrap.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
</body>

</html>