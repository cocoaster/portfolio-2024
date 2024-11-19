<?php
function my_theme_enqueue_styles() {
    // Charger le style du thème parent en premier
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Version dynamique basée sur la date de modification du fichier style.css dans le dossier css du thème enfant
    $child_style_version = filemtime(get_stylesheet_directory() . '/css/style.css');  // Changer le chemin ici

    // Charger le style principal du thème enfant (qui est dans le dossier css) après le parent
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.css', array('parent-style'), $child_style_version);

    // Charger les différents fichiers CSS supplémentaires avec la version dynamique
    $slider_style_version = filemtime(get_stylesheet_directory() . '/css/slider.css');
    $front_page_style_version = filemtime(get_stylesheet_directory() . '/css/front-page.css');
 

    wp_enqueue_style('slider-style', get_stylesheet_directory_uri() . '/css/slider.css', array(), $slider_style_version);
    wp_enqueue_style('front-page-style', get_stylesheet_directory_uri() . '/css/front-page.css', array(), $front_page_style_version);
    
    // Charger le script JavaScript pour l'animation fade-in-up
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), null, true );
    add_action( 'wp_enqueue_scripts', 'add_custom_script' );
    
    // Fichier JavaScript personnalisé pour le slider
    $slider_script_version = filemtime(get_stylesheet_directory() . '/js/slider.js');
    wp_enqueue_script('slider-script', get_stylesheet_directory_uri() . '/js/slider.js', array('jquery'), $slider_script_version, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


// Inclusion des fichiers additionnels pour gérer les Custom Post Types
require_once get_stylesheet_directory() . '/inc/custom-slider.php';

// Synchronize customizer options from parent theme
if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value;
    }, 10, 2);

    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}

?>
