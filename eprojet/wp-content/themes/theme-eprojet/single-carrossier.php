<?php
get_header();
?>

<div class="col-lg-12">
    <?php
    if (have_posts()) : // si j'ai des annonces à afficher
        while (have_posts()) : the_post(); // tant que j'ai des annonces à afficher, j'entre dans la boucle et j'extrais les données de l'annonce avec the_post().
        ?>
    <h1 class="col-12">
        <?php the_title(); ?>
    </h1>

    <div class="col-12"><?php the_content(); ?></div>
    <div class="text-center">
        <img class="img-fluid w-75" src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="col-12"> <strong>V</strong>ille : <?php the_field('ville'); ?></div>
    <div class="col-12"> <strong>T</strong>éléphone : <?php the_field('telephone'); ?></div>
    <div class="col-12"> <strong>C</strong>ode postal : <?php the_field('code_postal'); ?></div>

    <?php
        endwhile;
       
    else :
        echo '<p>Aucune annonce ne correspond à votre demande.</p>';
    endif;

        ?>
</div>

<?php
get_footer();