<?php
/*  
********************************************************************************
                  Créer un répertoire de contacts avec photo
********************************************************************************

	
	1- Créer une base de données "repertoire" avec une table "contact" :
	  id_contact PK AI INT
	  nom VARCHAR(50)
	  prenom VARCHAR(50)
	  telephone VARCHAR(10)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')
	  photo VARCHAR(255)

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. 
	   Le champ type_contact doit être géré via un "select option".
	   On doit pouvoir uploader une photo par le formulaire. 
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   Si une photo est uploadée, le type du fichier doit être png ou jpg ou jpeg.
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les infos du contact dans la BDD et afficher un message en cas de succès ou en cas d'échec.

    5- Ajouter la photo du contact en BDD et uploader le fichier sur le serveur de votre site.
    ------------
    Son nom est contact_155555555.jpg où 155555555 correspond au timestamp.

*/

debug($_POST);

$contenu = '';

function debug($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=repertoire',
               'root',
               'root',
               array(
                    PDO::ATTR_ERRMODE => PDO ::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
               )
);

if (!empty($_POST)) {
	// Validation du formulaire :
	if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 50) {
		$contenu .= '<div class="alert alert-danger">Le nom doit contenir entre 2 et 50 caractères</div>';
	}

	if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 50) {
		$contenu .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 50 caractères</div>';
	}

	if (!isset($_POST['telephone']) || !preg_match('#^[0-9]{10}$#', $_POST['telephone'])) {
		$contenu .= '<div class="alert alert-danger">Le téléphone doit être valide</div>';
	}

	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contenu .= '<div class="alert alert-danger">L\'email n\'est pas valide</div>';
	}
	
	if (empty($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre')) {
        $contenu .= '<div class="alert alert-danger">Le contact n\'est pas valide</div>';
	}
    
    $photo_bdd = '';

    if (!empty($_FILES['photo']['name'])) {
        $photo_bdd = 'photos/' . $_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], $photo_bdd);
    }
}

if(empty($contenu)) {

    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);

    $resultat = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, email, type_contact, photo) VALUES (:nom, :prenom, :telephone, :email, :type_contact, :photo)");
    $resultat->execute(array(
        ':nom'            => $_POST['nom'],
        ':prenom'         => $_POST['prenom'],
        ':telephone'      => $_POST['telephone'],
        ':email'          => $_POST['email'],
        ':type_contact'   => $_POST['type_contact'],
        ':photo'          => $photo_bdd
    ));

    if ($resultat) {
        $contenu .= '<div class="alert alert-primary">Vous êtes inscrit</div>';
    }
    else {
        $contenu .= '<div class="alert alert-primary">Erreur lors de l\'enregistrement. Veuillez réessayer ultérieurement</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Formulaire</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    
    <h1>Formulaire</h1>

    <?php

    echo $contenu;

    ?>

    <form method="post" action="" enctype="multipart/form-data">

        <div>
            <div><label for="nom">Nom</label></div>
            <div><input type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? ''; ?>"></div>
        </div>
        <div>
            <div><label for="prenom">Prénom</label></div>
            <div><input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>"></div>
        </div>
        <div>
            <div><label for="telephone">Téléphone</label></div>
            <div><input type="text" name="telephone" id="telephone" value="<?php echo $_POST['telephone'] ?? ''; ?>"></div>
        </div>
        <div>
            <div><label for="email">Email</label></div>
            <div><input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>"></div>
        </div>
        <div>
            <div><label>Contact</label></div>
            <div>
                <select name="type_contact" id="">
                    <option>ami</option>
                    <option>famille</option>
                    <option>professionnel</option>
                    <option>autre</option>
                </select>
            </div>
        </div>
        <div>
            <div><label for="photo">Photo</label></div>
            <div><input type="file" name="photo" id="photo"></div>
        </div>
        <div><input type="submit" value="Enregistrer" class="btn btn-primary mt-4"></div>

    </form>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>