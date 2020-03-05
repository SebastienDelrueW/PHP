<?php

if (!empty($_POST)){

echo  '<p> Ville : ' . $_POST['ville'] .' </p>';
echo  '<p> Code postal : ' .  $_POST['cp'] . ' </p>';
echo  '<p> Adresse : ' . $_POST['adresse'] . ' </p>';

//--------------------
// On va écrire les adresses dans un fichier texte sur le serveur en l'absence de base de données :

$file = fopen('adresses.txt', 'a'); // fopen() en mode "a" permet de créer un fichier s'il n'existe pas encore, sinon de l'ouvrir.

$adresse = $_POST['adresse'] . '-' . $_POST['cp'] . '-' . $_POST['ville'] . "\n"; // "\n" pour faire des sauts de lignes dans le fichier txt.

fwrite($file, $adresse); // permet d'écrire l'adresse de l'internaute dans le fichier ouvert et représenté par $file.
}