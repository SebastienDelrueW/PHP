<?php
// Ce fichier sera inclus au début de tous les scripts du site.

// Connexion à la BDD
$pdo = new PDO(
    'mysql:host=localhost;dbname=site', // driver mysql (IBM, oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
    'root', // pseudo de la BDD
    'root',     // mdp de la BDD utilisation de MAMP
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
    )
);

// Créer une session ou l'ouvrir si elle existe 
session_start();

// Définir le chemin du site :
define('RACINE_SITE', '/08_site/'); // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost. Ainsi nous écrivons tous les chemins des src ou des href en absolu avec cette constante. Chez un hébergeur vous mettriez '/' si votre site se trouve à la racine de votre hébergement.

// Variable pour afficher du HTML :
$contenu = ''; // on se sert de cette variable partout sur le site.

// Inclusions des fonctions :
require_once 'functions.php';
?>
<style>
body {
    background-color: #ff60005e;
}

.alert.alert-danger {
    color: black;
    background-color: #d6d8d9;
    border: 1px solid red;
    box-shadow: 8px 8px 12px #aaa;
}

.btn.btn-info:hover {
    background-color: maroon;
    box-shadow: 8px 8px 12px #aaa;
}

.btn.bg-white {
    box-shadow: 8px 8px 12px #aaa;
}

label {
    color: maroon;
    font-family: fantasy;
}

strong {
    color: black;
}
</style>