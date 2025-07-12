<?php
// Product
CSF::createSection( $cryco_theme_option, array(
    'title'  => esc_html__( 'WooCommerce', 'cryco-core' ),
    'id'     => 'woo_option',
    'icon'  => 'fa fa-shopping-cart',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Shop Breadcrumb', 'cryco-core' ) . '</h3>',
        ),

        array(
            'id'      => 'product_count',
            'title'   => esc_html__( 'Product Count', 'cryco-core' ),
            'type'    => 'text',
            'default' => '12',
        ),
        array(
            'id'       => 'enable_shop_breadcrumb',
            'type'     => 'switcher',
            'title'    => __( 'Page Breadcrumb', 'cryco-core' ),
            'text_on'  => __( 'Yes', 'cryco-core' ),
            'text_off' => __( 'No', 'cryco-core' ),
            'default'  => true
        ),
  
        array(
            'id'                    => 'banner_shop_background',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'cryco-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.shop-breadcrumb',
            'dependency' => array( 'enable_shop_breadcrumb', '==', 'true' ),
        ),
        array(
            'id'      => 'shop_breadcrumb_title',
            'title'   => esc_html__( 'Shop Breadcrumb Title', 'cryco-core' ),
            'type'    => 'text',
            'dependency' => array( 'enable_shop_breadcrumb', '==', 'true' ),
        ),

        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Single Product Breadcrumb', 'cryco-core' ) . '</h3>',
        ),
        array(
            'id'       => 'enable_single_product_preadcrumb',
            'type'     => 'switcher',
            'title'    => __( 'Page Breadcrumb', 'cryco-core' ),
            'text_on'  => __( 'Yes', 'cryco-core' ),
            'text_off' => __( 'No', 'cryco-core' ),
            'default'  => true
        ),
        array(
            'id'                    => 'product_single_breadcrumb_bg',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'cryco-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.shop-single-breadcrumb',
            'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
        ),
        array(
            'id'      => 'product_single_breadcrumb_title',
            'title'   => esc_html__( 'Shop Single Breadcrumb Title', 'cryco-core' ),
            'type'    => 'text',
            'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
        ),

    ),
) );