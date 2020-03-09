<style>
h2 {
    border-top: 1px solid navy;
    border-bottom: 1px solid navy;
    color: navy;
}

a {
    color: blue;

}

b {
    color: white
}

span {
    color: red;
}

/* Exercice */

td {
    border: 1px solid grey;
}

table {
    border-collapse: collapse;
}

h3 {
    background: lightgrey;
    border: 1px solid grey;
    width: 105px;
    padding: 3px;
    margin-left: 3px;

}

p {
    background: lightblue;
    border: 1px solid grey;
    width: 105px;
    padding: 3px;
    margin-left: 3px;
}

select {
    color: black;
    font-size: 14px;
    font-family: fantasy;
    background-color: lightgrey;
    width: 150px;
    height: 25px;
    margin: 20px;
}

h2 {

    background: rgba(226, 226, 226, 1);
    background: -moz-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(3%, rgba(226, 226, 226, 1)), color-stop(4%, rgba(227, 227, 227, 1)), color-stop(40%, rgba(254, 254, 254, 1)), color-stop(49%, rgba(254, 254, 254, 1)), color-stop(84%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(209, 209, 209, 1)));
    background: -webkit-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
    background: -o-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
    background: -ms-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
    background: linear-gradient(to right, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#d1d1d1', GradientType=1);
}
</style>

<?php 
require_once 'function.php';
//-------------------------------
echo ' <h2> Les balises PHP </h2> ';
//-------------------------------
?>

<?php 
// pour ouvrir un passage en PHP on utilise la balise précédente 
// pour fermer un passage en PHP on utilise la balise suivante :
?>

<p>Bonjour</p>
<!-- en dehors des balises de PHP nous pouvons écrire du HTML dans un fichier ayant l'extension .php (ce n'est pas possible dans un fichier .html)-->

<?php
// vous n'êtes pas obligé de fermer un passage en PHP en fin de script

// pour faire un commentaire sur 1 seule ligne
#  pour faire un commentaire sur 1 seule ligne

/* 
pour faire
des commentaires
sur plusieurs lignes
*/

//-------------------------------
echo '<h2> Affichages </h2>';
//-------------------------------

echo 'Bonjour <br>'; // echo est une instruction qui permet d'effectuer un affichage. Nous pouvons y mettre du HTML. Toutes les instructions se terminent par un ";" en PHP.

print 'Nous sommes lundi <br>'; // est une autre instruction d'affichage

var_dump('code');
print_r('code'); // ces deux fonctions d'affichage permettent d'analyser dans le navigateur le contenu d'une variable par exemple (nous en verrons l'utilisation plus tard)


//-------------------------------
echo '<h2> Variables </h2>';
//-------------------------------
// Une variable est un espace mémoire qui porte un nom et qui permet de conserver une valeur. Cette valeur peut être de n'importe quel type.
// en PHP on représente une variable avec le signe "$".

$a = 127; // on déclare la varible $a et lui affecte la valeur 127
echo gettype($a); // gettype() est une fonction prédéfinie qi permet de voir le type d'une variable. ici il s'agit de integer (entier)
echo '<br>';

$a = 1.5;
echo gettype($a); // ici il s'agit d'un double (nombre à virgule)
echo'<br>';

$a = 'une chaine de caractère';
echo gettype($a); // ici il s'agit d'un string
echo '<br>';
$a = '127'; // un nombre écrit entre quotes ou guillemets est interprété comme un string.

$a = true; // ou false
echo gettype($a); // ici il s'agit d'un boolean (booléen)

// par convention un nom de variable commence par une minuscule, puis on met une majuscules à chaque mot. Il peut contenir des chiffres (jamais au début) ou un "_" (pas au début ni à la fin).
// Exemple : $maVariable1


//-------------------------------
echo '<h2> Concaténation </h2>';
//-------------------------------

// En PHP on concatène avec le ".".

$x ='Bonjour ';
$y ='tout le monde';
echo $x . $y . '<br>'; // on concatène les deux variables et le string avec le point que l'onn peut traduire par "suivi de".

//-------------
// Concaténation et affectation combinées avec l'oprérateur ".="
$prenom = 'Nicolas';
$prenom .= '-Marie'; // on ajoute la valeur "-Marie" à la valeur "Nicolas" SANS la remplacer grâce à l'opérateur ".="
echo $prenom . '<br>'; // affiche "Nicolas-Marie"


//-------------------------------
echo '<h2> Guillemets et quotes </h2>';
//-------------------------------
$message = "aujourd'hui";
$message = 'aujourd\'hui'; // on échappe les apostrophes quand on écrit dans les quotes simples avec \ (AltGr + 8)

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // dans les guillemets, la variable est évaluée : c'est son contenu qui est affiché.
echo '$txt tout le monde <br>';  // dans les quotes simples, $txt est considéré comme une chaîne de caractères brute : on affiche $txt littéralement.

//-------------------------------
echo '<h2> Constantes </h2>';
//-------------------------------
// Une constante permet de conserver une valeur sauf que celle-ci ne peut pas changer.C'est à dire qu'on ne pourra pas la modifier durant l'exécution du script. Utile par exemple pour conserver les paramètres de connexion à la BDD de façon certaine.

define('CAPITALE_FRANCE', 'Paris'); // par convention une constante s'écrit toujours en MAJUSCULES. Ici on déclare la constante CAPITALE_FRANCE à laquelle on affecte 'PARIS'.
echo CAPITALE_FRANCE . '<br>'; // affiche Paris

// Autre syntaxe pour déclarer une constante :
const TAUX_CONVERSION = 6.55957; // on peut aussi déclarer une constante avec le mot clé const.
echo TAUX_CONVERSION . '<br>'; // affiche 6.55957

// --------------------
// Exercice : Vous affichez bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables.


$t ='<a>Bleue</a>';

$u = '-Blanc';

$v = '<span>-Rouge</span>';

echo $t . $u . $v . '<br>';

// --------------------


echo "$t$u$v <br>";

// --------------------

$me = 'Bleue';
$me .= '-Blanc';
$me .= '-Rouge';
echo $me;


//-----------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
//-----------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>'; // 12

echo  $a - $b . '<br>';// 8 

echo  $a * $b . '<br>'; // 20

echo  $a / $b . '<br>'; // 5

echo  $a % $b . '<br>'; // 0 modulo = reste de la division entière. Exemple : 3 % 2 = 1 car si on a 3 billes réparties sur 2 personnes, il nous en reste 1.

//---------------

// Opération et affectation combinées :
$a = 10;
$b = 2;

$a += $b; // équivaut à $a = $a + $b soit $a = 10 + 2, $a vaut donc 12 au final.
$a -= $b; // équivaut à $a = $a - $b soit $a = 12 - 2, $a vaut donc 10 au final.
// on utilise ces opérateurs dans les paniers  d'achat par exemple.

// il existe aussi les opérateurs *= /= et%=

//-------------------
// Incrémenter et décrémenter :
$i = 0;
$i++; // on augmente $i de 1
$i--; // on diminue $i de 1 ($i vaut donc 0 ici)

//-----------------------------------------
echo '<h2> Les structures conditionnelles </h2>';
//-----------------------------------------

$a = 10;
$b = 5;
$c = 2;

// if.....else :
if($a > $b){ // si la condition est vraie,  c'est-à-dire que $a est supérieur à $b, alors on execute les accolades qui suivent :
    echo'$a est supérieur à $b <br>';
}   else{ // sinon si la condition est fausse, on execute le else :
    echo 'Non c\'est $b qui est supérieur ou égal à $a <br>';
}

// l'opérateur AND qui s'écrit &&
if ($a > $b && $b > $c){ // si  $a est supérieur à $b et que dans le même temps $b es supérieur à $c, alors on entre dans les accolades :
    echo 'OK pour les deux conditions <br>';
}

// l'opérateur OR qui s'écrit || (AltGr 6)
if ($a == 9 || $b > $c){ // si $a est égal (== pour comparer en valeur) à 9 OU alors $b est supérieur à $c, alors on execute les accolades qui suivent :
    echo 'ok pour au moins une des deux conditions <br>';
}   else { // sinon c'est que les 2 conditions sont fausses
    echo 'Les deux conditions sont fausses <br>';
}

// if ... elseif ... else :
if ($a == 8){
    echo 'réponse 1 : $a est égal à 8';
} elseif ($a != 10) { // sinon si $a est différent de 10 
    echo 'réponse 2 : $a est différent de 10';
} else { // sinon, si nous ne sommes pas entrés dans le if ni dans le elsif, on entre dans le else :
    echo 'réponse 3 : les 2 conditions précédentes sont fausses <br>';
}

//-----------------------
// La condition ternaire :
// La ternaire est une autre syntaxe pour écrire un if...else.
$a = 10;

echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>'; // dans la ternaire le "?" remplace le if, et le ":" remplace le else. Ainsi on dit : si $a est égal à 10, on affiche la première expression, sinon la seconde.

//-------------------
// Comaparaison avec == et  ====
$varA = 1; // integer
$varB = '1'; // string

 if ($varA == $varB){ // la condition est vraie car en valeur 1 et '1' sont équivalents
    echo '$varA est égal à $varB en valeur uniquement <br>';
 }

 if ($varA === $varB){ // la condition est fausse car 1 et '1' sont différents en type 
    echo '$varA est égal à $varB en valeur et en type (strictement égaux) <br>';
 } else {
    echo 'Les deux variables sont différents en valeur ou en type (pas strictement égales) <br>';
 }

 // Pour mémoire l'opérateur "=" est un signe d'affectation.

 //--------------
// isset() et empty() :
// Définitions :
// empty () vérifie si c'est vide : 0, '', NULL, false, non défini
// isset() vérifie si c'est défini, et non NULL

$var1 = 0;
$var2 = '';

 if (empty($var1)){
     echo '$var1 est vide (0, string vide, NULL, false ou non défini) <br>';
 }

 if (isset($var2)){
    echo '$var2 existe et est non NULL <br>';
 }

 // Différence entre isset et empty : si on supprime les déclarations des variables $var1 et $var2, empty() reste vraie car $var1 n'est pas définie. isset() devient fausse car $var2 n'est pas définie non plus.

 // Utilisation : empty() pour vérifier qu'un champ de formulaire est rempli. isset() pour vérifier l'existence d'une variable avant de l'utiliser.

 //-------------------------
 // L'opérateur NOT qui s'écrit "!" :
 $var3 = 'quelque chose'; 
 if (!empty($var3)) { // "!" pour not qui est une négation. Ainsi quand on a !TRUE cela revient à FALSE, et quand on a !FALSE cela revient à TRUE
    echo '$var3 n\'est pas vide <br>'; // ici on entre la condition, car $var3 n'est pas vide
 }

 //-----------------------
 // PHP7 : afficher une variable sous condition d'existence avec l'opérateur "??"

 echo $maVar ?? 'valeur par défaut'; // on affiche La variable de $maVar si elle existe, sinon on affiche le string qui suit.

 // Exemple d'utilisation : pour laisser les valeurs saisies dans un formulaire.

 
//-----------------------------------------
echo '<h2> switch </h2>';
//-----------------------------------------

// La condition switch est une autre syntaxe pour écrire un if.... elseif... else quand on veut comparer une variable à une miltitude de valeurs.

$langue ='chinois';

switch ($langue){
    case 'français' :  // on compare $langue à  la valeur des "case" et on exécute le code qui suit si elle correspond    
    echo 'bonjour !';
    break; // break est obligatoire pour quitter le switch une fois un "case" exécuté
case 'italien' :
        echo 'Ciao !';
    break;
case 'espagnol' :
        echo 'Hola !';
    break;
    default : // on tombe dans le cas par défaut si on ne tombe pas dans les "cases" précédentes
        echo 'Hello ! <br>';
break;
}

// Exercice : vous réécrivez ce switch avec des if... pour obtenir exactement le même résultat.

if($langue == 'français'){
    echo 'Bonjour';
} elseif($langue == 'italien'){
    echo 'Ciao';
} elseif($langue == 'espagnol'){
    echo 'hola';
} else{
    echo '<span>Hello !</span> <br>';
}


//-----------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
//-----------------------------------------
// Une fonction prédéfinies permet de réaliser un ntraitement spécifique prédéterminé dans le langage PHP.

//-----------
// strpos()
$email1 ='prenom@site.fr';
echo strpos($email1, '@'); // strpos() indique la position 6 du caractère '@' dans la chaîne de caractères $email1 (on compte à partir de 0)

echo '<br>';

$email2 = 'James';
echo strpos($email2, '@');
var_dump (strpos($email2, '@'));

// grâce au var_dump on aperçoit que la fonction retourne FALSE car le caractère "@" n'est pas trouvé dans $email2. Notez que quand on fait un echo de false, cela n'affiche rien dans le navigateur. var_dump est une instruction d'affichage améliorée que l'on utilise quand on développe, puis qu'on retire.

echo '<br>';

//----------
// strlen()
$phrase = 'mettez une phrase ici';
echo strlen($phrase); // strlen() permet de retourner la taille de la chaîne de caractères (nombre d'octets occupés, un caractère accentué valant 2 octets, et un espace 1 octet).

echo '<br>';

//---------
// substr()
$texte = 'Vous mettez ici un très long texte Vous mettez ici un très long texte Vous mettez ici un très long texte Vous mettez ici un très long texte';

echo substr($texte, 0, 30) . '....<a href="#"> lire la suite </a>'; // coupe un partie du texte, en partant de la position 0 ici et sur 30 octets.


// substr ( string $string , int $start [, int $length ] ) : string // https://www.php.net/manual/fr/function.substr.php

//-----------------------------------------
echo '<h2> Fonctions utilisateur </h2>';
//-----------------------------------------
// Des fonctions sont des morceaux de code écrits dans les accolades et portant un nom. On appelle une fonction au besoin pour exécuter le code qui s'y trouve.

// il est d'usage de créer des fonctions pour ne pas se répéter quand on veut exécuter plusieurs fois le même traitement. on parle alors de "factoriser" son code.

function separation(){ // on déclare une fonction avec le mot clé function suivi du nom de la fonction, et d'une paire de () qui acceuillerons des paramètres ultèrieuremnt.
    echo '<hr>';
}

separation(); // pour exécuter une fonction (donc le code qui s'y trouve), on l"appelle en écrivant son nom suivid'une paire de ()
separation();

//--------------
// Fonction avec paramètres et return :

function bonjour($prenom, $nom){// $prenom et  $nom sont les paramètres de notre fonction. Ils permettent de recevoir une valeur car il s'agit de variables de reception.
    return 'Bonjour ' . $prenom . ' ' . $nom . ' ! <br>' ; // return permet de sortir la phrase "Bonjour...." de la fonction  et de la renvoyer à l'endroit où la fonction est appelée.
}

echo bonjour('James', 'Bond'); // si la fonction attend des valeurs, il faut obligatoirement les lui donner, et dans le même orde que les paramètres . Ces valeurs s'appellent des arguments. Ici on met un echo car la fonction nous retourne la phrase mais ne l'affiche pas directement.

// On peut remplacer les arguments par des variables (provenant d'un formulaire par exemple) :
$prenom = 'Pierre';
$nom = 'Giraud';
echo bonjour($prenom, $nom);

$prenom = 'Michel';
$nom = 'Robert';
echo bonjour($prenom, $nom); // ici les deux arguments sont variables et peuvent recevoir n'importe quelle valeur.


$prenom = 'Jean';
$nom = 'd\'Ormesson';
echo bonjour($prenom, $nom);

// Exemple : vous écrivez une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel. Cette fonction retourne le résultat de la multiplication. Vous affichez le résultat.


function multiplication($chiffre1, $chiffre2){
     return 'la réponse de : ' . $chiffre1 . ' multiplié par ' . $chiffre2 . ' est ' . $chiffre1 * $chiffre2 . ' ! <br>' ;
}

$chiffre1 = 2;
$chiffre2 = 5;

echo multiplication($chiffre1, $chiffre2);

/* echo 'la réponse est ' . $a * $b . '<br>'; // 10 */

//-----------------------------------------
echo '<h2> Variable locale et variables globale </h2>';
//-----------------------------------------

//---------------
//Aller de l'espace local à l'espace globlal :
function jourSemaine(){
    $jour = 'mardi'; // ici nous nous trouvons dans l'espace local de la fonction. Cette variable est donc dite "locale". 
    return $jour;
}

// echo $jour; // on ne peut pas accéder à cette variable ici car elle n'est connue qu'a l'intérieur de la fonction jourSemaine().

echo jourSemaine(); // on récupère la valeur "mardi" grâce au return en fin de la fonction.


 echo '<br>';
//-----------------
// Aller de l'espace global vers l'espace local :
$pays = 'France'; // ici nous nous trouvons dans l'espace global. Cette variable est donc dite "globale".

function affichePays(){
    global $pays; // global permet d'aller chercher la variable $pays à l'exterieur de la fonction pour pouvoir l'exploiter à l'extérieur.
    echo $pays; // affiche France
}

affichePays();

//-----------------------------------------
echo '<h2> Structure intéractives : les boucles </h2>';
//-----------------------------------------
// Les boucles sont destinées à répéter du code de façon automatique.

// Boucle while :
$i = 0; // valeur de départ de la boucle 
while($i < 3){ // tant que $i est infèrieur à 3, on entre dans la boucle.
    echo $i .'-----'; // affiche "0----1----2-----".
    $i++; // on n'oublie pas d'incrémenter la variable $i pour que la condition d'entrée devienne "false" à un moment donné (évite les boucles infinies).
}
/*  
Exercice : à l'aide d'une boucle while, vous affichez les années de 1920 à 2020 dans menu déroulant. */


/*  echo '<select>';
    echo '<option> 1 </option>';
    echo '<option> 2 </option>';
    echo '<option> 3 </option>';
 echo '</select>'; */

 echo '<br>';

$annee = 1920; // point de départ de la boucle
echo '<select>';
    while($annee <= 2020){
        echo '<option>' . $annee . '</option>';
        $annee++;
    }
echo '</select>';


 echo '<br>';

$a = 2020; // point de départ de la boucle
echo '<select>';
    while($a > 1919){
        echo '<option>' . $a . '</option>';
        $a--;
    }
echo '</select>';


 echo '<br>';
//-------------------
// La boucle do while :
// la boucle do while a la particularité de s'exécuter au moins une fois , puis tant que la condition de fin est vraie.

$j = 0; // valeur de départ de la boucle

do {
    echo 'Je fais un tour de boucle <br>';
    $j++;
}while($j > 10); // La condition revoie false tout de suite, pourtant la boucle à bien touné une fois. Attention au ";" aprés le while.

 echo '<br>';

//----------------
// La boucle for :
// La boucle for est une autre syntaxe de la boucle while.

for ($i = 0; $i < 3; $i++){ // on trouve dans les () de la for : La valeur de départ; La condition d'entrée dans la boucle; La variation de $i (incrémentation, décrémentation...)
    echo $i . '------';
}

 echo '<br>';

for ($l = 0; $l < 15; $l+=5){ // on trouve dans les () de la for : La valeur de départ; La condition d'entrée dans la boucle; La variation de $i (incrémentation, décrémentation...)
    echo $l . '------';
}
// Exercice : vous affichez les mois de 1 à 12 à l'aide d'une boucle for dans le menu
?>
<form>
    <label>Mois de naisance </label>

    <select>
        <?php
        for($mois = 1; $mois <= 12; $mois++){
            echo '<option>' . $mois . '</option>';
        }
?>
    </select>

    <input type="submit">
</form>

<?php

// Exercice :
// - faire une boucle for qui affiche 0 à 9 sur la même ligne.
// - Puis vous compléter la boucle précédente , pour mettre les chiffres dans une table HTML. Vous y mettrez une bordure en CSS.

/* for ($i = 0; $i < 10; $i++){ // on trouve dans les () de la for : La valeur de départ; La condition d'entrée dans la boucle; La variation de $i (incrémentation, décrémentation...)
    echo $i . '';
} */

// correction 1 HTML et PHP
?>

<table>
    <tr>

        <?php
    for ($i = 0; $i < 10; $i++){ 
      /*   echo '<td>';
        echo $i . '';
        echo '<td>'; */
        echo '<td>' . $i . '</td>';
}  
?>
    </tr>
</table>

<?php
// correction 2 PHP //

echo '<table>';
    echo '<tr>';
        for ($i = 0; $i < 10; $i++){ 
            echo '<td>' . $i . '</td>';
        }
    echo '</tr>';
echo '</table>';


//---------------------------------------
echo '<h2> Les tableaux (array) </h2>';
//---------------------------------------
// Un tableau, appelé array en anglais, est une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elles possèdent un indice dont la numérotation commence à 0.

// Déclarer un array (méthode 1) :
$liste = array('Grégoire','Nathalie','Emilie','François','Georges'); // Les valeurs sont séparées par une virgule.

// echo $liste; // erreur de type "Array to string conversion" car on ne peut pas afficher directement un tableau.

echo '<pre>';
    var_dump($liste); // affiche  le contenu du tableau avec les types
echo '</pre>';

echo '<pre>';
        print_r($liste); // affiche  le contenu du tableau avec les types
echo '</pre>'; // <pre> est une balise HTML qui permet de formater le texte

// Pour notre besoin nous créons notre fonction personnelle d'affichage 
function debug($var){
    echo '<pre>';
        print_r($var);
    echo '</pre>';
}

debug($liste);

// Autre façon de déclarer un array (méthode 2) :
$tab = ['France','Italie','Espagne', 'Portugal'];
// Indices  0        1         2         3

echo $tab[1] . '<br>'; // Pour afficher une valeur du tableau , on écrit son indice dans une paire de crochets après le nom du tableau. Ici on affiche Italie.

// Ajouter une valeur à la fin d'un tableau :
$tab[] ='Suisse'; // Les crochets vides signifient qu'on ajoute à la fin du tableau $tab.

debug($tab); // pou vérifier que la valeur 'Suisse" est présente.

//---------------
// Les tableaux associatifs :
// Dans un tableau associatif nous pouvons choisir le nom des indices.
$couleur = array(
    'b' => 'bleu',
    'r' => 'rouge',
    'v' => 'vert'
);

// Pour afficher une valeur de notre tableau associatif :
echo 'La première couleur du tableau est ' . $couleur['b'] . '.<br>';
echo "La première couleur du tableau est $couleur[b] <br>"; // quand un tableau associatif est écrit dans des guillemets ou des quotes, il perd les quotes autour de son indice.

// Compter le nombre d'élément contenus dans un tableau :
echo 'Nombre de valeurs dans le tableau : ' . count($couleur) . '<br>'; // affiche 3
echo 'Nombre de valeurs dans le tableau : ' . sizeof($couleur) . '<br>'; // affiche 3 aussi car sizeof() fait la même chose que count() dont il est un alias.
/* 
debug(count($couleur)); vérification */

//---------------------------------------
echo '<h2> La boucle foreach </h2>';
//---------------------------------------
// foreach est moyen simple de passer en revue un tableau de façon automatique. Cette boucle ne fonctionne que sur les tableaux et les objets.

debug($tab); // pour voir le tableau à parcourir

foreach($tab as $pays){ // on parcourt le tableau $tab par ses valeurs. La variable $pays prend les valeurs du tableau successivement à chaque tour de boucle. Le mot clé "as" fait partie de la syntaxe, il est obligatoire.
    echo $pays . '<br>';
}

echo '<hr>';
// La boucle foreach pour parcourir les INDICES et les VALEURS :
foreach($tab as $indice => $pays){ // quand il y a deux variables après "as", celle de gauche parcourt les indices, et celle de droite parcourt les valeurs (quelque soit leur nom).
    echo  'Indice ' . $indice . ' correspond à ' . $pays . '<br>';
}

// Exercice : vous déclarez un tableau associatif avec les indices prenom, nom, email, telephone et vous y mettez les valeurs correspondant à un seul contact. Puis avec une boucle foreach, vous afichez les valeurs dans des <p>, sauf le prenom qui doit être dans un <h3>.

/*  $james = array(
    'j' => 'Bonjour',
    'n' => 'Bond',
    'e' => 'jb@londres.fr',
    't' => '06 05 88 88 88'
); 

debug($james);

foreach($james as $indice => $info){
    echo '<h3> Bonjour </h3>' . '<p> Bond </p>' . '<p> jb@londres.fr </p>' . '<p> 06 50 80 45 78 </p>';
} */

// Correction

$contact = array(
    'prenom' => 'John',
    'nom' => 'Doe',
    'email' => 'jdoe@gmail.fr',
    'telephone' => '06 05 88 88 88'
);

debug($contact);

foreach ($contact as $indice => $valeur){

    if($indice == 'prenom'){
        echo '<h3>' . $valeur . '</h3>';
    }else {
        echo '<p>' . $valeur . '</p>';
    }
}

//---------------------------------------
echo '<h2> Tableau multidimensionnel </h2>';
//---------------------------------------
// On parle de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
    0 => array(
        'prenom'     => 'Julien',
        'nom'        => 'Dupon',
        'telephone'  => '0120304050'
    ),
    1 => array(
        'prenom'     => 'Nicole',
        'nom'        => 'Adam',
        'telephone'  => '0615854422'
    ),
    2 => array(
        'prenom'     => 'Pierre',
        'nom'        => 'Michel'
    ),
);

debug($tab_multi);

// Afficher la valeur "Julien" de $tab_multi :
echo $tab_multi[0]['prenom']; // pour afficher "Julien" nous entrons d'abord à l'indice [0] de $tab_multi puis nous allons dans le sous tableau à l'indice ['prenom']
 
echo '<br>';
// Pour parcourir le tableau multidimensionnel on peut faire une boucle for car ses indices sont numériques :
for ($i = 0; $i < count($tab_multi); $i++){ // tant que $i est infèrieur au nombre d'éléments du tableau $tab_multi (soit 3), on entre dans la boucle :
    echo $tab_multi[$i]['prenom'] . '<br>'; // $i va successivement prendre la valeur 0, puis 1 puis 2, ce qui permet d'afficher les 3 prénoms.
}
echo '<hr>';
// Exercice : vous affichez les trois prénoms du tableau $tab_multi avec une boucle foreach.


foreach($tab_multi as $prenom => $valeur){ // quand il y a deux variables après "as", celle de gauche parcourt les indices, et celle de droite parcourt les valeurs (quelque soit leur nom).
   /*  debug($prenom); */
    echo $tab_multi[$prenom]['prenom'] . '<br>'; 
    // ou :
/*  echo $valeur['prenom'] . '<br>'; */  
    echo $valeur['nom'] . '<br>';
    echo $valeur['telephone'] . '<br>';
}

 // Exercices bonus : vous déclarez un tableau avec les tailles S, M, L, XL, XXL.
 // Puis vous affichez les tailles dans un menu déroulant avec une boucle foreach.

 $liste = array('S','M','L','XL','XXL');

 debug($liste);


 foreach ($liste as $indice => $valeur){
    echo '<p>' . $valeur . '</p>';

 }

?>
<select>
    <option selected="selected">Sélectionner la taille
        <?php
    $taille = array("S small", "M médium", "L large", "XL très large", "XXL très très large");
    foreach($taille as $value){
?>
    <option value="
<?php 
    echo strtolower($value);
?>  ">
        <?php 
    echo $value; 
?>
    </option>
    <?php
    } 
?>
</select>

<?php
  // Définition du tableau des tailles
  $arrayTailles = array(
    'slt' => 'Sélectionner la taille',
    's'   => 'S &nbsp &nbsp &nbsp &nbsp &nbsp small',
    'm'   => 'M &nbsp &nbsp &nbsp &nbsp &nbsp médium',
    'l'   => 'L &nbsp &nbsp &nbsp &nbsp &nbsp large',
    'xl'  => 'XL &nbsp &nbsp &nbsp &nbsp très large',
    'xxl' => 'XXL &nbsp &nbsp très très large',
  );
  // Variable qui ajoutera l'attribut selected de la liste déroulante
  $selected = '';
 
  // Parcours du tableau
  echo '<select name="tailles">';
  foreach($arrayTailles as $valeurHexadecimale => $nomTaille)
  {
    // Test de la taille
    if($nomTailles === 'S small')
    {
      $selected = ' selected="selected"';
    }
    // Affichage de la ligne
    echo '<option value="', $valeurHexadecimale ,'"', $selected ,'>', $nomTaille ,'</option>';
    // Remise à zéro de $selected 
    $selected='';
  }
  echo '</select>';
?>
<?php
$tailles = array('S', 'M', 'L', 'XL', 'XXL');
//                0    1     2    3     4
?>
<select>
    <?php
foreach ($tailles as $valeur){
    echo '<option>' . $valeur . '</option>';
}
?>
</select>
<?php


//---------------------------------------
echo '<h2> Inclusion de fichiers </h2>';
//---------------------------------------

echo 'Première inclusion : ';
include 'exemple.inc.php'; // permet de faire l'inclusion du fichier dont le chemin est specifié. En cas d'erreur lors de l'inclusion, include génère un warning et continue l'exécution du script.

echo '<br>';

echo 'Deuxième inclusion :';
include_once 'exemple.inc.php'; // permet de fire l'inclusion du fichier si celui-ci n'a pas encore été inclus 'on ne l'inclut qu'une seule fois).

echo '<br>';

echo 'Troisième inclusion :';
require 'exemple.inc.php'; // fait l'inclusion du fichier spécifié. Celui-ci est obligatoire au bon fonctionnement du site : en cas d'erreur lors de l'inclusion, require génère une erreur de type "fatal error" et stoppe l'éxecution du script.

echo '<br>';

echo 'Quatrième inclusion :';
require_once 'exemple.inc.php'; // "once" signifie que l'on vérifie si le fichier a déjà été inclus. Si c'est le cas , on le ré-inclut pas.

// Le ".inc" dans le nom du fichier inclus est un indicatif pour précisez aux développeurs que le fichier est destiné à être inclus, et qu'il ne s'agit pas d'une page à part entière.


bonjourJames();

echo '<br>';echo '<br>';


//---------------------------------------
echo '<h2> Introduction aux objets </h2>';
//---------------------------------------
// un objet est un autre type de données (object en anglais). Il représente un objet réel (par exemple une voiture, un personnage, un membre inscrit à votre site, un produit que vous vendez, unn panier d'achat...) auquel on peut associer des variables, appelées propriétés, et des fonctions appelées méthodes.

// Pour créer des objets il nous faut un plan de construction : c'est le rôle de la classe (class en anglais). Nous créons ici une classe pour fabriquer des meubles :

class Meuble{ // on met une majuscules à la 1ère lettre du nom de la classe

   public $marque = 'ikea'; // propriété "marque". public permet de préciser que l'élément sera accessible partout.

   public function prix(){ // prix() est une méthode.
       return rand(50,200) . '€'; // rand() est une fonction prédéfinie qui tire un chiffre aléatoire ici entre 50 et 200.
   }
}

// On crée une table à partir de la classe Meuble :
$table = new Meuble(); // on crée un objet $table à partir de la classe Meuble à l'aide du mot clé "new". On dit que l'on instancie la classe. $table est donc de type objet.

debug($table); // on voit le type object et la seule propriété "marque"

echo 'La marque de notre table est : ' . $table->marque . '<br>'; // pour accéder à la propriété d'un objet, on écrit l'objet suivi de la flèche "->" puis du nom de la propriété SANS le "$".

echo 'Le prix de notre table est de : ' . $table->prix() . '<br>'; // pour executer la méthode d'un objet, on écrit son nom après la flèche "->" et on lui ajoute une paire de ().