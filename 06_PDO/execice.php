
<h1>Les commerciaux et leur salaire</h1>

<?php

function debug($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}


$pdo = new PDO(
    'mysql:host=localhost;dbname=entreprise', // driver mysql (IBM, oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
    'root', // pseudo de la BDD
    'root',     // mdp de la BDD utilisation de MAMP
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
    )
);

// - Vous affichez dans une liste <ul><li> le prénom, le nom et le salaire des employés appartenant au service commercial (un <li> par commercial). Vous utilisez une requête préparée.
// - Vous affichez le nombre de commerciaux.

// La requête :
$service = 'commercial';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE service = :service");

$resultat->bindParam(':service', $service);

$resultat->execute();

$nombre_resultats = $resultat->rowCount();

// La boucle et le fetch

debug($resultat);

echo '<ul>';

while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) { // on fait une boucle car il y a plusieurs sommerciaux
 
    // debug($employe); 

        echo '<li>' . $employe['prenom'] . ' ' .  $employe['nom'] . ' ' . $employe['salaire'] . ' '  . '€' . '</li>' . '<br>';
  
}
echo '</ul>';

// Nombre de commerciaux
echo '&emsp; Le Nombre de commerciaux est : ' . $nombre_resultats; // permet de compter le nombre de lignes dans le jeu de résultat qui provient de la requête de sélection.


