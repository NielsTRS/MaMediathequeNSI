<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('WEB_ROOT', str_replace('index.php', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
define('ROOT', str_replace('public/index.php', '', $_SERVER['SCRIPT_FILENAME']));
session_start();

require('../vendor/autoload.php');

use Core\App\Router;

if (isset($_GET['url'])) {
    $router = new Router($_GET['url']);
    $router->add('/', 'Book#index', 'GET');
    $router->add('/recherche', 'Book#search', 'POST');
    $router->add('/livre/:isbn/supprimer', 'Book#delete', 'GET');
    $router->add('/connexion', 'User#logIn', 'GET');
    $router->add('/connexion', 'User#logIn', 'POST');
    $router->add('/deconnexion', 'User#logOut', 'GET');
    $router->add('/inscription', 'User#signUp', 'GET');
    $router->add('/inscription', 'User#signUp', 'POST');
    $router->add('/emprunt', 'Take#index', 'GET');
    $router->add('/mes-emprunts', 'Take#getUserTakes', 'GET');
    $router->add('/emprunt/:isbn/nouveau', 'Take#add', 'GET');
    $router->add('/emprunt/:isbn/supprimer', 'Take#delete', 'GET');

    $router->run();
} else {
    header('Location: ./');
}