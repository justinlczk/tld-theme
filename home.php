<?php
/**
 * Template Name: HomePage
 *
 * Description : Ceci est un modèle personnalisé pour afficher une page spécifique avec une mise en page personnalisée.
 * Utilisez ce modèle en attribuant la page à "Mon Modèle Personnalisé" dans l'éditeur de pages WordPress.
 *
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
