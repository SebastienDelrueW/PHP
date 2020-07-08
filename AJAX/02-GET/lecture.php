<?php

// print_r($_GET);

$retour = array(); // pour contenir le texte complet

if (isset($_GET['id']) && $_GET['id'] == 105){ 

        $retour['texte'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam consequuntur atque rem dignissimos in similique labore aperiam obcaecati quas magni consectetur, numquam cumque earum voluptate natus. Reiciendis quam est ab.";
     
        echo json_encode($retour); // json_encode() permet de transformer un tableau PHP en JSON . echo permet de l'envoyer vers le navigateur. Ce JSON est receptionné par la fonction JavaScript reponse() dans le fichier lecture.html.
}