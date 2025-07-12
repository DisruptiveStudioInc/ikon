<?php
// Create Footer section

CSF::createSection( $cryco_theme_option, array(
	'title'  => esc_html__( 'Footer Options', 'cryco-core' ),
	'icon'   => 'fa fa-credit-card',
	'fields' => array(
        array(
            'id'          => 'footer_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Footer Style', 'cryco-core' ),
            'options'     => Cryco_Plugin_Helper::get_footer_types(),
        ),

        array(
            'id'            => 'footer_copyright',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'cryco-core' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'cryco-core' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'default'         => esc_html__( '© Cryco 2024 | All Right Reserved', 'cryco-core' ),
            'media_buttons' => false,
        ),

	)
) );



























