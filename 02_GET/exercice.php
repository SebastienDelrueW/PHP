<style>
h1 {
    color: blue;
    border: 1px solid rgb(55, 52, 52);
    box-shadow: 8px 12px 2px 1px rgba(87, 84, 76, 0.2);
    width: 200px;
}
</style>
<?php
// Exercice :
/*
1- Vous affichez dans cette page un titre "Mon compte", un nom et un prénom.
2- Vous y ajoutez un lien "modifier mon compte". Ce lien envoie dans l'URL à la même page que l'action demandée est "modifiable" quand on clique sur le lien.
3- Si vous avez reçu une action "modification" par l'URL, alors vous affichez "Vous avez demandé la modification de votre compte.".
*/
?>

<h1> Mon compte </h1>
<p> John </p>
<p> Doe </p>
<a href="http://localhost/PHP/02_GET/exercice.php"> Modifier mon compte </a>

<?php

echo '<h1> Mon compte </h1>';
echo '<p> John </p>';
echo '<p> Doe </p>';
echo '<a href="http://localhost/PHP/02_GET/exercice.php"> '. 'Modifier mon compte </a>';

?>
<?php
// correction
?>

<h1> Mon compte </h1>
<p>Nom : John </p>
<p>Prénon : Doe</p>
<a href="exercice.php?action=modification"> Modifier mon compte </a>
<!-- <a href="?action=modification"> Modifier mon compte </a> quand on envoie les données en GET à la même page, on peut commencer directement par le "?". -->
<br>
<a href="exercice.php?action=suppression"> Supprimer mon compte </a>
<?php

print_r($_GET); 

if (isset($_GET['action']) && $_GET['action'] == 'modification'){ // si existe "action" dans $_GET, donc dans l'URL, et que dans le même temps sa valeur est égale à "modification" alors on affiche la phrase suivante :
  echo '<p>Vous avez demandé la modification de votre compte.</p>';
}

if (isset($_GET['action']) && $_GET['action'] == 'suppression'){ // si on a cliqué sur "suppression" alors on affiche la phrase suivate :
  echo '<p>Vous avez demandé la suppression de votre compte.</p>';
}