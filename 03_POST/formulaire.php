<style>
  h1 {
        color:#404040;
        border: 1px solid rgb(55, 52, 52);
        box-shadow: 8px 12px 2px 1px rgba(87, 84, 76, 0.2);
        width: 160px;
        padding:25px;
        margin-left: 10px;
    }
    p{
        color:black;
        font-family: fantasy;
        font-size: 15px;
    }
    input{
       padding:10px; 
       background-color:lightgrey;
    }
    
    input#prenom{
        padding-left:42px;
    }

    .bouton{
        margin-left:100px;
    }

    .bouton:hover{
        color:lightgrey;
        
    }
</style>

<?php
//------------------------------
// La superglobale $_POST
//------------------------------
/*
    $_POST est une superglobale qi permet de récupérer les données saisies dans un formulaire.

    Comme il s'agit d'une superglobale, $_POST est donc un tableau (array), et il est disponible dans tous les contextes du script, y compris au sein des fonctions (pas besoin de faire "global $_POST").

Le tableau $_POST se remplit de la manière suivante :
$_POST = array(
    'name1' => 'valeur1';
    'nameN' => 'valeurN';
);
où name1 et nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.
*/

print_r($_POST); // pour vérifier que l'on reçoit les données.

if(!empty($_POST)){ // si $_POST n'est pas vide, c'est qu'il est rempli, donc que le formulaire a été envoyé. Notez qu'en l'état, on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alors des strings vides.
    echo '<p> Prénom : ' . $_POST['prenom'] . '</p>';
    echo '<p> Description : ' . $_POST['description'] . '</p>';
}


?>
<h1>Formulaire</h1>
<form method="post" action=""><!-- un formulaire doit toujours être dans une balise <form> pour fonctionner. L'attribut method indique comment les données vont circuler vers le PHP. L'attribut action indique l'URL de destination des données (vide elles vont vers le même script). -->

    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom"><!-- il ne faut pas oublier les "name" sur les formulaires : ils constituent les indices de $_POST qui réceptionne les données.-->
    </div>
    <br>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>
     <br>
    <div>
    <div class="bouton">
        <input type="submit" value="Envoyer">
    </div>
    </div>
</form>

