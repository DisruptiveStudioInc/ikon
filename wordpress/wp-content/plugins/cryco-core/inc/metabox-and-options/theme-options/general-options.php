<?php

// Create general section
CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'General Options', 'cryco-core' ),
	'id'     => 'general_options',
	'icon'   => 'fa fa-google',
	'fields' => array(

		array(
			'id'     => 'theme_primary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Primary Color', 'cryco-core' ),
			'desc'   => esc_html__( 'You can change other colors from individual Elementor widget\'settings.', 'cryco-core' ),
		),
        array(
            'id'      => 'scroll_up_btn',
            'title'   => esc_html__( 'Scroll Up Button', 'cryco-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Scroll Up Button Hide Show', 'cryco-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'sticky_header_enable',
            'title'   => esc_html__( 'Enable Stikcy Header', 'cryco-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Stikcy Header', 'cryco-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'preloader_enable',
            'title'   => esc_html__( 'Enable Preloader', 'cryco-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Preloader', 'cryco-core' ),
            'default' => true,
        ),
	)
) );