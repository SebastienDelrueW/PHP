<?php
require_once '../inc/init.php'; // attention au ../

// 1- on vérifie que le membre est bien admin, sinon on le renvoie vers la page de connexion :
if (!estAdmin()) { // s'il n'est pas administrateur
	header('location:../connexion.php'); // on redirige le membre vers la page de connexion	
	exit();
}

require_once '../inc/header.php';
// 2- onglets de navigation entre gestion_boutique et formulaire_produit :
?>
	<h1 class="mt-4">Gestion de la boutique</h1>

	<ul class="nav nav-tabs">
		<li><a href="gestion_boutique.php" class="nav-link active">Affichage des produits</a></li>
		<li><a href="formulaire_produit.php" class="nav-link">Formulaire produit</a></li>
	</ul>


<?php
echo $contenu;  // pour afficher la table HTML de tous les produits

require_once '../inc/footer.php';
