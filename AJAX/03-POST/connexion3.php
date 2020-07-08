<?php

// Ce fichier sera inclus au début de tous les scripts du site.
?>

<!--    <pre>
        CREATE TABLE membre (
        id_membre INT(3) NOT NULL AUTO_INCREMENT,
        pseudo VARCHAR(50) DEFAULT NULL,
        mdp VARCHAR(255) DEFAULT NULL,
        PRIMARY KEY (id_membre)
        ) ENGINE=InnoDB ;
        </pre>  -->

<!--    INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `statut`) VALUES
        (1, 'Tintin', 'Milou', 1); -->

<?php

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=forum', 
			   'root', // pseudo
			   'root', // mamp 
			   array(
			       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
			       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));
              

// Variable pour afficher du HTML :
$contenu = ''; // on se sert de cette variable partout sur le site.              
?>

<?php
print_r($_POST); // pour vérifier que l'on reçoit les données.

if(!empty($_POST)){ // si $_POST n'est pas vide, c'est qu'il est rempli, donc que le formulaire a été envoyé. Notez qu'en l'état, on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alors des strings vides.
    echo '<p> pseudo : ' . $_POST['pseudo'] . '</p>';
    echo '<p> mdp : ' . $_POST['mdp'] . '</p>';
}
foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur);
		}
$query = $pdo->prepare('INSERT INTO membre (pseudo, mdp) VALUES(:pseudo, :mdp)');
		$query->bindParam(':pseudo', $_POST['pseudo']);
        $query->bindParam(':mdp', $_POST['mdp']);
        
        $succes = $query->execute(array(
				':pseudo'          => $_POST['pseudo'],
                ':mdp'             => $_POST['mdp'],
        ));
    
        		if ($succes) {
			$contenu .= '<div>Le membre a été enregistré avec succès<div>';
		} else {
			$contenu .= '<div>Erreur lors de l\'enregistrement<div>';
        }
        
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si existe "action" dans l'URL et que sa valeur est "deconnexion" c'est que le membre veut se déconnecter

	unset($_SESSION['membre']); // on supprime l'indice "membre" de la session pour déconnecter le membre
	$message = '<div class="alert alert-info">Vous êtes connecté.</div>';
}


	// Validation du formulaire :
	if (empty($_POST['pseudo']) || empty($_POST['mdp'])) { // si le champ pseudo est vide ou le champ mdp est vide
		$contenu .= '<div class="alert alert-danger">Veuillez remplir tous les champs</div>';
	}

	// S'il n'y a pas d'erreur sur le formulaire, on vérifie le pseudo et le mdp :
	if (empty($contenu)) {  // si vide c'est qu'il n'y a pas d'erreur

		// Requête en BDD des informations du membre pour le pseudo fourni par l'internaute :
		$resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo']));

		if ($resultat->rowCount() == 1) { // s'il y a 1 ligne dans la requête c'est que le pseudo est en BDD

			$membre = $resultat->fetch(PDO::FETCH_ASSOC);  // on fetch l'objet $resultat en un tableau associatif qui contient toutes les informations du membre.

			debug($membre);
			debug(password_verify($_POST['mdp'], $membre['mdp']));
			if (password_verify($_POST['mdp'], $membre['mdp'])) { // si le hash du mdp de la BDD correspond au mdp du formulaire, alors password_verify retourne true
				$_SESSION['membre'] = $membre; // nous créons une session avec les infos du membre provenant de la BDD.  

			} else { // s'il y a erreur sur le mdp
				$contenu .= '<div class="alert alert-danger">Erreur sur les identifiants.</div>';
            }
            
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur sur les identifiants.</div>';
            } 

	} // fin du if (empty($contenu))


?>
<style>
h1 {
    color: #404040;
    border: 1px solid rgb(55, 52, 52);
    box-shadow: 4px 6px 2px 1px rgba(87, 84, 76, 0.2);
    width: 160px;
    padding: 25px;
    margin-left: 10px;
}

p {
    color: black;
    font-family: fantasy;
    font-size: 15px;
}

#pseudo {
    margin-top: 5px;
}

input {
    box-shadow: 4px 6px 2px 1px rgba(107, 103, 93, 0.16);
    padding: 8px;
    background-color: #f5eded;
    border: 1px solid #3e3838;
}

.input-submit:hover {
    background-color: maroon;
    box-shadow: 8px 8px 12px #aaa;
    color: white;
}

input#prenom {
    padding-left: 42px;
}

.bouton {
    margin-left: 100px;
}

.bouton:hover {
    color: lightgrey;
}

body {
    background-color: #ff60005e;
}

.alert.alert-danger {
    width: 235px;
    color: #fb0808;
    background-color: #d6d8d9;
    border: 1px solid #b09891;
    margin-top: 2px;
    padding-left: 5px;
    box-shadow: 4px 6px 2px 1px rgba(87, 84, 76, 0.2);
    font-size: 1.1rem;
}

.btn.btn-info:hover {
    background-color: maroon;
    box-shadow: 8px 8px 12px #aaa;
    color: white;
}

.btn.bg-white {
    box-shadow: 8px 8px 12px #aaa;
}

label {
    color: maroon;
    font-family: fantasy;
}

strong {
    color: black;
}
</style>

<h1>Connexion 3</h1>
<form method="post" action="">

    <!-- un formulaire doit toujours être dans une balise <form> pour fonctionner. L'attribut method indique comment les données vont circuler vers le PHP. L'attribut action indique l'URL de destination des données (vide elles vont vers le même script). -->

    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <!-- il ne faut pas oublier les "name" sur les formulaires : ils constituent les indices de $_POST qui réceptionne les données.-->
    </div>
    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
    </div>
    <br>
    <div>
        <div class="bouton">
            <input type="submit" value="Envoyer" class="btn btn-info">
        </div>
    </div>
</form>









<?php

if (!empty($_POST)) {   // si le formulaire a été envoyé, $_POST n'est pas vide
	
	// Validation du formulaire :
	if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) { 
	}

	if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) { 
		
	}

	// S'il n'y a pas d'erreur sur le formulaire, on vérifie que le pseudo est disponible puis on insère le membre en BDD :
	if (empty($contenu)) {   // si la variable est vide, c'est qu'il n'y a pas d'erreur sur le formulaire

		// On sélectionne le pseudo en BDD :
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", 
						          array(':pseudo' => $_POST['pseudo']));		

		if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
			$contenu .= '<div class="alert alert-danger">Le pseudo est indisponible. Veuillez en choisir un autre.</div>';
		} else { // sinon on inscrit le membre en BDD

			$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // cette fonction prédéfinie permet de hasher le mot de passe selon l'algorithme actuel "bcrypt". Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'internaute.

			$succes = executeRequete("INSERT INTO membre (pseudo, mdp, statut) 
				VALUES (:pseudo, :mdp, 0)", 
				array(
					':pseudo'      => $_POST['pseudo'],	
					':mdp'         => $mdp,   // on prend le mdp hashé	
						
				));

			if ($succes) {
				$contenu .= '<div class="alert alert-success">Vous êtes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter.</a></div>';	
			} else {
				$contenu .= '<div class="alert alert-danger">Erreur lors de l\'enregistrement. Veuillez réessayer ultérieurement.</div>';
            }
            
        }

	} // fin du if (empty($contenu))

} // fin du if (!empty($_POST))

?>
<h1 class="mt-4">Inscription</h1>
<?php
echo $contenu;   // pour afficher les messages
?>
<form method="post" action="">
    <div><br>
        <div><label for="pseudo">Pseudo</label></div>
        <div><input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>"></div>
    </div>
    <br>
    <div>
        <div><label for="mdp">Mot de passe</label></div>
        <div><input type="password" name="mdp" id="mdp"></div>
    </div>
    <br>
    <div><input type="submit" value="S'inscrire" class="btn btn-info"></div>

</form>