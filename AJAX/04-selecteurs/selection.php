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

// On détermine la variable $matiere :
if (isset($_POST['matiere'])){ // si on a cliqué sur une des matière

// 
    /// on prend les valeurs du tableau $_POST[''matiere] et on les met sous forme de string en séparant les valeurs par des virgules :
       echo '<pre>';
    print_r("matiere IN ('" . implode("','", $_POST['matiere']) . "')");
       echo '</pre>'; 

     $matiere = "matiere IN ('" . implode("','", $_POST['matiere']) . "')";
    }
    // on determine la variable $couleur
if (isset($_POST['couleur'])){ // si on a cliqué sur une des matière

    /// on prend les valeurs du tableau $_POST[''couleur] et on les met sous forme de string en séparant les valeurs par des virgules :
       echo '<pre>';
    print_r("couleur IN ('" . implode("','", $_POST['couleur']) . "')");
       echo '</pre>'; 

     $couleur = "couleur IN ('" . implode("','", $_POST['couleur']) . "')";
}
if (isset($_POST['forme'])){ // si on a cliqué sur une des matière

    /// on prend les valeurs du tableau $_POST[''couleur] et on les met sous forme de string en séparant les valeurs par des virgules :
       echo '<pre>';
    print_r("forme IN ('" . implode("','", $_POST['forme']) . "')");
       echo '</pre>'; 

     $forme = "forme IN ('" . implode("','", $_POST['forme']) . "')";
}

// On fait une rquête pour selectionner les tapis :
if ($matiere !== true || $couleur !== true ||  $forme !== true) {

$donnees = $pdo->query("SELECT * FROM produit WHERE $matiere AND $couleur AND $forme"); // sélectionne les produits et couleurs et les formes choisies dans le formulaire. Par défaut les trois variables sont à true, on sélectionne donc toutes les matières, couleurs et formes, ce qui permet d'afficher tous les tapis.

// On prépare l'affichage des produits : 
// var_dump(donnees);
if ($donnees->rowCount()!= 0){
    
    while ($produit = $donnees->fetch(PDO::FETCH_ASSOC)){

        /*echo '<pre>';
            print_r($produit);
        echo '</pre>';*/

        $contenu.= '<div style="width:25%;float:left;"';
            $contenu.= '<h2>Tapis '.$produit['id_produit'].'</h2>';
            $contenu.= '<div>
                            <img src="selecteurs_produits/'. $produit['photo'].'" style="width:80% " class="photo" data-id_produit=" '.$produit['id_produit'].' ">
                        </div>';
                      
        $contenu.= '</div>';
    }

} else {
    // s'il n'y a pas de produit à afficher
    $contenu .='<p>Aucun produit ne correspond à votre demande.</p>';
}

echo $contenu; // on envoie le HTML au navigateur.
}