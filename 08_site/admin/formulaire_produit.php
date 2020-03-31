<?php
require_once '../inc/init.php';
// 1 - on vérifie que le membre est bien admin, on le renvoie vers la page de connexion
if(!estAdmin()){ //s'il n'est pas Administrateur
    header('location:../connexion.php'); //on redirige le membre vers la page de connexion
    exit();
}// 4 - Insertion du produit en BDD /
// debug($_POST);
if(!empty($_POST)){ //Si le formulaire a été envoyé    // Ici faudrait faire 9 conditions pour vérifier que les champs du formulaire sont bien remplis.    $photo_bdd=''; // par défaut le champ sera vide en BDD    //  - traitement de la photo :
    debug($_FILES); // La superglobale $_FILES a un indive "photo" qui cirrespond au "name" de l'input type="files" du formulaire, ainsi qu'un indice "name" qui contient le nom di fichier en cours de téléchargement    if(!empty($_FILES['photo']['name'])){ // si le nom en cours de téléchargement n'est pas vide, alors c'est qu'on est en train de télécharger une photo        $photo_bdd = "photos/" . $_FILES['photo']['name']; // $photo_bdd contient le chemin relatif de la photo et sera enregistré en BDD. On utilise ce chemin pour les "src" des balises <img>.
        copy($_FILES['photo']['tmp_name'], "../" . $photo_bdd); // on enregistre le fichier pgoto qui se trouve = l'adresse contenu dans $_FILES['photo']['tmp_name'] vers la destination qui est le dossier 'photos, à l'adresse "../photos/nom_du_fichier.jpg".
    }    // requête d'insertion en BDD :
    $requete = executeRequete("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)", array(
        ':reference' => $_POST['reference'],
        ':categorie' => $_POST['categorie'],
        ':titre' => $_POST['titre'],
        ':description' => $_POST['description'],
        ':couleur' => $_POST['couleur'],
        ':taille' => $_POST['taille'],
        ':public' => $_POST['public'],
        ':photo' => $photo_bdd, // attention la photo ne vient pas de $_POST mais de $_FILES
        ':prix' => $_POST['prix'],
        ':stock' => $_POST['stock'],
    ));
if($requete){ // Si executeRequete retourne un objet PDOStatement(donc évalué à true implicitement), alors c'est que la requête à marché
    $contenu .= '<div class="alert alert-success">Le produit était enregistré.</div>';
} else { $contenu.= '<div class="alert alert-danger"> Erreur lors de l\'enregistrement...</div>';
}

//fin du if (!empty($_POST))require_once '../inc/header.php';
// 2 - onglets de navigation entre gestion-boutique et formulaire-produit :
?>
<h1 class="mt-4">Gestion de ma Boutique</h1>
<ul class="nav nav-tabs">
<li><a href="gestion_boutique.php" class="nav-link active">Affichage des produits</a></li>
<li><a href="formulaire_produit.php" class="nav-link">Formulaire des produits</a></li>
</ul>
<?php
echo $contenu; // pour afficher la table HTML des tous les produits
?>
<h2>Ajout des Produits</h2>
<form action="" method="post" enctype="multipart/form-data"><!-- l'attribut enctype spécifie que le formulaire envoie des fichiers en plus des données
    // 'text' permet de télécharger un fichier (photo) --><div>
    <div><label form="reference">Réference</label></div>
    <div><input type="text" name="reference" id="reference"> </div>
</div>
<div>
    <div><label form="categorie">Categorie</label></div>
    <div><input type="text" name="categorie" id="categorie"> </div>
</div>
<div>
    <div><label form="titre">Titre</label></div>
    <div><input type="text" name="titre" id="titre"> </div>
</div>
<div>
    <div><label form="description">Description</label></div>
    <div><input type="text" name="description" id="description"> </div>
</div>
<div>
    <div><label form="couleur">Coleur</label></div>
    <div><input type="text" name="couleur" id="couleur"> </div>
</div>
<div>
    <select name="taille">
        <option>S</option> <!-- en m'absence de l'attribut value, on envoie la valeur entre les <option> dans le $_POST -->
        <option>M</option>
        <option>L</option>
        <option>XL</option>
    </select>
</div>
<div>
    <div><label form="public">Public</label></div>
    <div>
        <input type="radio" name="public" value="m" checked>Masculin
        <input type="radio" name="public" value="f">Féminin<!-- attention (les valeurs des attributs "value" sont les mêmes que celles des enum() du champ correspondant en BDD)-->
        <input type="radio" name="public" value="mixte">Mixte
    </div>
</div>
<div>
<div>
    <label for="photo">Photo</label></div>
    <div><input type="file" name="photo" id="photo">  </div> <!-- attention pour pouvoir utiliser le type="file" il ne faut pas oublier l'attribut enctype--></div>
<div>
    <div><label form="prix">Prix</label></div>
    <div><input type="text" name="prix" id="prix"> </div>
</div>
<div>
    <div><label form="stock">Stock</label></div>
    <div><input type="text" name="stock" id="stock"> </div>
</div>
<div>
    <div><input type="submit" value="s'inscrire" class="btn btn-info"></div>
</div><?php
require_once '../inc/footer.php';

