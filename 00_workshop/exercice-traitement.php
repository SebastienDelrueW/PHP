<style>
p {
    color:black;
    box-shadow: 2px 3px 2px 1px rgba(87, 84, 76, 0.2);
}
strong {
    color:red;
}
</style>


<?php

if (!empty($_POST)){

echo  '<p> <strong>P</strong>rénom : ' . $_POST['prenom'] . ' </p>';
echo  '<p> <strong>N</strong>om : ' . $_POST['nom'] . ' </p>';
echo  '<p> <strong>E</strong>mail : ' . $_POST['email'] . ' </p>';
echo  '<p> <strong>T</strong>éléphone : ' . $_POST['telephone'] . ' </p>';
echo  '<p> <strong>A</strong>dresse : ' . $_POST['adresse'] . ' </p>';
echo  '<p> <strong>V</strong>ille : ' . $_POST['ville'] .' </p>';
echo  '<p> <strong>P</strong>ays : ' . $_POST['pays'] . ' </p>';
echo  '<p> <strong>C</strong>ode postal : ' .  $_POST['cp'] . ' </p>';


//--------------------
// On va écrire les adresses dans un fichier texte sur le serveur en l'absence de base de données :

$file = fopen('adresses.txt', 'a'); // fopen() en mode "a" permet de créer un fichier s'il n'existe pas encore, sinon de l'ouvrir.

$adresse = $_POST['prenom'] . '-' . $_POST['nom'] . '-' . $_POST['email'] . '-' . $_POST['telephone']. '-' . $_POST['adresse']. '-' . $_POST['ville'] . '-' . $_POST['pays']  . '-' . $_POST['cp']  . "\n"; // "\n" pour faire des sauts de lignes dans le fichier txt.

fwrite($file, $adresse); // permet d'écrire l'adresse de l'internaute dans le fichier ouvert et représenté par $file.
}