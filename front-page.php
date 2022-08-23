<?php get_header(); ?>

<section class="site__main">
    <h1>Bienvenu!</h1>
    <div class="blocs__horizontaux">
        <?php

        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article>
                    <h2><a href="<?= get_permalink() ?>"><?php the_field('titre'); ?></a></h2>
                    <!-- <div class="image__article"> -->
                    <?php
                    if (get_field('image')) : ?>
                        <img src="<?php the_field('image'); ?>" />
                    <?php endif; ?>
                    <!-- </div> -->
                    <h3><?php the_field('sous_titre'); ?></h3>
                    <p><?php the_field('resume'); ?></p>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <h2>Nos pages ateliers</h2>
    <?php
    /* -------------------------------------- menu évènements */
    wp_nav_menu(array(
        'menu' => 'atelier',
        'container' => 'nav'
    )); ?>


</section> <!-- fin .site__main -->

<?php get_footer(); ?>