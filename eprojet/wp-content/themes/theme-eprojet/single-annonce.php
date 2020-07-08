<?php
get_header();
?>

<div class="col-lg-12">
    <?php
    if (have_posts()) : // si j'ai des annonces à afficher
        while (have_posts()) : the_post(); // tant que j'ai des annonces à afficher, j'entre dans la boucle et j'extrais les données de l'annonce avec the_post().
        ?>
            <h1><?php the_title(); ?></h1>

            <div class="contenu"><?php the_content(); ?></div>

             <div class="text-center">
                <img class="img-fluid w-75" src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="info"><span> Marque : </span><?php the_field('marque'); ?></div>
            <div class="info"><span> Modèle : </span><?php the_field('modele'); ?></div>
            <div class="info"><span> Kilomètrage : </span><?php the_field('kilometrage'); ?> km</div>
            <div class="info"><span> Carburant : </span><?php the_field('carburant'); ?></div>
            <div class="info"><span> Prix : </span><?php the_field('prix'); ?>€</div>
        <?php
        endwhile;
       
    else :
        echo '<p>Aucune annonce ne correspond à votre demande.</p>';
    endif;

        ?>
</div>

<?php
get_footer();