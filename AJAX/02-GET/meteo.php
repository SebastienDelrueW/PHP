<?php
$retour = array(); // tableau qui contiendra la réponse du serveur

// print_r($_GET); // pour visualiser le print_r() il faut aller dans l'onglet Réseau puis dans Réponse. Attention : on commente cette ligne car on ne peut pas envoyer plusieurs réponses simultanément.

if (isset($_GET['ville']) && $_GET['ville'] == 'Paris'){ // si existe "ville" dans $_GET c'est qu'on a reçu une requête avec la ville dedans. On vérifie aussi si sa valeur est Paris.

        $retour['meteo'] = "Aujourd'hui il fait beau";
        $retour['temperature'] = '12°C';

        echo json_encode($retour); // json_encode() permet de transformer un tableau PHP en JSON . echo permet de l'envoyer vers le navigateur. Ce JSON est receptionné par la fonction JavaScript reponse() dans le fichier meteo.html.


}