<?php

get_header();  // inclusion du fichier header.php.

    if (have_posts()) :    // le ":" correspond à "{". La fonction have_posts() retourne true qand il y a du contenu à afficher, sinon elle retourne false.
        
        while (have_posts()) : the_post(); // tant que j'ai des posts (contenus) à afficher, j'entre dans la boucle et the_post() en extrait les informations pour pouvoir les afficher

?>
      <h1 class="col-12">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>

     <div class="col-12"><?php the_content(); ?></div>       
<?php
        endwhile;
    else : // on entre dans le else s'il n'y a pas de contenu à afficher

        echo '<p>Aucun contenu ne correspond à votre demande.</p>';

    endif;   // correspond à "}"

// On fait une requête en BDD pour sélectionner la dernière annonce créée :
query_posts(array(
                'post_type'         => 'annonce', // slug des annonces
                'posts_per_page'    => 1, // correspond à LIMIT 1 en SQL. WP fait par défaut un ORDER BY date DESC, dont on prend le premier résultat : on obtient donc la dernière annonce en date.
               

));
?>
<div class="col-12">
    <hr>
    <h2>Dernière annonce</h2>
    <?php
    while(have_posts()) : the_post();
        ?>
            <div>
                <a href="<?php the_permalink(); ?>">

                    <img src="<?php the_field('photo'); ?>" class="img-fluid">
                </a>
            </div>
            <h3><?php the_title(); ?></h3>
            <h3><?php the_field('prix'); ?> €</h3>
        <?php
    endwhile;
    ?>
</div>

<?php
wp_reset_query(); // on restaure le fonctionnement de la requête principale.
get_footer();  // inclusion du fichier footer.php.
?>