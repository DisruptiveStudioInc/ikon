<?php

// Create banner options
CSF::createSection($cryco_theme_option, array(
	'title'  => esc_html__('Banner Options', 'cryco-core'),
	'id'     => 'banner_default_options',
	'icon'   => 'fa fa-flag-o',
	'fields' => array(

        array(
            'id'                    => 'banner_default_background',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'cryco-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.breadcrumb',
            'desc'                  => esc_html__( 'Select banner background color and image. You can change this settings on individual page / post.', 'cryco-core' ),
        ),

        array(
            'id'     => 'animation_icon',
            'type'   => 'fieldset',
            'title'  => 'Animation Icon',
            'fields' => array(
                array(
                    'id' =>'icon1',
                    'type'=>'media',
                    'title'=>esc_html__( 'Icon 1', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'icon2',
                    'type'=>'media',
                    'title'=>esc_html__( 'Icon 2', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'icon3',
                    'type'=>'media',
                    'title'=>esc_html__( 'Icon 3', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'icon4',
                    'type'=>'media',
                    'title'=>esc_html__( 'Icon 4', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
            ),
        ),

		array(
			'id'         => 'banner_default_text_align',
			'type'       => 'button_set',
			'title'      => esc_html__( 'Banner Text Align', 'cryco-core' ),
			'options'    => array(
				'start'   => esc_html__( 'Left', 'cryco-core' ),
				'center' => esc_html__( 'Center', 'cryco-core' ),
				'end'  => esc_html__( 'Right', 'cryco-core' ),
			),
			'default'    => 'center',
			'desc'       => esc_html__( 'Select banner text align. You can change this settings on individual page / post.', 'cryco-core' ),
		),

		array(
			'id'          => 'banner_default_height',
			'type'        => 'slider',
			'title'       => esc_html__('Banner Height', 'cryco-core'),
			'min'         => 100,
			'max'         => 800,
			'step'        => 1,
			'unit'        => 'px',
			'output'      => '.breadcrumb',
			'output_mode' => 'height',
			'desc'        => esc_html__('Select banner height. You can change this settings on individual page / post.', 'cryco-core'),
		),
	)
));