<?php
$cryco_common_meta = 'cryco_common_meta';

// Create a metabox
CSF::createMetabox($cryco_common_meta, array(
	'title'     => esc_html__('Settings', 'cryco-core'),
	'post_type' => array('page', 'post'),
	'data_type' => 'serialize',
));

// Create layout section
CSF::createSection($cryco_common_meta, array(
	'title'  => esc_html__('Layout Settings ', 'cryco-core'),
	'icon'   => 'fa fa-calculator',
	'fields' => array(

		array(
			'id'      => 'layout_meta',
			'type'    => 'select',
			'title'   => esc_html__('Layout', 'cryco-core'),
			'options' => array(
				'default'       => esc_html__('Default', 'cryco-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'cryco-core'),
				'full-width'    => esc_html__('Full Width', 'cryco-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'cryco-core'),
			),
			'default' => 'default',
			'desc'    => esc_html__('Select layout', 'cryco-core'),
		),

		array(
			'id'         => 'sidebar_meta',
			'type'       => 'select',
			'title'      => esc_html__('Sidebar', 'cryco-core'),
			'options'    => 'cryco_sidebars',
			'dependency' => array('layout_meta', '!=', 'full-width'),
			'desc'       => esc_html__('Select sidebar you want to show with this page.', 'cryco-core'),
		),
	)
));

// Create layout section
CSF::createSection($cryco_common_meta, array(
	'title'  => esc_html__('Header Settings ', 'cryco-core'),
	'icon'   => 'fa fa-header',
	'fields' => array(

        array(
            'id'       => 'meta_header_type',
            'type'     => 'switcher',
            'title'    => __( 'Header Style', 'cryco-plugin' ),
            'text_on'  => __( 'Yes', 'cryco-plugin' ),
            'text_off' => __( 'No', 'cryco-plugin' ),
            'default'  => false
        ),
        array(
            'id'          => 'meta_header_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Header Style', 'cryco-plugin' ),
            'options'     => Cryco_Plugin_Helper::get_header_types(),
            'dependency' => array( 'meta_header_type', '==', 'true' ),
        ),
        array(
            'id'       => 'page_header_disable',
            'type'     => 'switcher',
            'title'    => __( 'Disable This page Header?', 'cryco-plugin' ),
            'text_on'  => __( 'Yes', 'cryco-plugin' ),
            'text_off' => __( 'No', 'cryco-plugin' ),
            'default'  => false
        ),
	)
));

// Breadcrumb Section
CSF::createSection( $cryco_common_meta, array(
    'title'  => 'Page Settings',
    'icon'   => 'fas fa-pager',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Page Color', 'cryco-core' ),
        ),

        array(
            'id'     => 'page-bg-color',
            'type'   => 'color',
            'title'  => 'Page Background Color',
            'output' => array( 'background' => 'body', 'background-color' => '.cryco-main-wrap' )
        ),
        array(
            'id'      => 'border_enable',
            'title'   => esc_html__( 'Enable Left Right Border', 'cryco-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Left Right Border', 'cryco-core' ),
            'default' => false,
        ),

    )
) );

// Create a section
CSF::createSection($cryco_common_meta, array(
	'title'  => esc_html__('Banner Settings', 'cryco-core'),
	'icon' => 'fa fa-flag-o',
	'fields' => array(
		array(
			'id'       => 'enable_banner',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Banner', 'cryco-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Enable or disable banner.', 'cryco-core'),
		),

		array(
			'id'                    => 'banner_background_meta',
			'type'                  => 'background',
			'title'                 => esc_html__('Banner Background', 'cryco-core'),
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'dependency'            => array('enable_banner', '==', true),
			'output'                => '.breadcrumb.post-banner,.breadcrumb.page-banner',
			'desc'                  => esc_html__('Select banner background color and image', 'cryco-core'),
		),

		array(
			'id'         => 'custom_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Custom Title', 'cryco-core'),
			'dependency' => array('enable_banner', '==', true),
			'desc'       => esc_html__('If you want to use custom title write title here.If you don\'t, leave it empty.', 'cryco-core')
		),

		array(
			'id'         => 'banner_text_align_meta',
			'type'       => 'select',
			'title'      => esc_html__('Banner Text Align', 'cryco-core'),
			'options'    => array(
				'default' => esc_html__('Default', 'cryco-core'),
				'left'    => esc_html__('Left', 'cryco-core'),
				'center'  => esc_html__('Center', 'cryco-core'),
				'right'   => esc_html__('Right', 'cryco-core'),
			),
			'default'    => 'default',
			'dependency' => array('enable_banner', '==', true),
			'desc'       => esc_html__('Select page banner text align.', 'cryco-core'),
		),

		array(
			'id'          => 'banner_height_meta',
			'type'        => 'slider',
			'title'       => esc_html__('Banner Height', 'cryco-core'),
			'min'         => 100,
			'max'         => 800,
			'step'        => 1,
			'unit'        => 'px',
			'output'      => '.breadcrumb.post-banner,.breadcrumb.page-banner',
			'output_mode' => 'height',
			'subtitle'    => esc_html__('Select banner min height.', 'cryco-core'),
			'desc'        => esc_html__('Select banner min height.', 'cryco-core'),
			'dependency'  => array('enable_banner', '==', true),
		),
	)
));


// Create Footer section
CSF::createSection($cryco_common_meta, array(
	'title'  => esc_html__('Footer Options', 'cryco-core'),
	'icon' => 'fa fa-wordpress',
	'fields' => array(

        array(
            'id'       => 'meta_footer_type',
            'type'     => 'switcher',
            'title'    => __( 'Footer Style', 'cryco-core' ),
            'text_on'  => __( 'Yes', 'cryco-core' ),
            'text_off' => __( 'No', 'cryco-core' ),
            'default'  => false
        ),
        array(
            'id'          => 'meta_footer_style',
            'type'        => 'select',
            'title'       => __('Select Footer Style', 'cryco-core' ),
            'options'     => Cryco_Plugin_Helper::get_footer_types(),
            'dependency' => array( 'meta_footer_type', '==', 'true' ),
        ),
        array(
            'id'      => 'page_footer_sticky_disable',
            'title'   => esc_html__( 'Disable Stikcy Footer', 'cryco-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Disable or Disable Stikcy Footer', 'cryco-core' ),
            'default' => false,
        ),
        array(
            'id'       => 'page_footer_disable',
            'type'     => 'switcher',
            'title'    => __( 'DIsable This page Footer?', 'cryco-core' ),
            'text_on'  => __( 'Yes', 'cryco-core' ),
            'text_off' => __( 'No', 'cryco-core' ),
            'default'  => false
        ),

	)
));

/*-------------------------------------
    Page Options
    -------------------------------------*/

