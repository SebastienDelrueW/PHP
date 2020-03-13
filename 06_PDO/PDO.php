<?php

//--------------------------
//            PDO
//--------------------------

// L'extension PDO pour PHP Data Objets définit une interface qui permet d'exécuter des requêtes SQL dans du PHP.

function debug($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}


//------------------------
echo '<h2> 01. Connexion à la BDD </h2>';
//------------------------

$pdo = new PDO(
    'mysql:host=localhost;dbname=entreprise', // driver mysql (IBM, oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
    'root', // pseudo de la BDD
    '',     // mdp de la BDD utilisation de MAMP
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
    )
);

// $pdo ci-dessus est un objet qui représente la connexion à la BDD entreprise.

debug(get_class_methods($pdo)); // permet d'afficher la liste des méthodes présentes dans l'objet $pdo.

//------------------------
echo '<h2> 02. Faire des requêtes avec exec() </h2>';
//------------------------
// on va insérer un employé en BDD :

$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('John', 'Doe', 'm', 'informatique', '2020-03-09', 2000)");

//   INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('John', 'Doe', 'm', 'informatique', '2020-03-09', 2000)    // requête pour SQL.

/*

    La méthode exec() est utilisée pour faire des requêtes qui ne retournent pas de jeux de résultats : INSERT, UPDATE, DELETE.

    Valeur de retour : 
        Succès : indique le nombres de lignes affectées par la requête
        Echec  : false
*/

echo 'Nombre d\'enregistrements affectés par la requête : ' . $resultat . '<br>';

echo 'Dernier id généré en BDD : ' . $pdo->lastInsertId();

// Suprimer les John Doe de la BDD :

$resultat = $pdo->exec("DELETE FROM employes WHERE prenom = 'John' AND nom = 'Doe'");

//------------------------
echo '<h2> 03. Faire des requêtes avec query() </h2>';
//------------------------
// On va sélectionner les informations de l'employé Daniel :

$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'");

/* 
    Au contraire d'exec(), query() est utilisé pour faire des requêtes qui retournent un ou plusieurs résultats : SELECT. On peut aussi l'utiliser avec DELETE, UPDATE et INSERT.

    Valeur de retour :
        Succès : query() retourne un nouvel objet qui provient de la classe PDOStatement
        Echec : false
*/

debug($resultat); // dans cet objet $resultat, nous ne voyons pas des données concernant Daniel. Pourtant elles s'y trouvent. Pour y accéder nous devons utiliser une méthode de $resultat qui s'appelle fetch().

// On transforme l'objet $resultat avec cette méthode fetch() : 
$employe = $resultat->fetch(PDO::FETCH_ASSOC); // fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $resultat en un ARRAY associatif appelé ici $employé. On y trouve en indices le nom des champs de la requête SQL (on y a mis une * pour avoir tous les champs)

debug($employe);

echo '<a>Je suis ' . $employe['prenom'] . ' ' . $employe['nom'] . ' du service ' . $employe['service'] . '<br></a>';

/* Pour information, on peut mettre dans les () de fetch :
    PDO::FETCH_NUM            pour obtenir un tableau au indices numériques
    PDO::FETCH_OBJ            pour obtenir un dernier objet
    ou encore des () vides    pour obtenir un mélange de tableaux associatif et numérique
*/

// Exercice : afficher le service de l'employé dont l'id_employes est 417.

/* $resultat = $pdo->query(" SELECT * FROM employes WHERE id_employes = 417 ");

debug(417);

$employe[417] = $resultat->fetch(PDO::FETCH_NUM);

debug($employe[417]);

echo '<a>Je suis ' . 'Chloé' . ' Dubar' . ' du service ' . ' production ' . '<br></a>'; */

// correction

$resultat = $pdo->query(" SELECT * FROM employes WHERE id_employes = 417 ");

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);

debug($employe);

echo 'le service de l\'employé 417 est : ' . $employe['service'] . '<br>';

//------------------------
echo '<h2> 04. Faire des requêtes avec query() et plusieurs résultats </h2>';
//------------------------

$resultat = $pdo->query("SELECT * FROM employes");

debug($resultat);

echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>'; // cette méthode rowCount() permet de compter le nombre de lignes retournées par la requête (exemple : nombre de produits séléctionnés par l'internaute). 

?>
<br>
<hr>
<?php

// Comme nous avons plusieurs lignes dans $resultat, nous devons faire une boucle pour les parcourir :
while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) { // fetch() va chercher la ligne suivante du jeu de résultats à chaque tour de boucle, et le transforme en tableau associatif. La boucle while permet de faire avancer le curseur dans l'objet. Quand il arrive à la fin, fetch() retourne false et la boucle s'arrête.

    // debug($employe); // $employe est un array associatif qui contient les données de chaque employé 'nous avons 1 employé par tour de boucle).

    echo '<div>';
    echo '<div>' . $employe['id_employes'] . '</div>';
    echo '<div>' . $employe['prenom'] . ' ' . $employe['nom'] . '</div>';
    echo '<div>' . $employe['service'] . '</div>';
    echo '<div>' . $employe['salaire'] . '</div>';
    echo '</div><hr>';
}

// Si vous êtes certain que votre requête ne donne qu'un seul résultat (par identifiant par exemple), alors on ne fait pas de boucle.
// Si votre requête peut donner un ou plusieurs résultats, alors on fait une boucle (sinon on obtient que le premier résultat de la requête).

//------------------------
echo '<h2> 05. Exercice </h2>';
//------------------------
// Vous affichez la liste des différents services dans une liste <ul><li>, en mettant un service par <li>.

$resultat = $pdo->query(" SELECT DISTINCT service FROM employes ");

debug($resultat);

echo '<ul>';

while ($service = $resultat->fetch(PDO::FETCH_ASSOC)) {
    /*   debug($service); */

    echo '<li>' . $service['service'] . '</li>';
}

echo '</ul>';

//------------------------
echo '<h2> 06. Afficher les résultats de la requête dans une table HTML </h2>';
//------------------------
?>
<style>
    h2 {
        border-top: 1px solid navy;
        border-bottom: 1px solid navy;
        color: navy;

        background: rgba(226, 226, 226, 1);
        background: -moz-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(3%, rgba(226, 226, 226, 1)), color-stop(4%, rgba(227, 227, 227, 1)), color-stop(40%, rgba(254, 254, 254, 1)), color-stop(49%, rgba(254, 254, 254, 1)), color-stop(84%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(209, 209, 209, 1)));
        background: -webkit-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -o-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -ms-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: linear-gradient(to right, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#d1d1d1', GradientType=1);
    }

    a {
        color: black;
    }

    table,
    tr,
    td,
    th {
        border: 1px solid;
        color: #40474a;
    }

    strong {
        color: red;
    }

    td {
        text-align: center;
    }

    table {
        border-collapse: collapse;
        box-shadow: 8px 8px 12px #aaa;
    }
</style>

<?php
$resultat = $pdo->query("SELECT * FROM employes ORDER BY salaire ASC");

debug($resultat);

echo '<table>';
// La ligne des entêtes :
echo '<tr>';
echo '<th> <a>&nbsp;<strong>I</strong>D &nbsp; </a> </th>';
echo '<th> <a><strong>P</strong>rénom &nbsp; </a> </th>';
echo '<th> <a><strong>N</strong>om &nbsp; </a> </th>';
echo '<th> <a>&nbsp;<strong>S</strong>exe &nbsp; </a> </th>';
echo '<th> <a><strong>S</strong>ervice &nbsp; </a> </th>';
echo '<th> <a>&nbsp;<strong>D</strong>ate d\'embauche &nbsp; </a></th>';
echo '<th> <a>&nbsp;<strong>S</strong>alaire &nbsp;</a></th>';
echo '</tr>';

// Les lignes du tableau :
while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)) { // La boucle while avec le fetch permet de parcourir l'objet $resultat. On crée un tableau associatif $employe à chaque tour de boucle.
    echo '<tr>';
    /*   debug($employe); */
    foreach ($employe as $info) { // $employe étant un tableau, on peut le parcourir avec une foreach. La variable $info prend les valeurs sucessivement à chaque tour de boucle.
        echo  '<td>' . $info . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
// Quand on fait 1 tour de while, on fait à l'intérieur 7 tours de foreach pour parcourir 1 employé. Quand la while a parcouru la totalité de $resultat, alors fetch() retourne false et la while s'arrête.


//------------------------
echo '<h2> 07. Requêtes préparées </h2>';
//------------------------
// Les requêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phrases analyse / interprétation / exécution de la requête (gain de performance).

// Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL (ce que nous verrons dans un chapitre ultérieur).

$nom = 'sennard';

// Une requête préparée se réalise en trois étapes :
// 1- On prépare la requête :

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // prepare() permet de préparer la requête sans l'exécuter. Elle contient un marqueur :nom qui est vide et attend une valeur. $resultat est à cette ligne encore un objet PDOStatement.

// 2- On lie le marqueur à la variable $nom :
$resultat->bindParam(':nom', $nom); // bindParam() permet de lier le marqueur à la variable $nom. Notez que cette méthode ne reçoit qu'une variable. On ne  peut pas y mettre une valeur fixe comme "sennard" par exemple. Si vous avez besoin de lier le marqueur à une valeur fixe, alors il faut utiliser la méthode binValue(). Exemple :
$resultat->bindValue(':nom', 'sennard');


// 3- On exécute la requête :
$resultat->execute(); // permet d'executer toute la requête préparée avec prepare().

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC); // on ne fait pas de boucle ici car il n'y a qu'un seul Sennard.
debug($employe);
echo $employe['prenom'] . ' ' .  $employe['nom'] . ' du service ' . $employe['service'] . '<br>';

/*
    Valeurs de retour :
    prepare() retourne toujours un objet PDOStatement (jeu de résultat)

    execute() :
    Succès : true
    Echec  : false
*/

//------------------------
echo '<h2> 08. Requêtes préparées sans bindParam </h2>';
//------------------------

$resultat = $pdo->prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom"); // préparation de la requête

$resultat->execute(array(
                        ':nom'      => 'chevel',  
                        ':prenom'   => 'daniel'

)); // on peut se passer de bindParam() et associer les marqueurs à leur valeur directement dans un tableau passé en argument de execute().

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC); // pas de boucle car nous n'avons qu'1 seul Daniel Chevel.

debug($employe);

echo $employe['prenom'] .' '. $employe['nom'] . ' est du service ' . $employe['service'];


