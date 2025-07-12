<?php
// Create header Settings section
CSF::createSection( $cryco_theme_option, array(
	'title' => esc_html__( 'Header Settings', 'xpress-core' ),
	'id'    => 'header_options',
	'icon'  => 'fa fa-header',
) );

CSF::createSection( $cryco_theme_option, array(
    'parent' => 'header_options',
	'title'  => esc_html__( 'Header Options', 'cryco-core' ),
	'icon'   => 'fa fa-header',
	'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Header Layout', 'cryco-tools' ) . '</h3>',
        ),

        array(
            'id'          => 'header_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Header Style', 'cryco-tools' ),
            'options'     => Cryco_Plugin_Helper::get_header_types(),
        ),

        array(
            'id' =>'header_default_logo',
            'type'=>'media',
            'title'=>esc_html__( 'Header Logo', 'cryco-core' ),
            'library'      => 'image',
            'url'          => false,
            'button_title' => esc_html__( 'Upload Logo', 'cryco-core' ),
            'desc'         => esc_html__( 'Upload logo image', 'cryco-core' ),
        ),

        array(
            'id'          => 'logo_maximum_width',
            'type'        => 'slider',
            'title'       => esc_html__( 'Logo Maximum Width', 'cryco-core' ),
            'min'         => 50,
            'max'         => 500,
            'step'        => 1,
            'unit'        => 'px',
            'output'      => '.header-logo img',
            'output_mode' => 'max-width',
            'desc'        => esc_html__( 'Logo image maximum width', 'cryco-core' ),
        ),
    )
) );

// Sidebar Option
CSF::createSection( $cryco_theme_option, array(
    'parent' => 'header_options',
    'title'  => 'Overlay Menu',
    'id'     => 'overlay_menu_options',
    'icon'   => 'fa fa-bars',
    'fields' => array(
        array(
            'id'      => 'is_enable_overlay_menu',
            'type'    => 'switcher',
            'title'   => 'Switcher',
            'label'    => esc_html__( 'Do you want Overlay Menu? ', 'cryco-core' ),
            'default' => true
        ),

        array(
            'id'      => 'brief_us_title',
            'title'   => esc_html__( 'Brief us TItle', 'cryco-core' ),
            'type'    => 'text',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),

        array(
            'id'      => 'om_mail',
            'title'   => esc_html__( 'Mail', 'cryco-core' ),
            'type'    => 'text',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),
        array(
            'id'      => 'om_number',
            'title'   => esc_html__( 'Number', 'cryco-core' ),
            'type'    => 'text',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),
        array(
            'id'      => 'om_address_title',
            'title'   => esc_html__( 'Address TItle', 'cryco-core' ),
            'type'    => 'text',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),
        array(
            'id'      => 'om_address',
            'title'   => esc_html__( 'Address', 'cryco-core' ),
            'type'    => 'textarea',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),
        array(
            'id'      => 'follow_title',
            'title'   => esc_html__( 'Follow Us TItle', 'cryco-core' ),
            'type'    => 'text',
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],
        ),

        array(
            'id'         => 'om_social_icons',
            'type'       => 'group',
            'title'      => 'Add Social Icon',
            'fields'     => array(
                array(
                    'id'    => 'social_title',
                    'type'  => 'text',
                    'title' => esc_html__( 'Social Title', 'cryco-core' ),
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Social Link', 'cryco-core' ),
                ),

            ),
            'dependency'  => [
                'is_enable_overlay_menu', '==', 'true',
            ],

        ),

    ),
) );