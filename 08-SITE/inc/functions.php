<?php
// Fonction de debug
function debug($var){
    echo '<pre>';
        print_r($var);
    echo '</pre>';
}

// Fonctions liées au membre
// Vérifier si le membre est connecté
function estConnecte(){
    if (isset($_SESSION['membre'])) { //Si la session contient un indice membrec'est que l'internaute est passer par la page de connexion avec le bons pseudo/mdp
        return true; // il est connecté
    } else {
        return false; // il n'est pas connecté
    }
}

// Vérifier si le membre est administrateur et connecté :
function estAdmin(){
    if(estConnecte() && $_SESSION['membre']['statut']){ // Si le lembre et connecté et que dans le même temps son statur est 1 (pour admin), nours retournons true :
        return true;
    } else {
        return false; // sinon dans le cas contraire nous retournons false.
    }
}

// Fonction pour exécuter toutes les requêtes préparées : 
// $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo']));


//$resultat = executeRequete("SELECT * FROM produits");
function executeRequete($requete, $parametres = array()){

    // Assainissement des données avec htmlspecialchars : on parle d'échapper les données (échappement)
    foreach($parametres as $indice => $valeur){
        $parametres[$indice] = htmlspecialchars($valeur);
    } // On parcourt le tableau $parametres qui contient les marqueurs et leurs valeur. On prend chaque valeur que l'on passe dans htmlspecialchars pour transformer les '< >' en entité HTML. 
      // Cette valeur une fois assainie, on la remet dans son emplacement qui est $parametre['$indice'].

    global $pdo; // global permet d'acceder à la variable $pdo qui est définie dans l'espace global du fichier init.php.
    $resultat = $pdo-> prepare($requete); // On prépare la requête qui est contenue dans la variable $requete.
    $succes = $resultat->execute ($parametres); // puis on l'exécute on donnant le tableau $parametres qui associe les marqueurs à leur valeur.
    // execute()retourne true si la requête à marché sinon false, et on affecte ce résultat à la variable succès.

    if($succes === false){
        return false; // si la requête n'a pas marché, on retourne false.
    } else { 
        return $resultat ; // On cas de succès on retourne l'objet PDOStatement qui contient le jeu de résultats.
    } 
}