<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Get automatically the web root of the website
 */
define('WEB_ROOT', str_replace('index.php', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

/**
 * Get automatically the root of the website
 */
define('ROOT', str_replace('public/index.php', '', $_SERVER['SCRIPT_FILENAME']));

session_start();

require('../vendor/autoload.php');

use Core\App\Router;

if (isset($_GET['url'])) {
    $router = new Router($_GET['url']);
    $router->add('/', 'Page#index', 'GET');

    $router->add('/recherche', 'Book#index', 'GET');
    $router->add('/recherche', 'Book#index', 'POST');

    $router->add('/livre/admin', 'Book#admin', 'GET');
    $router->add('/livre/profil/:isbn', 'Book#profil', 'GET');
    $router->add('/livre/:isbn/supprimer', 'Book#delete', 'GET');

    $router->add('/connexion', 'User#logIn', 'GET');
    $router->add('/connexion', 'User#logIn', 'POST');
    $router->add('/deconnexion', 'User#logOut', 'GET');
    $router->add('/inscription', 'User#signUp', 'GET');
    $router->add('/inscription', 'User#signUp', 'POST');
    $router->add('/profil/:code', 'User#profil', 'GET');

    $router->add('/emprunt', 'Take#index', 'GET');
    $router->add('/emprunt/:isbn/nouveau', 'Take#add', 'GET');
    $router->add('/emprunt/:isbn/supprimer', 'Take#delete', 'GET');
    $router->add('/emprunt/admin', 'Take#admin', 'GET');

    $router->run();
} else {
    header('Location: ./');
}
