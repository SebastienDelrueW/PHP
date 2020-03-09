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
    color: grey;
    border: 1px solid black;

}
</style>
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
    '',     // mdp de la BDD
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

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 417 ");

debug($resultat);