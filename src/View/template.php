<?php

use Core\Controller\UserController;

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<ul>
    <li><a href="<?php echo WEB_ROOT; ?>">Index</a></li>
    <?php
    if (UserController::isConnected()) {
        ?>
        <li><a href="<?php echo WEB_ROOT; ?>emprunt">Emprunt</a></li>
        <li><a href="<?php echo WEB_ROOT; ?>deconnexion">Deconnexion</a></li>
    <?php } else {
        ?>
        <li><a href="<?php echo WEB_ROOT; ?>connexion">Connexion</a></li>
        <li><a href="<?php echo WEB_ROOT; ?>inscription">Inscription</a></li>
        <?php
    }
    ?>

</ul>
<form action="<?php echo WEB_ROOT; ?>recherche" method="POST">
    <label for="query">Votre recherche : </label>
    <input type="text" name="query" id="query" required/>
    <br/>
    <input type="submit" value="Valider"/>
</form>
<?php echo $content; ?>
</body>
</html>
