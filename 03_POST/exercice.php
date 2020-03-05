
<style>
  label {
        color:blue;
        border: 1px solid rgb(55, 52, 52);
        box-shadow: 8px 12px 2px 1px rgba(87, 84, 76, 0.2);
        width: 200px;
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
        <input type="submit" value="Envoyer">
    </div>
</form>
<?php
    print_r($_POST);

