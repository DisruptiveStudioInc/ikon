<?php
if(!function_exists('cryco_page_template_type')  ){
    function cryco_page_template_type(){
        register_post_type( 'cryco_template',
            array(
                'labels' => array(
                    'name' => __( 'Header & Footer','cryco-core' ),
                    'singular_name' => __( 'Template','cryco-core' ),
                ),
                'public' => true,
                'rewrite' => array('slug' => 'header-footer'),
                'publicly_queryable' => true,
                'show_in_menu'      => true,
                'menu_icon' => 'dashicons-align-wide',
                'supports' => ['title', 'elementor']
            )
        );
    }
    add_action( 'init','cryco_page_template_type',2 );
}
