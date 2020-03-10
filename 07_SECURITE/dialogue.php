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