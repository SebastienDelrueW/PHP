
<?php
// Ce fichier sera inclus au début de tous les scripts du site.

// Connexion à la BDD
$pdo = new PDO(
    'mysql:host=localhost;dbname=exo_contacts', // driver mysql (IBM, oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
    'root', // pseudo de la BDD
    '',     // mdp de la BDD utilisation de MAMP
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
    )
);

// Fonction de debug

// function debug($var)
// {
//     echo '<pre>';
//     print_r($var);
//     echo '</pre>';
// }
