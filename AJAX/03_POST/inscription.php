<?php

// print_r($_POST);

// Connexion à la BDD

$pdo = new PDO(
    'mysql:host=localhost;dbname=newsletter', // driver mysql, nom du serveur (host), nom de la BDD (dbname)
    'root', // pseudo de la BDD
    'root',     // mdp de la BDD utilisation de MAMP
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
    )
);

if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // si le champ existe et n'est pas vide, on l'insère en BDD :

    // Echappement des données : 
    $_POST['email'] = htmlspecialchars($_POST['email']); // contre les risques JS et CSS
    // requête préparée d'insertion :
    $resultat = $pdo->prepare("INSERT INTO abonne (email) VALUES (:email)");
    $resultat->execute(array(':email' => $_POST['email']));

    $retour = '<span style="color: green">Vous êtes inscrit à la newsletter.</span>';

} else { // si le champ est vide
    $retour = '<span style="color: red">Veuillez remplir votre email !</span>';
}

echo $retour; // on envoie le HTML au navigateur. Pas de json_encode() car le JS n'attend pas du JSON mais bien du HTML.
