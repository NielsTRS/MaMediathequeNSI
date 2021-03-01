<?php

?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>assets/css/bootstrap.css">
    <title><?php echo $title; ?> - MaMédiathèque</title>
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-light mt-20px">
    <div class="container">
        <a class="navbar-brand" href="<?php echo WEB_ROOT; ?>">
            <img src="<?php echo WEB_ROOT; ?>assets/images/Page Title.svg" alt="">
        </a>
        <?php if (UserController::isConnected()) {
            echo '<a href="' . WEB_ROOT . 'deconnexion" class="btn btn-danger float-end">Se Déconnecter</a>';
        }?>
    </div>
</nav>
<?php echo $content; ?>
<script src="<?php echo WEB_ROOT; ?>/assets/js/bootstrap.js"></script>
</body>
</html>
