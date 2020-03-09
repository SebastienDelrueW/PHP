<style>
  h1 {
        color:#992306;
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
    .bouton{
        margin-left:100px;
    }

    .bouton:hover{
        color:lightgrey;
    }
    label {
        color:marron;
        box-shadow: 2px 3px 2px 1px rgba(87, 84, 76, 0.2);
    }
    input{
        background-color:lightgrey;
    }
  
</style>
<?php
// Exercice
// - Vous créez un formulaire avec les champs ville, code postal et une zone de texte adresse.
// - Quand le formulaire est envoyé, vous en récupérez les données dans exercice-traitement.php et vous les affichez.
    echo '<br>';
?>

<h1>Formulaire</h1>
<form method="post" action="exercice-traitement.php">
    <div>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville">
     </div>
    <br>
    <br>
    <div>
        <label for="code">code postal</label>
        <input type="text" name="cp" id="cp">
    </div>
    <br>
    <div>
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse"></textarea>
    </div>
    <br>
    <div>
    <div class="bouton">
    <input type="submit" value="Envoyer">
    </div>
    </div>
</form>
<?php
    print_r($_POST);

