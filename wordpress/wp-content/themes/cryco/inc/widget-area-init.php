<?php

//Register widget area
function cryco_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'cryco'),
		'id'            => 'sidebar',
		'description'   => esc_html__('Add widgets here.', 'cryco'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
    register_sidebar(
        array(
            'name'          => esc_html__( 'Shop Sidebar', 'cryco' ),
            'id'            => 'shop-sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'cryco' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}

add_action('widgets_init', 'cryco_widgets_init');