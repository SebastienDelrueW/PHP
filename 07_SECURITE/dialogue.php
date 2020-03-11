<?php
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

// 1. Formulaire HTML

?>
<h1>Votre message</h1>
<form method="post" action="">
    <label for="pseudo"></label>
    <input type="text" name="pseudo" id="pseudo" value="">
    <br>

    <label for="message">Message</label>
    <textarea name="message" id="messsage"></textarea>
    <br>

    <input type="submit">
</form>