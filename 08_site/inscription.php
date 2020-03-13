<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
body {
    background-color: #dd884b8f;
}

.alert.alert-danger {
    color: black;
    background-color: #d6d8d9;
    border: 1px solid red;
    box-shadow: 8px 8px 12px #aaa;
}

.navbar-dark .navbar-brand {
    color: #573a3a;

}

.btn.btn-info:hover {
    background-color: maroon;
    box-shadow: 8px 8px 12px #aaa;
}

.btn.bg-white {
    box-shadow: 8px 8px 12px #aaa;
}

label {
    color: maroon;
    font-family: fantasy;
}
span {
    color: maroon;
    font-family: fantasy;
}
strong {
    color: black;
}

a {
    color: black;
}
</style>
<?php
require_once 'inc/init.php';

// Traitement du formulaire :
/* debug($_POST); */

if (!empty($_POST)) { // si le formulaire a été envoyé, $_POST n'est pas vide

    // Validation du formulaire :
    if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) { // si n'existe pas l'indice "pseudo" dans $_POST c'est que le formulaire a été modifié. Si la longueur du pseudo est inférieur à 4 ou supérieur à 20, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>';
    }

    if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) { // si n'existe pas l'indice "mot de passe" dans $_POST c'est que le formulaire a été modifié. Si la longueur du mot de passe est inférieur à 4 ou supérieur à 20, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>';
    }

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) { // si n'existe pas l'indice "nom" dans $_POST c'est que le formulaire a été modifié. Si la longueur du nom est inférieur à 2 ou supérieur à 20, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';
    }

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) { // si n'existe pas l'indice "prenom" dans $_POST c'est que le formulaire a été modifié. Si la longueur du prénom est inférieur à 2 ou supérieur à 20, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';
    }

    if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // si la fonction filter_var() retourne true si $_POST['emeil] est bien au format email, sinon elle retourne false (ici on met un "!" pour NOT car on veut vérifier qu'il NE s'agit PAS dun email)
        $contenu .= '<div class="alert alert-danger">L\'email n\'est pas valide.</div>';
    }

    if (!isset($_POST['civilite']) || ($_POST['civilite']  != 'm' && $_POST['civilite'] != 'f')) {
        $contenu .= '<div class="alert alert-danger">La civilité n\'est pas valide.</div>';
    }

    if (!isset($_POST['ville']) || strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20) { // si n'existe pas l'indice "ville" dans $_POST c'est que le formulaire a été modifié. Si la longueur du prénom est inférieur à 1 ou supérieur à 20, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';
    }

    if (!isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal'])) {
        $contenu .= '<div class="alert alert-danger">Le code postal n\'est pas valide.</div>';
    } // !preg_match vérifie si le code postal correspond à l'expression régulière précisée.

    /* La regex s'écrit entre #
    le ^ définit le début de l'expression
    le $ définit la fin de l'expression
    [0-9] définit l'intervalle des chiffres autorisés
    {5} définit que l'on en veut 5 précisément
    */

    if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50) { // si n'existe pas l'indice "ville" dans $_POST c'est que le formulaire a été modifié. Si la longueur du prénom est inférieur à 4 ou supérieur à 50, on a un message d'erreur à l'internaute.
        $contenu .= '<div class="alert alert-danger">L\'adresse doit contenir entre 4 et 50 caractères.</div>';
    }

    // s'il n'y a pas d'erreur sur le formulaire, on vérifie que le pseudo est disponible puis on insère le melre en BDD
    if (empty($contenu)) { // si la variable est vide, c'est qu'il n'y a pas d'erreur sur le formulaire

        //  On selectionne le pseudo en BDD :
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo']));

        if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
            $contenu .= '<div class="alert alert-danger">Le pseudo est indisponible. Veuillez en choisir un autre.</div>';
        } else { // sinon on inscrit le membre en BDD

            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // cette fonction prédéfinie permet de hasher le mot de passe selon l'algorithme actuel "bcrypt". Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'internaute.

            $succes = executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)", array(
                ':pseudo'        => $_POST['pseudo'],
                ':mdp'           => $mdp, // on prend le mdp hashé
                ':nom'           => $_POST['nom'],
                ':prenom'        => $_POST['prenom'],
                ':email'         => $_POST['email'],
                ':civilite'      => $_POST['civilite'],
                ':ville'         => $_POST['ville'],
                ':code_postal'   => $_POST['code_postal'],
                ':adresse'       => $_POST['adresse'],

            ));

            if ($succes) {
                $contenu .= '<div class="alert alert-success">Vous êtes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter.</a></div>';
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur lors de l\'enregistrement. Veuillez réessayer ultèrieurement.</div>';
            }
        }
    } //if (empty($contenu))

} // fin du if (!empty($_POST))

require_once 'inc/header.php';
?>
<h1 class="mt-4">Inscription</h1>

<?php
echo $contenu; // pour afficher les messages
?>
<br>
<form method="post" action="">
    <div>
        <div><label for="pseudo"><strong>P</strong>seudo</label></div>
        <div><input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>"> </div>

    </div>
    <div>
        <div><label for="mdp"><strong>M</strong>ot de passe</label></div>
        <div><input type="password" name="mdp" id="mdp"></div>
    </div>

    <div>
        <div><label for="nom"><strong>N</strong>om</label></div>
        <div><input type="text" name="nom" id="nom" value="<?php echo $_POST['pseudo'] ?? ''; ?>"> </div>
    </div>

    <div>
        <div><label for="prenom"><strong>P</strong>rénom</label></div>
        <div><input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>"> </div>
    </div>

    <div>
        <div><label for="email"><strong>E</strong>mail</label></div>
        <div><input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>"> </div>
    </div>

    <div>
        <div><label><strong>C</strong>ivilité</label></div>
    </div>
    <input type="radio" name="civilite" value="m" checked> <strong>H</strong><span>omme</span>
    <input type="radio" name="civilite" value="f"
        <?php if (isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'checked'; ?>> <strong>F</strong><span>emme</span>
    </div>
    </div>

    <div>
        <div><label for="ville"><strong>V</strong>ille</label></div>
        <div><input type="text" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>"> </div>
    </div>

    <div>
        <div><label for="code_postal"><strong>C</strong>ode postal</label></div>
        <div><input type="text" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>">
        </div>
    </div>

    <div>
        <div><label for="adresse"><strong>A</strong>dresse</label></div>
        <div><textarea name="adresse" id="adresse"><?php echo $_POST['adresse'] ?? ''; ?></textarea></div>
    </div>
    <br>
    <div><input type="submit" value="S'inscrire" class="btn btn-info"> </div>

</form>


<?php
require_once 'inc/footer.php';