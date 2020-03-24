<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--bloginfo() est une fonction de WP qui affiche des informations du site, ici nous avons demandé le charset. -->
    <title><?php bloginfo('name'); ?></title>
    <!-- fonction qui affiche le nom du site paramétré dans le BO > Réglages > Général > Titre du site -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- CSS du thème -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/style.css">
    <!-- affiche le chemin du thème actif pour aller vers la feuille de style.css -->

    <?php wp_head(); ?>
    <!--cette fonction permet d'afficher la barre d'administration côté front quand on est connecté, ainsi que les <script> et <link> insérées par une fonction depuis le fichier functions.php.-->

</head>

<body <?php body_class(); ?>>
    <!-- affiche les classes du <body> automatiquement générées par WP-->

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="row w-100">
                    <div class="navbar-brand col-lg-3">
                        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><!--blginfo('url') affiche le chemin du site paramétré dans le se BO > Réglages > Général > URL -->
                    </div>
                    <p class="col-lg-9 texte-description">
                        <?php bloginfo('description'); ?><!-- affiche la description du site paramétrée dans BO > Réglages > Général > Slogan -->
                    </p>
                    <div class="col-lg-12">
                        <!-- ici viendra le menu de navigation demain -->
                    </div>
                </div><!-- .row -->
            </div><!-- container-->
        </nav>
    </header>

    <!-- Entête de la page d'accueil à venir -->

    <section class="container">
        <div class="row"><!-- ces deux balises ouvrantes correspondent au début du contenu de chaque page. Elles sont fermées dans le footer.php. -->
