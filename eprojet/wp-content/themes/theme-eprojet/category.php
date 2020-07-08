<?php 
get_header();

    $categorie = ''; // variable qui contient la catégorie que l'internaute a choisi.

    $categorie = get_query_var('category_name'); // get_query_var va chercher la valeur de la catégorie utilisée pa la requête principale et qui correspond à la catégorie sur laquelle l'internaute a cliqué.

    // print_r($categorie);

    query_posts(array(
        'post_type'     => 'annonce', // on met ici le slug du type "annonces"
        'category_name' => $categorie, // variable qui contient la catégorie choisie

    )); //  query_posts() sélectionne en BDD les posts demandés : ici du type "annonce" (et non pas des articles), et de catégorie celle que l'internaute a choisie. Après avoir effectué un query_post(), il est recommandé de faire un wp_reset_query() à la fin du script pour restaurer le fonctionnement de la requête principale de WP.

    ?>
<div class="col-lg-12">
    <h1>Nos <?php echo $categorie; ?></h1>
    <?php
        if (have_posts()) :

            while (have_posts()) : the_post();
            ?>
    <div class="row cat-info">

        <div class="col-lg-3">
            <a href="<?php the_permalink(); ?>">
                <img class="img-fluid" src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">
            </a>
        </div>
        <div class="col-lg-9">
            <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </h2>

            <div><span>Marque : </span><?php the_field('marque'); ?></div>
            <div><span>Modèle : </span><?php the_field('modele'); ?></div>
            <div><span>Prix : </span><?php the_field('prix'); ?> €</div>
        </div>

    </div>
    <!--fin de .row-->
    <?php
            endwhile;
        else :
            echo '<p>Aucune annonce ne correspond à votre demande.</p>';
        endif;
        ?>
</div>

<?php
wp_reset_query(); // on rétablit la requête principale de WP dans son fonctionnement normal.
get_footer();

?>