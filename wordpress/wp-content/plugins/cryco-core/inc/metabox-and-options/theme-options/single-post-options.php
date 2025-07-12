<?php
//Single Post

CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Single Post / Post Details', 'cryco-core' ),
	'id'     => 'single_post_options',
	'icon'   => 'fa fa-pencil',
	'fields' => array(

		array(
			'id'      => 'single_post_default_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__( 'Layout', 'cryco-core' ),
			'options' => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'cryco-core' ),
				'full-width'    => esc_html__( 'Full Width', 'cryco-core' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'cryco-core' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select single post layout', 'cryco-core' ),
		),


		array(
			'id'         => 'single_post_default_sidebar',
			'type'       => 'select',
            'chosen'      => true,
			'title'      => esc_html__( 'Sidebar', 'cryco-core' ),
			'options'    => 'cryco_sidebars',
			'default' => 'sidebar',
			'dependency' => array( 'single_post_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all posts. You can override this settings on individual post.', 'cryco-core' ),
		),

		array(
			'id'       => 'show_default_title',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Post Title On Banner?', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Show post title on single post banner area. Default title is "Blog Details" for all single post.', 'cryco-core'),
			'default'  => true,
		),


		array(
			'id'         => 'single_post_banner_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Default Title', 'cryco-core'),
			'desc'       => esc_html__('Default banner title for all single post.', 'cryco-core'),
			'default'       => esc_html__('Blog Details', 'cryco-core'),
			'dependency' => array( 'show_default_title', '==', 'false' ),
		),

		array(
			'id'       => 'single_post_breadcrumb',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Breadcrumb', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show banner breadcrumb on single post.', 'cryco-core'),
			'default'  => true,
		),

		array(
			'id'       => 'single_post_author',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Author Name', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show author name on post details page.', 'cryco-core'),
			'default'  => true
		),

		array(
			'id'       => 'single_post_date',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Date', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show date on post details page.', 'cryco-core'),
			'default'  => true
		),

		array(
			'id'       => 'single_post_cmnt',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Comments Number', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show comments number on post details page.', 'cryco-core'),
			'default'  => true,
		),

		array(
			'id'       => 'single_post_catd',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Categories', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show categories on post details page.', 'cryco-core'),
			'default'  => false
		),

		array(
			'id'       => 'single_post_tag',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Tags', 'cryco-core'),
			'text_on'  => esc_html__('Yes', 'cryco-core'),
			'text_off' => esc_html__('No', 'cryco-core'),
			'desc'     => esc_html__('Hide or show tags on post details page.', 'cryco-core'),
			'default'  => true
		),
	)
) );