<?php

use Core\Controller\UserController;

if (UserController::isCurrentAdmin()) { ?>
    <table>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Jusqu'au</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach ($datas as $data) {
            echo '
    <tr>
        <th>' . $data['nom'] . '</th>
        <th>' . $data['titre'] . ' </th>
        <th>' . $data['retour'] . '</th>
        <th><a href="' . WEB_ROOT . 'emprunt/' . $data['isbn'] . '/supprimer">Supprimer</a></th>
    </tr>';
        } ?>
    </table>
<?php } elseif (UserController::isConnected()) { ?>
    <table>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Jusqu'au</th>
        </tr>
        <?php foreach ($datas as $data) {
            echo '
    <tr>
        <th>' . $data['nom'] . '</th>
        <th>' . $data['titre'] . ' </th>
        <th>' . $data['retour'] . '</th>
    </tr>';
        } ?>
    </table>
<?php } else {
    echo "erreur";
} ?>