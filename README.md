# Ma Médiathèque

Projet de NSI

## Présentation

<table>
<tr>
<td>
Les sujets du numérique et du high tech ne doivent pas être compris uniquement par ceux qui les maitrisent
</tr>
</table>

## Outils

* PHP 7 (Architecture MVC)
* SQL (MySQL)
* CSS 3(Bootstrap)
* HTML 5

## Installation

Paquets nécessaires :

* php
* mysql
* composer
* phpmyadmin

Téléchargement des fichiers :

``` bash 
git clone https://github.com/NielsTRS/MaMediathequeNSI.git
```

Installation des dépendances :

``` bash 
cd MaMediathequeNSI
composer install
```

Configuration de la base de données :

* Lancer [PhpMyAdmin](http://127.0.0.1/phpmyadmin)
* Créer une base de donnée et exécuter le fichier : dump_nsi.sql
* Modifier les identifiants dans le fichier : src/App/Model.php

