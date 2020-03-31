<?php

// Zones de Widgets
function eprojet_init_widgets(){

    // déclaration de la zone de widget pour le titre h1 de la page d'accueil :
    register_sidebar(array(
        'name'          => 'Zone entête', // nom qui apparait dans le BO
        'id'            => 'zone-entete', // identifiant unique de la zone
        'description'   => 'Ajoute des widgets à la zone entete de la page accueil', // description qui apparait dans lo BO
        'before_widget' => '', // précises les balises avant le widget, ici on retire les <li> par défaut
        'after_widget'  => '', // précises les balises après le widget, ici on retire les <li> par défaut
        'before_title'  => '<h1>', // pour mettre le titre du widget dans un <h1> au lieu d'un <h2> par défaut
        'after_title'   => '</h1>',
    ));

    // exercice
    register_sidebar(array(
        'name'          => 'Footer de gauche', 
        'id'            => 'footer-gauche',
        'description'   => 'Ajoute des widgets à la zone du footer de gauche', 
        'before_widget' => '<div>', 
        'after_widget'  => '</div>', 
    ));


}

add_action('widgets_init', 'eprojet_init_widgets'); // on execute notre fonction appelée "eprojet_init_widgets" quand WP initialise les widgets du site : "widgets_init" s'appelle un HOOK (crochet en français) car y sont accrochées les fonctions du coeur de WP ainsi que la nôtre. Elles s'executent toutes ensembles lors de l'execution de ce HOOK.

// zone de menus :
function eprojet_init_menus(){

    register_nav_menu('primary', 'menu principal'); // déclare une zone de menu d'dentifiant "primary" et de nom dans le BO "menu principal".
    register_nav_menu('secondary', 'menu footer');
}

add_action('init', 'eprojet_init_menus'); // on exécute notre fonction "eprojet_init_menus" dans le hook appelé "ini" de WP : quand WP s'initialise, il exécute notre fonction.


?>