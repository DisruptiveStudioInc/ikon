<?php
/*
Plugin Name: Cryco Core
Plugin URI: https://themeforest.net/user/xpressbuddy
Description: After install the Cryco WordPress Theme, you must need to install this "cryco-core" first to get all functions of Cryco WP Theme.
Author: XpressBuddy
Author URI: http://xpressbuddy.com/
Version: 1.0.0
Text Domain: cryco-core
*/
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$cryco_core_data = wp_get_theme();
/**
 * Define Core Path
 */
define( 'CRYCO_CORE_VERSION', (WP_DEBUG) ? time() : $cryco_core_data->get('Version'));
define( 'CRYCO_DIR_PATH',plugin_dir_path(__FILE__) );
define( 'CRYCO_DIR_URL',plugin_dir_url(__FILE__) );
define( 'CRYCO_INC_PATH', CRYCO_DIR_PATH . '/inc' );
define( 'CRYCO_PLUGIN_IMG_PATH', CRYCO_DIR_URL . '/assets/img' );

/**
 * Css Framework Load
 */
if ( file_exists(CRYCO_DIR_PATH.'/lib/codestar-framework/codestar-framework.php') ) {
    require_once  CRYCO_DIR_PATH.'/lib/codestar-framework/codestar-framework.php';
}

// Elementor - Remove Font Awesome 
add_action( 'elementor/frontend/after_register_styles',function() {
    foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
      wp_deregister_style( 'elementor-icons-fa-' . $style );
    }
  }, 20 );

/**
 * Deregister Elementor Animation
 *
 * @return void
 */
function cryco_de_reg() {
    wp_deregister_style( 'e-animations' );
}
add_action( 'wp_enqueue_scripts', 'cryco_de_reg' );

/**
 * Enqueue Admin Style
 *
 * @return void
 */
function cryco_enqueue_admin_customstyle() {
    wp_enqueue_style( 'admin-style', CRYCO_DIR_URL . '/assets/css/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'cryco_enqueue_admin_customstyle' );

// Enqueue Script
add_action('elementor/frontend/after_register_scripts', 'script');
function script(){
    wp_enqueue_script('editor-script', CRYCO_DIR_URL . 'assets/js/editor-script.js', '', '', true);
}

function dequeue_wpml_styles(){
    wp_dequeue_style( 'swiper' );
    wp_deregister_style( 'swiper' );

    wp_dequeue_script( 'swiper' );
    wp_deregister_script( 'swiper' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_wpml_styles', 20 );

/**
 * Script Remove
 *
 * @return  [type]  [return description]
 */
function remove_jquery_sticky() {
		wp_dequeue_script( 'swiper' );
		wp_deregister_script( 'swiper' );
}
add_action( 'elementor/frontend/after_register_scripts', 'remove_jquery_sticky' );


/**
 * Custom Widget
 */
include_once CRYCO_INC_PATH . "/custom-widget/recent-post-widget.php";

/**
 * Offer Product Widget
 */
include_once CRYCO_INC_PATH . "/custom-widget/top-rated-products-widget.php";

/**
 * Plugin Helper
 */
include_once CRYCO_INC_PATH . "/cryco-plugin-helper.php";

/**
 * Themeoption
 */
include_once CRYCO_INC_PATH . "/metabox-and-options/metabox-and-options.php";


/**
 * Helper Function
 */
include_once CRYCO_INC_PATH . "/helper.php";

/**
 * Custom Post
 */
include_once CRYCO_INC_PATH . "/post-type/header-footer.php";


/**
 * Elementor Configuration
 */
include_once CRYCO_DIR_PATH . "/elementor/elementor-init.php";

add_filter('wpcf7_autop_or_not', '__return_false');