        </div>
        </section><!-- ces deux balises fermentes sont ouvertes dans header.php.-->

        <footer class="align-items-center">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-4">
                        <?php dynamic_sidebar('footer-gauche'); ?>
                    </div>
                    <div class="col-lg-4">
                        <p>&copy; Mes petites annonces - 2020</p>
                    </div>
                    <div class="col-lg-4">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'secondary',
                    )); ?></div>

                </div> <!-- .row -->
            </div> <!-- .container -->
        </footer>
        <!-- cest ici que nous ferions le lien vers JS Bootstrap. -->
        <?php wp_footer(); ?>
        <!-- nécessaire à l'affichage de la barre d'admin côté front, et affiche les balises <script> insérées par une fonction depuis functions.php avant la fermeture de <body>.-->

        </body>

        </html>