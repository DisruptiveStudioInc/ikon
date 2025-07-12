<?php
/**
 * Enqueue parent and child stylesheets
 *
 * @return void
 */
function cryco_child_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 'cryco-style', get_template_directory_uri() . '/style.css' );

    // Enqueue child theme stylesheet (this will override parent styles if selectors are the same)
    wp_enqueue_style( 'cryco-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cryco-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'cryco_child_enqueue_styles' );
?>
