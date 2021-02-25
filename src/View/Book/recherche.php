<p>Résultat pour <?php echo htmlspecialchars($query) ?></p>
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
