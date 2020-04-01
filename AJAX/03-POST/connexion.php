<?php
// print_r($_POST);

// Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=forum', 
			   'root', 
			   'root',     
			   array(
			       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
			       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	          ));


if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) { // si les deux champs sont remplis
	// On échappe les données :
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['mdp'] = htmlspecialchars($_POST['mdp']);
	
	$requete = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp");
	$requete->execute(array(
		':pseudo' => $_POST['pseudo'], // on associe les marqueurs à leur valeur
		':mdp'    => $_POST['mdp']
	));

	if ($requete->rowCount() != 0) {
		// le pseudo ET le mdp existe pour 1 membre :
		$retour = '<span style="color: #4e4a4a">Vous êtes connecté.</span>';

	} else {
		// erreur sur les identifiants car il n'y a pas de membre avec le pseudo et le mdp donnés par l'internaute :
		$retour = '<span style="color: blue">Erreur sur les identifiants.</span>';
	}

} else { // sinon si l'un des champs est vide
	$retour = '<span style="color: red">Veuillez remplir tous les champs.</span>';
	
}	
echo $retour;