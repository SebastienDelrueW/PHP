<?php
// Ce fichier sera inclus au début de tous les scripts du site.

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', //  nom du serveur (host), nom de la BDD (dbname)
                'root', // pseudo de la BDD
                'root',     // mot de pass de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Pour afficher les erreurs sql dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Pour définir le charset des échanges avec la BDD
                ));
                // debug($pdo);
                // debug(get_class_methods($pdo));

// Créer une session ou l'ouvrir si elle existe
session_start();

// Définir le chemin du site : 
define('RACINE_SITE','/08-SITE/'); // constante qui définit les dossiers dans lequels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost.
// Ainsi nous écrirons tous les chemins des src ou href en absolus avec cette constante. Chez un hébergeur vous mettriez '/' si votre site se trouve à la racine de votre hébergement.

// Variable pour afficher du HTML : 
$contenu = ''; // on se sert de cette variable partout dans le site.

// Inclusions des fonctions : 
require_once 'functions.php';