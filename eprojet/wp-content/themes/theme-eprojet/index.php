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

get_footer();  // inclusion du fichier footer.php.
?>