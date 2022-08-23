<?php

/**
 * Template name: Atelier
 */
?>
<?php get_header() ?>

<main class="site__main">
    <?php if (have_posts()) : the_post(); ?>
        <article class="atelier">
        <mark>Ateliers</mark>
            <h1><?= get_the_title() ?></h1>
            <?php the_content(); ?>
            
            <p class='animateur'>Animateur: "<?= get_field('animateur')?> </p>
            <p class='type_de_formation'>Type de formation: <?= get_field('type_de_formation')?></p>
            <p class='date_debut'>Date de début: <?= get_field('date_debut')?></p>
            <p class='duree'>Durée: <?= get_field('duree')?></p>
            <p class='heure_debut'>Heure de début: <?= get_field('heure_debut')?></p>
            <p class='nombre_dheure_par_seance'>Nombre d'heures par séance: <?= get_field('nombre_dheure_par_seance')?></p>
            <p class='niveau_de_difficulte'>Niveau de difficulté: <?= get_field('niveau_de_difficulte')?></p>
            <p class='lieu_deroulement'>Lieu de déroulement: <?= get_field('lieu_deroulement')?></p>
            <p class='prix_datelier'>Prix d'atelier: <?= get_field('prix_datelier')?></p>
            ?>
            </article>
    <?php endif ?>
</main>
<?php get_footer(); ?>