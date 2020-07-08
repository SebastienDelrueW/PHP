<style>
    h1 {
        border-top: 1px solid navy;
        border-bottom: 1px solid navy;
        color: navy;

        background: rgba(226, 226, 226, 1);
        background: -moz-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(3%, rgba(226, 226, 226, 1)), color-stop(4%, rgba(227, 227, 227, 1)), color-stop(40%, rgba(254, 254, 254, 1)), color-stop(49%, rgba(254, 254, 254, 1)), color-stop(84%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(209, 209, 209, 1)));
        background: -webkit-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -o-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: -ms-linear-gradient(left, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        background: linear-gradient(to right, rgba(226, 226, 226, 1) 3%, rgba(227, 227, 227, 1) 4%, rgba(254, 254, 254, 1) 40%, rgba(254, 254, 254, 1) 49%, rgba(209, 209, 209, 1) 84%, rgba(209, 209, 209, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#d1d1d1', GradientType=1);
    }

    a {
        color: black;
    }
</style><?php
        //-------------------------
        // Cas pratique : un formulaire pour poster des commentaires
        //-------------------------
        // Objectif : protéger la requête SQL dont les données proviennent de l'internaute.

        /*
    Modélisation de la BDD

            Nom de la BDD   : dialogue
            Nom de la table : commentaires
            Champs          : id_commentaire        IN PK AI
                              pseudo                VARCHAR 
                              message               TEXT
                              date_enregistrement   DATETIME


*/


        // 2. Connexion à la BDD et traitement du formulaire
        $pdo = new PDO(
            'mysql:host=localhost;dbname=dialogue', // driver mysql (IBM, oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
            'root', // pseudo de la BDD
            '',     // mdp de la BDD utilisation de MAMP
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les erreurs SQL dans le navigateur
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour définir le charset des échanges avec la BDD
            )
        );


        if (!empty($_POST)) { // si $_POSTn'est pas vide c'est que le formulaire à été envoyé.

            // print_r($_POST); 

            // 5. Traitement contre les failles JS (XSS) ou les failles CSS :
            // Nous faisons l'injection CSS suivante : <style>body{display:none;}</style>
            // Pour se prémunir de ces failles nous faisons :
            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
            $_POST['message'] = htmlspecialchars($_POST['message']); // cette fonction prédéfinie transforme les caractères spéciaux en entités HTML : 
            // le < devient &lt; 
            // le > devient &gt;
            // le & devient &amp;
            // les caractères spéciaux étant transformés, les balises <script> et <style> deviennent inoffensives car non exécutables.


            // Nous faisons d'abord une requête qui n'est pas protégée contre les injections.
            // $resultat = $pdo->query("INSERT INTO commentaires (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");
            // NOW() est une fonction SQL qui retourne la date de l'instant présent.

            // 4. Nous faisons l'injection SQL suivante dans le champ message : '); DELETE FROM commentaires; #
            // Pour s'en prémunir, nous faisons une requête préparée qui neutralise les injections de type SQL :
            $resultat = $pdo->prepare("INSERT INTO commentaires (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)");
            $resultat->execute(array(
                ':pseudo'       => $_POST['pseudo'],
                ':message'      => $_POST['message']
            ));

            // Comment ça marche ? Le fait de mettre des marqueurs dans la requête permet de ne pas concaténer les instructions SQL d'origine et celle qui serait injectée. Ainsi elles ne peuvent pas s'executer successivement. De plus en liant les marqueurs à leur valeur sans execute(), PDO les neutralise automatiquement, les transformant en strings neutres inoffensifs.
        } // fin du if (!empty($_POST))


        // 1. Formulaire HTML

        ?>
<h1>Votre message</h1>
<form method="post" action="">
    <label for="pseudo"></label>
    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>">
    <br>

    <label for="message">Message</label>
    <textarea name="message" id="messsage"><?php echo $_POST['message'] ?? ''; ?></textarea>
    <br>

    <input type="submit">
</form>

<?php
// 3. Affichage des commentaires
$resultat = $pdo->query("SELECT pseudo, message, date_enregistrement FROM commentaires ORDER BY date_enregistrement DESC");

echo '<h2> Nombre de commentaires : ' . $resultat->rowCount() . '</h2>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<pre>';
    print_r($commentaire);
    echo '</pre>';

    echo '<div> Par ' . $commentaire['pseudo'] . ' le ' . $commentaire['date_enregistrement'] . '</div>';
    echo '<div>' . $commentaire['message'] . '</div><hr>';
}
