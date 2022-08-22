<?php get_header(); ?> 
<section class="site__main">
    <h1>Mon modèle Wordpress TP#2</h1>
    <div class="blocs__horizontaux">
    <?php
        if (have_posts()):
            while(have_posts()) : the_post(); ?>
            <article>
                <h2><a href="<?= get_permalink() ?>"><?php the_field('titre'); ?></a></h2>
                <h3><?php the_field('sous_titre'); ?></h3>
                <div class="media__article">
                <?php
                if (get_field('image')) : ?>
                    <img src="<?php the_field('image'); ?>" />
                <?php endif; ?>
                <p><?php the_field('resume'); ?></p>
                </div>
            </article>
            <?php endwhile; ?>
        <?php endif; ?>   
    </div>
    <?php wp_nav_menu(array(
                'menu' => 'menu accueil',
                'container' => 'nav'

            ));
            ?>
<h2>Menu epreuve</h2>
<?php wp_nav_menu(array(
                'menu' => 'menu accueil',
                'container' => 'nav'

            ));
            ?>

</section>


<?php get_footer(); ?>