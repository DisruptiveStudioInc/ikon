<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*
 *  Create theme options
 */

$cryco_theme_option = 'cryco_theme_options';

// Create options
CSF::createOptions( $cryco_theme_option, array(
    'framework_title' => wp_kses(
        sprintf(__("Cryco Options <small>V %s</small>", 'cryco-core'), $cryco_core_data->get('Version')),
        array('small' => array())
    ),
	'menu_title'      => __('Theme Options','cryco-core'),
	'menu_slug'       => 'cryco-options',
    'enqueue_webfont'    => true,
    'show_in_customizer' => true,
    'menu_icon' => 'dashicons-category',
	'show_sub_menu'   => false,
	'class'           => 'cryco-theme-option',
	'menu_position'   =>3,
	'footer_text'   => wp_kses(
		__( 'Developed by: <a target="_blank" href="https://crycobuddy.com">XpressBuddy</a>', 'cryco-core' ),
		array(
			'a'      => array(
				'href'   => array(),
				'target' => array()
			),
		)
	),
	'async_webfont' => false,
) );

/*
 * General options
 */
require_once 'general-options.php';

/*
 * Typography options
 */
require_once 'typography-options.php';


/*
 * Header options
 */
require_once 'header-options.php';

/*
 * Banner options
 */
require_once 'banner-options.php';

/*
 * Page Options
 */
require_once 'page-options.php';


/*
 * Blog page options
 */
require_once 'blog-page-options.php';

/*
 * Signle Post options
 */
require_once 'single-post-options.php';

/*
 * Archive Page Options
 */
require_once 'archive-page-options.php';

/*
 * Search Page Options
 */
require_once 'search-page-options.php';

/*
 * Error 404 Page Options
 */
require_once 'error-page-options.php';

/*
 * Footer options
 */
require_once 'footer-options.php';

// Custom Css section
CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Custom Css', 'cryco-core' ),
	'id'     => 'custom_css_options',
	'icon'   => 'fa fa-css3',
	'fields' => array(

		array(
			'id'       => 'cryco_custom_css',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'Custom Css', 'cryco-core' ),
			'settings' => array(
				'theme'  => 'mbo',
				'mode'   => 'css',
			),
			'sanitize' => false,
		),
	)
) );


/*
 * Backup options
 */
CSF::createSection($cryco_theme_option, array(
	'title'  => esc_html__('Backup', 'cryco-core'),
	'id'     => 'backup_options',
	'icon'   => 'fa fa-window-restore',
	'fields' => array(
		array(
			'type' => 'backup',
		),
	)
));

