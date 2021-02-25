<?php

use Core\Controller\UserController;

if (UserController::isCurrentAdmin()) { ?>
    <table>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Emprunter</th>
            <th>Action</th>
        </tr>
        <?php foreach ($datas as $data) {
            echo '
    <tr>
        <th>' . $data['nom'] . '</th>
        <th>' . $data['titre'] . ' </th>
        <th>' . $data['annee'] . '</th>
        <th><a href="' . WEB_ROOT . 'emprunt/' . $data['isbn'] . '/nouveau">Emprunter</a></th>
        <th><a href="' . WEB_ROOT . 'livre/' . $data['isbn'] . '/supprimer">Supprimer</a></th>
    </tr>';
        } ?>
    </table>
<?php } elseif (UserController::isConnected()) { ?>
    <table>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Emprunter</th>
        </tr>
        <?php foreach ($datas as $data) {
            echo '
    <tr>
        <th>' . $data['nom'] . '</th>
        <th>' . $data['titre'] . ' </th>
        <th>' . $data['annee'] . '</th>
        <th><a href="' . WEB_ROOT . 'emprunt/' . $data['isbn'] . '/nouveau">Emprunter</a></th>
    </tr>';
        } ?>
    </table>
<?php } else { ?>
    <table>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Année</th>
        </tr>
        <?php foreach ($datas as $data) {
            echo '
    <tr>
        <th>' . $data['nom'] . '</th>
        <th>' . $data['titre'] . ' </th>
        <th>' . $data['annee'] . '</th>
    </tr>';
        } ?>
    </table>
<?php } ?>
