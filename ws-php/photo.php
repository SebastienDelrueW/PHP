/* Règle de base, ne jamais faire confiance aux données envoyées par l'utilisateur !!
- Il faut vérifier le type de dossier envoyé, exemple pour une photo on attend de l'utilisation des formats de type
(png, jpg, gif, jpeg)
- Il faut vérifer la taille du fichier envoyé. Dans le principe PHP n'accepte pas les fichiers supérieur à 8mo.
- Important de renomer les photos une fois uploadé et ce pour éviter l'écrasement de photo
*/

<?php require "connect.php"; ?>

<br>
<br>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
	body{
		background:#dde1f5;
	}
    input#image {
        box-shadow: 2px 2px 3px #aaa;
		font-size: 1.2rem;
    }

    h1 {
        margin: 0 auto;
        margin-top: 5px;
        border: 1px solid grey;
        box-shadow: 2px 2px 3px #aaa;
        width: 160px;
        padding: 15px;
    }

    label {
        font-size: 1.5rem;
        margin-left: 300px;
        color: marron;
        box-shadow: 2px 3px 2px 1px rgba(87, 84, 76, 0.2);
    }

    button:hover {
        margin-left: 472px;
        background-color: maroon;
        box-shadow: 8px 8px 12px #aaa;
        color: white;
    }

    button {
        margin-top: 15px;
        margin-left: 472px;
        box-shadow: 8px 8px 12px #aaa;
        width: 100px;
        height: 25px;
    }
    </style>
</head>

<body>


    <h1>Formulaire</h1>
    <br>
    <?php


echo '<form method="post" action="photo.php" enctype="multipart/form-data">
			<label for="image">Photographie</label>
                   <input type="file" name="image" id="image"><br/>
                   <button type ="submit">Envoyer</button> 
                 
	
		</form>';


	if (isset($_FILES['image']) && ($_FILES['image']['error']) == 0){
  
		  if ($_FILES ['image']['size']<= 3000000){ 

		    
		    $infoImg = pathinfo($_FILES['image']['name']);// ça va envoyer sous forme de tableau toute les informations de l'image notammment l'extension dont on va avoir besoin. On va pouvoir ensuite comparer l'extention de l'image reçu avec celles autorisées.


		    var_dump($infoImg);

		    $extensionImg = $infoImg['extension'];

		    
		    $extensionArray = array('png', 'gif', 'jpg', 'jpeg');// on crée un tableau avec les extensions qu'on autorise

			
		    if (in_array($extensionImg, $extensionArray )){//la fonction in_array va retourner true ou false si la donnée du 1er paramêtre se retrouve dans le 2ème paramètre

 
			// Cette fonction prend 2 paramètres le tmp_name récupère l'image temporaire et le 2ème paramètre c'est la destination qu'on va concaténer avec la fonction time(), rand()
    		move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/'.time().rand().'.'.$extensionImg);
    		echo'envoie réussi !';
  			}
		}
	}

?>

</body>

</html>