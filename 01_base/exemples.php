<style>
input {
    color: purple;
}

a {
    font-family: fantasy;
    color: blue;
    padding-left: 5px;
}

form#mainForm {
    border: 1px solid grey;
    width: 200px;
    background-color: lightgrey;
}
</style>
<?php
// Comment calculer l’âge à partir de la date de naissance en PHP

    $dateNaissance = "15-06-1995";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
    echo 'Votre age est '.$diff->format('%y');
?>
<hr>
<?php
echo '<br>';
// Génération d'une liste déroulante d'années avec boucle for
  // Variable qui ajoutera l'attribut selected de la liste déroulante
  $selected = '';
 
  // Parcours du tableau
  echo '<select name="annees">';
  for($i=1970; $i<=2030; $i++)
  {
    // L'année est-elle l'année courante ?
    if($i == date('Y'))
    {
      $selected = ' selected="selected"';
    }
    // Affichage de la ligne
    echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>';
    // Remise à zéro de $selected
    $selected='';
  }
  echo '</select>';
?>

<hr>

<?php
//Génération d'une liste déroulante de couleurs avec boucle foreach

  // Définition du tableau de couleurs
  $arrayCouleurs = array(
 
    '#ff9900' => 'orange',
    '#00ff00' => 'vert',
    '#ff0000' => 'rouge',
    '#ff00ff' => 'violet',
    '#0000ff' => 'bleu',
    '#000000' => 'noir',
    '#ffffff' => 'blanc',
    '#ffff00' => 'jaune'
  );
  // Variable qui ajoutera l'attribut selected de la liste déroulante
  $selected = '';
 
  // Parcours du tableau
  echo '<select name="couleurs">',"n";
  foreach($arrayCouleurs as $valeurHexadecimale => $nomCouleur)
  {
    // Test de la couleur
    if($nomCouleur === 'rouge')
    {
      $selected = ' selected="selected"';
    }
    // Affichage de la ligne
    echo '<option value="', $valeurHexadecimale ,'"', $selected ,'>', $nomCouleur ,'</option>';
    // Remise à zéro de $selected
    $selected='';
  }
  echo '</select>';
?>
<hr>
<?php
    echo '<br>';
          $aTab = array (
            'Sélectionnez l\'article' => array (''),
            'Taille Small' => array ('1 euro'),
            'Taille Medium' => array ('2 euros'),
            'Taille Intermediate' => array ('3 euros'),
            'Taille Large' => array ('4 euros'),
            'Taille Extra Large' => array ('5 euros'),
            );
?>
<form method="post" id="mainForm">
    <select name="liste1" onchange="document.getElementById('mainForm').submit();">
        <?php
          foreach ($aTab as $clef => $dump)
          {
            $selected=(isset($_POST['liste1']) && $_POST['liste1'] == $clef);
           // tu doit spécifier l'attribute value à ta balise option
            echo '<option value="'.$dump[0].'">',$clef,'</option>';
          }
         ?>
    </select>
    <?php
         if (isset ($_POST['liste1']) && !empty ($_POST['liste1']))
         {
        //tu récupère la valeur sélectionnée
           echo $_POST['liste1'];
         }
        ?>
</form>
<?php
?>
<hr>
<?php $notes = array ('do' => 'C', 'ré' => 'D', 'mi' => 'E', 'fa' => 'F', 'sol' => 'G', 'la' => 'A', 'si' => 'B'); ?>
<form method="GET">
    <select name="note">
        <?php foreach($notes as $k => $val) { ?>
        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
        <?php } ?>
    </select>
    <input name="Submit" type="submit" value="Submit">
</form>
<?php
if (isset($_GET['Submit'])) {
        echo '<a> La notation américaine pour la note '   . $_GET["note"] . ' est </a>'   . $notes[$_GET["note"]];
}
?>
<hr>
<?php 
    echo '<br>';
      $date1 = "2010-01-15";
      $date2 = "2020-12-14";  
      if ($date1 < $date2) 
        echo "$date1 est inférieur à $date2"; 
      else
        echo "$date1 est supérieur à $date2";
    ?>
<hr>
<form method="post" action="traitement.php">
    <select name="region" id="region">
        <optgroup label="Région">
            <option value="ile_de_france">Ile de France</option>
            <option value="bretagne">Bretagne</option>
            <option value="normandie">Normandie</option>
            <option value="corse">Corse</option>
        </optgroup>
    </select>
</form>
<hr>
<select>
    <option>1</option>
    <option selected="selected">2</option>
    <option>3</option>
</select>
<hr>
<form action="/action_page.php">
    <select required>
        <option value="">None</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </select>
    <input type="submit">
</form>
<hr>
<select>
    <option>1</option>
    <option selected disabled>2</option>
    <option>3</option>
</select>
<hr>
<?php
            $ages = ['Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21];
            
            /*Identique à
             *$ages = array('Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21);
             */
            
            $mails['Mathilde'] = 'math@gmail.com';
            $mails['Pierre'] = 'pierre.giraud@edhec.com';
            $mails['Amandine'] = 'amandine@lp.fr';
            
            foreach($ages as $clef => $valeur){
                echo $clef. ' a ' .$valeur. ' ans<br>';
            }
        ?>
<hr>
<?php
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux numérotés*/
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux associatifs et une valeur simple*/
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
                'Florian'
            ];
            
            /*Tableau multidimensionnel associatif stockant
             *des tableaux associatifs*/
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            
            //$sous_suite = [1, 2, 4, 8, 16]
            $sous_suite = $suite[0];
            echo $sous_suite[0]. '<br>'.$sous_suite[2]. '<br>';
            
            //$sous_util = ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr']
            $sous_util = $utilisateurs[2];
            echo $sous_util['nom']. '<br>';
            
            //$sous_produits = ['poids' => 200, 'quantite' => 10, 'prix' => 15]
            $sous_produits = $produits['Livre'];
            echo $sous_produits['prix'];
        ?>
<hr>
<?php
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux numérotés*/
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux associatifs et une valeur simple*/
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
                'Florian'
            ];
            
            /*Tableau multidimensionnel associatif stockant
             *des tableaux associatifs*/
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            
            echo $suite[0][0]. '<br>'.$suite[0][2]. '<br>';
            echo $utilisateurs[2]['nom']. '<br>';
            //Affichage d'une valeur simple contenue directement dans $utilisateurs
            echo $utilisateurs[3]. '<br>';
            echo $produits['Livre']['prix'];
        ?>
<hr>
<?php
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
            ];
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            foreach ($suite as $suitenb => $n){
                echo 'Suite ' .($suitenb + 1). ' : ';
                foreach($n as $ni => $nn){
                    echo $nn. ', ';
                }
                echo '<br><br>';
            }
            foreach($utilisateurs as $nb => $infos){
                echo 'Utilisateur n°' .($nb + 1). ' :<br>';
                foreach ($infos as $c => $v){
                    echo $c. ' : ' .$v. '<br>';
                }
                echo '<br>';
            }
            foreach ($produits as $clef => $produit){
                echo 'Produit : ' .$clef. '<br>';
                foreach($produit as $caracteristique => $valeur){
                    echo $caracteristique. ' : ' .$valeur. '<br>';
                }
                echo '<br>';
            }
        ?>
<hr>
<?php       
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            
            $d1 = '25-01-2019';
            $d2 = '30-June 2018';
            $tmstp1 = strtotime($d1);
            $tmstp2 = strtotime($d2);
            
            $dfr1 = strftime('%A %d %B %Y', $tmstp1);
            $dfr2 = strftime('%A %d %B %Y', $tmstp2);
            
            if($tmstp1 < $tmstp2){
                echo 'Le ' .$dfr1. ' est avant le ' .$dfr2;
            }elseif($tmstp1 == $tmstp2){
                echo 'Les deux dates sont les mêmes';
            }else{
                 echo 'Le ' .$dfr2. ' est avant le ' .$dfr1;
            }
        ?>
<hr>
<?php
$array = array( 'premier' => 'N° 1', 'deuxieme' => 'N° 2', 'troisieme' => 'N° 3');

foreach( $array as $value ) // on parcourt $array, la valeur de l'item courant est copiée dans $value
  echo $value . '<br />'; // affichage
?>
<hr>

<?php
$array = array( 'premier' => 'N° 1', 'deuxieme' => 'N° 2', 'troisieme' => 'N° 3');

foreach( $array as $key => $value )
  echo 'Cet élément a pour clé "' . $key . '" et pour valeur "' . $value . '"<br />';
?>
<hr>

<?php
$array = array( 'fruits' => array( 'pommes', 'tomates', 'abricots' ),
                'animaux' => array( 'chats', 'chiens' ),
                'pays' => array( 'Suisse', 'France', 'Angleterre' ) );

foreach( $array as $key => $value )
{
  echo $key . ': <br />';
 
  foreach( $value as $valeur )
    echo '  ' . $valeur . '<br />';
   
  echo '<br />';
}
?>
<hr>
<form>
    <SELECT name="nom" size="1">
        <OPTION>lundi
        <OPTION>mardi
        <OPTION>mercredi
        <OPTION>jeudi
        <OPTION>vendredi
    </SELECT>
</form>
<hr>
<form>
    <SELECT name="nom" size="1">
        <OPTION>lundi
        <OPTION>mardi
        <OPTION selected>mercredi
        <OPTION>jeudi
        <OPTION>vendredi
    </SELECT>
</form>
<hr>
<form>
    <INPUT type="radio" name="tarif" value="jour"> tarif de jour
    <INPUT type="radio" name="tarif" value="nuit"> tarif de nuit
    <INPUT type="radio" name="tarif" value="week-end"> tarif de week-end
</form>
<hr>
<form>
    <INPUT type="checkbox" name="choix1" value="1"> glace vanille
    <INPUT type="checkbox" name="choix2" value="2"> chantilly
    <INPUT type="checkbox" name="choix3" value="3"> chocolat chaud
    <INPUT type="checkbox" name="choix4" value="4"> biscuit
    <INPUT type="checkbox" name="choix5" value="5"> café gourmand
</form>

<hr>
<form>
    <INPUT TYPE="submit" NAME="nom" VALUE=" Envoyer ">
</form>
<hr>
<form>
    <INPUT TYPE="reset" NAME="nom" VALUE=" Annuler ">
</form>
<hr>
<!--     <form action="https://fr.wikipedia.org/wiki/James_Bond" method="get">  -->
<form action="https://fr.wikipedia.org/wiki/Mission_impossible_(s%C3%A9rie_de_films)" method="get">
    <select name="annee">
        <option>choisissez une année</option>
        <!-- <option value="2005">choix 1 Bond</option> -->
        <option value="2010">Mission impossible</option>

    </select>
    <!-- <input type="submit" name="submit" value="2005" a href="https://fr.wikipedia.org/wiki/James_Bond"> -->
    <input type="submit" name="submit" value="2010" a
        href="https://fr.wikipedia.org/wiki/Mission_impossible_(s%C3%A9rie_de_films)">
</form>

<hr>

<?php

$comptage = 0;
$donnees = array();
$donnees[] = 'John';
$donnees[] = 'Peter';
$donnees[] = 'Jack';
$donnees[] = 'Jude';
$donnees[] = 'Matthew';
$donnees[] = 'Kirk';
$comptage += count($donnees);
echo $comptage;
// le résultat est 6 puisqu'il compte 6 prénoms 