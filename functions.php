<?php

/**
 * 31w functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 31w
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.1');
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mon_31w_setup()
{
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form'));
    add_theme_support('custom-background');
    register_nav_menus(array(
        'sidebar_menu' => __('Sidebar Menu', 'mon_31w'),
        'footer_menu'  => __('Footer Menu', 'mon_31w'),
        'accueil_menu' => __('Accueil Menu', 'mon_31w')
    ));
}

add_action('after_setup_theme', 'mon_31w_setup');

/* -----------------------------------------------*/

function prefix_nav_description($item_output, $item)
{
    if (!empty($item->description)) {
        $item_output = str_replace(
            '</a>',
            '<hr><span class="menu-item-description">' . $item->description . '</span><div class="menu-item-icone"></div></a>',
            $item_output
        );
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 2);


/* -----------------------------------------------*/

function mon_31w_enqueue()
{
    wp_enqueue_style('mon_31w-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));

    wp_enqueue_style('31w-google-font', 'https://fonts.googleapis.com/css2?family=Arima&display=swap', false);
}
add_action('wp_enqueue_scripts', 'mon_31w_enqueue');


/* ----------------------------------------------*/
/**
 * Permet de modifier la requête principale de la page d'accueil
 * pour extraire uniquement les articles de catégorie « accueil » 
 * @param : $query représente l'object WP_Query contenant la requête principale
 */

function mon_31w_pre_get_posts_accueil($query)
{
    if (
        $query->is_home()
        && $query->is_main_query()
        && !is_admin()
    ) {
        $query->set('category_name', 'accueil');
    }
}
add_action('pre_get_posts', 'mon_31w_pre_get_posts_accueil');
