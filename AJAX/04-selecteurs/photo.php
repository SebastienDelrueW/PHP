<?php

//print_r($_POST); // indice ['attribut]

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=tapis', 
			   'root', 
			   'root',     
			   array(
			       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
			       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));

$contenu = '';
if(isset($_POST['attribut'])){ // si on a reçut la valeur de l'attribut qui contient l'id_produit

        $attribut =$_POST['attribut'];
        $requete = $pdo->query("SELECT photo FROM produit WHERE id_produit = $attribut");

    $photo = $requete->fetch(PDO::FETCH_ASSOC);
    //print_r($photo);

    $contenu = '<img src="selecteurs_produits/'. $photo['photo'] .'">';

    echo $contenu;
}
