<?php
//Search Options

CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Search Page', 'cryco-core' ),
	'id'     => 'search_page_options',
	'icon'   => 'fa fa-search',
	'fields' => array(

		array(
			'id'      => 'search_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__( 'Search Layout', 'cryco-core' ),
			'options' => array(
				'grid'          => esc_html__( 'Grid Full', 'cryco-core' ),
				'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'cryco-core' ),
				'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'cryco-core' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'cryco-core' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'cryco-core' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select search page layout.', 'cryco-core' ),
		),

		array(
			'id'       => 'search_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Search Banner', 'cryco-core' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'cryco-core' ),
			'text_off' => esc_html__( 'No', 'cryco-core' ),
			'desc'     => esc_html__( 'Enable or disable search page banner.', 'cryco-core' ),
		),

		array(
			'id'                    => 'search_banner_background_options',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background', 'cryco-core' ),
			'background_gradient'   => true,
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'dependency'            => array( 'search_banner', '==', true ),
			'output'                => '.breadcrumb.search-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for search page then select search page banner background options from here.', 'cryco-core' ),
		),

	)
) );