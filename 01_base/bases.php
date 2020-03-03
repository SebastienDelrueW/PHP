<style>
    h2 {
        border-top: 1px solid navy;
        border-bottom: 1px solid navy;
        color: navy;
        
    }

    a{
        color:blue;
       
    }

    b{
        color:white
    }
    span{
        color: red;
        
    }
 

</style>

<?php 

//-------------------------------
echo '<h2> Les balises PHP </h2>';
//-------------------------------

?>

<?php 
// pour ouvrir un passage en PHP on utilise la balise précédente 
// pour fermer un passage en PHP on utilise la balise suivante :
?>

<p>Bonjour</p> <!-- en dehors des balises de PHP nous pouvons écrire du HTML dans un fichier ayant l'extension .php (ce n'est pas possible dans un fichier .html)-->

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
echo '<h2> Structure itératives : les boucles </h2>';
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