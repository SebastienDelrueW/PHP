<?php

/*echo '<pre>';
    print_r($_POST);
echo '</pre>';*/

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=tapis', 
			   'root', 
			   'root',     
			   array(
			       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
			       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));
              
// Variables :
$contenu = '';  // pour contenir le HTML des tapis à afficher
$matiere = true;
$couleur = true;
$forme = true;

// On remplit les 3 variables $matiere, $couleur et $forme pour alimenter la requête SQL :

//............

// On fait une rquête pour selectionner les tapis :
$donnees = $pdo->query("SELECT * FROM produit WHERE $matiere AND $couleur AND $forme"); // sélectionne les produits et couleurs et les formes choisies dans le formulaire. Par défaut les trois variables sont à true, on sélectionne donc toutes les matières, couleurs et formes, ce qui permet d'afficher tous les tapis.

// On prépare l'affichage des produits : 
// var_dump(donnees);
if ($donnees->rowCount()!=0){
    
    while ($produit = $donnees->fetch(PDO::FETCH_ASSOC)){
        $contenu.= '<div style="width:15%;float:left;"';
            $contenu.= '<h2>Tapis'.$produit['id_produit'].'</h2>';
            $contenu.= '<div>
                            <img src="selecteurs_produits/'. $produit['photo'].'" style="width:100px" class="photo" data-id_produit=" '.$produit['id_produit'].' ">
                        </div>';
                        
        $contenu.= '</div>';
    }

} else {
    // s'il n'y a pas de produit à afficher
    $contenu .='<p>Aucun produit ne correspond à votre demande.</p>';
}
echo $contenu; // on envoie le HTML au navigateur.