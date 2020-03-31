<?php


 try{
     $bdd = new PDO('mysql:host=localhost;dbname=candidat;charset=utf8','root','root'); 
 }
 catch(Exception $e){  // exception va attraper l'erreur qui se serait produit dans le try et la mettre dans la variable $e
     die('erreur : ' .$e->getMessage()); // die permet d'afficher
 }


