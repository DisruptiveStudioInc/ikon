<?php

$cryco_theme_data = wp_get_theme();

/*
 * Define theme version
 */
define('CRYCO_VERSION', (WP_DEBUG) ? time() : $cryco_theme_data->get('Version'));

/*
 * Inc folder directory
 */
define('CRYCO_INC_DIR', get_template_directory() . '/inc/');

/*
 * After setup theme
 */
require_once CRYCO_INC_DIR . 'theme-setup.php';

/*
 * Load default theme options
 */
 require_once CRYCO_INC_DIR . 'cs-framework-functions.php';

/**
 * Template Functions
 */
require CRYCO_INC_DIR . 'template-functions.php';

/*
 * Enqueue styles and scripts.
 */
require_once CRYCO_INC_DIR . 'css-and-js.php';

/*
 * Register widget area
 */
require_once CRYCO_INC_DIR . 'widget-area-init.php';

/**
 * tgmp functions file
 */
require_once CRYCO_INC_DIR . 'class-tgm-plugin-activation.php';
require_once CRYCO_INC_DIR . 'add-plugin.php';

/*
 * Load inline style.
 */
require_once CRYCO_INC_DIR . 'inline-style.php';

/**
 * Implement the Custom Header feature.
 */
require CRYCO_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require CRYCO_INC_DIR . 'class-wp-cryco-navwalker.php';

/**
 * cryco Core Functions
 */
require CRYCO_INC_DIR . 'cryco-helper-class.php';

/**
 * Customizer additions.
 */
require CRYCO_INC_DIR . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require CRYCO_INC_DIR . '/jetpack.php';
}

/*
 * Comment Template
 */
require_once CRYCO_INC_DIR . 'comment-template.php';

/*
 * Import Demo Content
 */
require_once CRYCO_INC_DIR . 'demo-content/import-demo-content.php';


