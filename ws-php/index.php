<?php require "connect.php"; ?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <style>
        label {
            display: inline-block;
            width: 90px;
            vertical-align: top;
        }

        pre {
            background-color: lightgrey;
            margin-top: 5px;
            border: 1px solid grey;
            width: 400px;
        }

        h1 {
            color: #992306;
            border: 1px solid rgb(55, 52, 52);
            box-shadow: 8px 12px 2px 1px rgba(87, 84, 76, 0.2);
            width: 160px;
            padding: 25px;
            margin-left: 10px;
        }

        label {
            color: marron;
            box-shadow: 2px 3px 2px 1px rgba(87, 84, 76, 0.2);
        }

        input {
            background-color: #f3f3fa;
            width: 300px;
            height: 40px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        td:hover,
        th:hover {
            background-color: #bfc6de;
        }

        code {
            color: #0c5ec7b3;
            /* box-shadow: 2px 2px 3px #aaa; */
        }

        .btn-primary:hover {
            background-color: maroon;
            box-shadow: 8px 8px 12px #aaa;
            color: white;
        }

        .btn.bg-white {
            box-shadow: 8px 8px 12px #aaa;
        }

        textarea#motivations {
            background-color: #eeeeee21;
            color: black;
            font-family: family;
            box-shadow: 4px 4px 6px #aaa;

        }

        .card {
            padding: 15px;
            box-shadow: 8px 8px 12px #aaa;

        }

        .card-text {
            box-shadow: 2px 2px 3px #aaa;
        }

        .card-title {
            font-family: new roman;
            font-size: 1.5rem;
        }

        .btn-primary {
            margin: 0 auto;
            margin-top: 15px;
            box-shadow: 2px 2px 3px #aaa;
        }

        input.btn-primary {
            width: 350px;
            box-shadow: 4px 4px 6px #aaa;
        }

        input#photo {
            box-shadow: 4px 4px 6px #aaa;
        }

        h2#formulaire {
            margin: 0 auto;
            margin-top: 5px;
            border: 1px solid grey;
            box-shadow: 2px 2px 3px #aaa;
            width: 450px;
            padding: 15px;
        }
    </style>
</head>

<body>


    <?php

    if (isset($_POST['name']) && ($_POST['prenom']) && ($_POST['age']) && ($_POST['ville']) && ($_POST['motivations']) && ($_FILES['photo']['name'])) {

        $nom = $_POST['name'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $ville = $_POST['ville'];
        $motivations = $_POST['motivations'];

        $photo = 'assets/img/' . $_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], $photo);

        // 5 types possibles 
        // $_FILES['image']['name'] Nom
        // $_FILES ['image']['type'] Type
        // $_FILES ['image']['size'] Taille
        // $_FILES ['image']['tmp_name'] Emplacement temporaire
        // $_FILES ['image']['error'] Erreur si oui/non l'image a été réceptionné

        $requete = $bdd->prepare('INSERT INTO profils (nom, prenom, age, ville, motivations, photo) VALUE (?,?,?,?,?,?)')

            //Permet de capturer l'erreur et de l'afficher.
            or die(print_r($bdd->errorInfo()));

        $requete->execute(array($nom, $prenom, $age, $ville, $motivations, $photo));

        header('location:index.php');
    }

    ?>


    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Stage</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formulaire">Formulaire</a>
                    <li class="nav-item">
                        <a class="nav-link" href="photo.php">Photo</a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <br>
    <br>

    <div class="container">
        <div class="row mx-auto">
            <?php

            $query = $bdd->query('SELECT * FROM profils'); // Lecture de la base de données

            while ($candidat = $query->fetch(PDO::FETCH_ASSOC)) {

                echo ' <div class="card-deck">
                  <div class="card" style="width: 17rem;">
                    <img src="' . $candidat['photo'] . '" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Nom : ' . $candidat['nom'] . '</h5>
                        <p class="card-text">Prénom : ' . $candidat['prenom'] . '</p>
                        <p class="card-text">Age : ' . $candidat['age'] . '</p>
                        <p class="card-text">Ville : ' . $candidat['ville'] . '</p>
                        <p class="card-text">Motivations : <br>' . $candidat['motivations'] . '</p>
                        <div class="text-center"><a href="#" class="btn btn-primary">Découvrir</a></div>
                      </div>
                  </div>
                </div> ';
            }
            ?>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <h2 class="text-center" id="formulaire">Formulaire d'inscription stage</h2>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>

            <form class="col-md-4" method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prénom">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Votre âge">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" id="ville" placeholder="Votre ville">
                </div>
                <div class="form-group">
                    <label for="motivations">Motivations</label>
                    <textarea class="form-control" name="motivations" id="motivations" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <br><br>
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Envoyer">
                </div>
            </form>
            <div class="col-md-4"></div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>




</body>

</html>