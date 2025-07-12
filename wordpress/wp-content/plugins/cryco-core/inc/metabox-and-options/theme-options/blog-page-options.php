<?php

// Create blog page options
CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Blog Page', 'cryco-core' ),
	'id'     => 'blog_page_options',
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array(

		array(
			'id'      => 'blog_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__('Blog Layout', 'cryco-core'),
			'options' => array(
				'grid'          => esc_html__('Grid Full', 'cryco-core'),
				'grid-ls'       => esc_html__('Grid With Left Sidebar', 'cryco-core'),
				'grid-rs'       => esc_html__('Grid With Right Sidebar', 'cryco-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'cryco-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'cryco-core'),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__('Select blog page layout.', 'cryco-core'),
		),

		array(
			'id'       => 'blog_banner',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Blog Banner', 'cryco-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Enable or disable blog page banner.', 'cryco-core'),
		),

		array(
			'id'                    => 'blog_banner_background_options',
			'type'                  => 'background',
			'title'                 => esc_html__('Banner Background', 'cryco-core'),
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size' => false,
			'background_position' => false,
			'background_repeat' => false,
			'dependency'            => array('blog_banner', '==', true),
			'output'                => '.breadcrumb.blog-banner',
			'desc'                  => esc_html__('If you want different banner background settings for blog page then select blog page banner background Options from here.', 'cryco-core'),
		),

		array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Title', 'cryco-core'),
			'desc'       => esc_html__('Type blog banner title here.', 'cryco-core'),
            'default'         => esc_html__( 'Blog', 'cryco-core' ),
			'dependency' => array('blog_banner', '==', true),
		),

		array(
			'id'       => 'post_author',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Author Name', 'cryco-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide / Show post author name.', 'cryco-core'),
		),

		array(
			'id'       => 'post_date',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Post Date', 'cryco-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide / Show post date.', 'cryco-core'),
		),

		array(
			'id'         => 'show_category',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Category Name', 'cryco-core'),
			'default'    => false,
			'text_on'    => esc_html__('Yes', 'cryco-core'),
			'text_off'   => esc_html__('No', 'cryco-core'),
			'desc'       => esc_html__('Hide / Show post category name.', 'cryco-core'),
			'dependency' => array('blog_layout', 'any', 'right-sidebar,left-sidebar'),
		),

		array(
			'id'         => 'read_more_button',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Read More Button', 'cryco-core'),
			'default'    => true,
			'text_on'    => esc_html__('Yes', 'cryco-core'),
			'text_off'   => esc_html__('No', 'cryco-core'),
			'desc'       => esc_html__('Hide / Show post read more button.', 'cryco-core'),
		),
	)
) );