<?php

// Create Page Options
CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Page Options', 'cryco-core' ),
	'id'     => 'page_options',
	'icon'   => 'fa fa-file-text-o',
	'fields' => array(
		array(
			'id'      => 'page_default_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__('Page Layout', 'cryco-core'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'cryco-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'cryco-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'cryco-core'),
			),
			'default' => 'full-width',
			'desc'    => esc_html__('Select page layout.', 'cryco-core'),
		),

		array(
			'id'         => 'page_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'cryco-core' ),
			'options'    => 'cryco_sidebars',
			'default' => 'sidebar',
			'dependency' => array( 'page_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all pages. You can override this settings on individual page.', 'cryco-core' ),
		),
	)
) );