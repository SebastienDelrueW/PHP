<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exo workshop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .container {
        color: grey;
        border: 1px solid rgb(55, 52, 52);
        box-shadow: 8px 12px 2px 1px rgba(87, 84, 76, 0.2);
    }

    .btn.btn-info {
        width: 160px;
        background-color: #3b88fd;

    }

    .btn.btn-info:hover {
        background-color: maroon;
        box-shadow: 8px 8px 12px #aaa;
    }

    .btn.bg-white {
        box-shadow: 8px 8px 12px #aaa;
    }

    .form-control {
        background-color: lightgrey;
    }

    th {
        font-family: fantasy;
        background-color: lightgrey;
        color: white;
    }

    table {
        background: #666;
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: center;
        /* padding: 5px; */
        border-right: 1px solid black;
    }

    th:last-child,
    td:last-child {
        border-right: 0;
    }

    tbody tr:nth-child(odd) {
        background: #ccc;
    }

    tbody tr:nth-child(even) {
        background: #aaa;
    }

    @media screen and (max-width:1200px) {
        table {
            display: flex;
        }

        thead {
            width: 35%;
        }

        tbody {
            flex: 1;
        }

        tr {
            display: flex;
            flex-direction: column;
        }

        th,
        td {
            text-align: left;
            border-right: 0;
        }

        td {
            margin-top: 3px;
            height: 32px;
        }

        tr:last-child td:last-child {
            border-bottom: 0;
        }

    }

    @media screen and (max-width:461px) {
        tbody tr:not(:first-child) td::before {
            /* margin-left: -95px; */
        }
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navigation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Exo workshop</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="jumbotron">
            <h1>Exo Workshop</h1>
            <hr>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam porro ad assumenda voluptatum aspernatur
                delectus deserunt blanditiis praesentium, similique consequatur vero? Maxime, qui. Facilis, blanditiis?
                Alias at id quasi praesentium.
            </p>
        </div>

        <section class="container bg-light">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="exercice-traitement.php">
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom">Nom</label>
                                <input type="nom" class="form-control" name="nom" id="nom">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="text" class="form-control" name="email" id="email" placeholder=""
                                        aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="telephone">Téléphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">&#x2706; </span>
                                    </div>
                                    <input type="text" class="form-control" name="telephone" id="telephone"
                                        placeholder="" aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse </label>
                            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" name="ville" id="ville">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pays">Pays</label>
                                <input type="text" class="form-control" name="pays" id="pays">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="code">Code postal</label>
                                <input type="text" class="form-control" name="cp" id="cp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Vérification
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info" value="Envoyer">Envoyer</button>
                    </form>
                    <?php
                    // print_r($_POST);
                ?>
                    <br>

                    ici le formulaire
                </div>
                <!--fin col-->
            </div>
            <!--fin row -->
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm table-secondary">
                        <thead>
                            <tr>
                                <th scope="col">id contact</th>
                                <th scope="col">prénom</th>
                                <th scope="col">nom</th>
                                <th scope="col">email</th>
                                <th scope="col">adresse</th>
                                <th scope="col">telephone</th>
                                <th scope="col">mot de passe</th>
                                <th scope="col">notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>55 rue de la Pierre</td>
                                <td>06 05 08 08 08</td>
                                <td>650gdqqg05</td>
                                <td>Production et finances</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>24 rue de la Boétie</td>
                                <td>01 54 85 22 33</td>
                                <td>NouNours2000</td>
                                <td>Chanteur de charme</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry</td> <!-- n'apparait pas-->
                                <td>@twitter</td>
                                <td>15 avenue du Général de Gaulle</td>
                                <td>01 02 53 88 91</td>
                                <td>Qiuy74dfg9PWx</td>
                                <td>Vendeurs de caleçons en cachemire</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Pierre</td>
                                <td>Moulot</td>
                                <td>@gmail.com</td>
                                <td>17 Avenue de Bercy</td>
                                <td>07 55 25 66 33</td>
                                <td>BilouteduSud</td>
                                <td>Vendeurs de chaussures italiennes</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Michael</td>
                                <td>Orbimi</td>
                                <td>@yahoo.fr</td>
                                <td>55 place du marché</td>
                                <td>09 05 66 04 08</td>
                                <td>GrisouilleLapoilue1988</td>
                                <td>Femme de lettres</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Carmen</td>
                                <td>Amor</td>
                                <td>@free.fr</td>
                                <td>250 rue du cirque</td>
                                <td>06 22 25 23 45</td>
                                <td>VoyageAuMilieu2555</td>
                                <td>Danseuse de flamenco</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        section
        <!-- Optional JavaScript en CDN -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS en CDN-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

    </body>

</html>