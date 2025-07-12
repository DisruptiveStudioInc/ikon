<?php
// Register custom widget
function register_top_rated_products_widget() {
    register_widget('Top_Rated_Products_Widget');
}
add_action('widgets_init', 'register_top_rated_products_widget');

// Custom widget class
class Top_Rated_Products_Widget extends WP_Widget {
    // Widget setup
    public function __construct() {
        parent::__construct(
            'top_rated_products_widget',
            __('Xpress Top Rated Products', 'text_domain'),
            array('description' => __('Display top rated products in the sidebar.', 'text_domain'))
        );
    }

    // Widget form
    public function form($instance) {
        // Widget form fields
        $title = !empty($instance['title']) ? $instance['title'] : __('Top Rated Products', 'text_domain');
        $number = !empty($instance['number']) ? $instance['number'] : 4;

        // Title field
        echo '<p>';
        echo '<label for="' . $this->get_field_id('title') . '">Title:</label>';
        echo '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" />';
        echo '</p>';

        // Number field
        echo '<p>';
        echo '<label for="' . $this->get_field_id('number') . '">Number of Products:</label>';
        echo '<input class="widefat" id="' . $this->get_field_id('number') . '" name="' . $this->get_field_name('number') . '" type="number" value="' . esc_attr($number) . '" />';
        echo '</p>';
    }

    // Widget update
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? sanitize_text_field($new_instance['number']) : '';
        return $instance;
    }

    // Widget output
    public function widget($args, $instance) {
        // Widget content goes here
        echo $args['before_widget'];

        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="widget__inner">';
        echo '<ul class="widget-product">';

        // Query top-rated products
        $top_rated_products = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => $instance['number'],
            'meta_key' => '_wc_average_rating',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        ));

        // Loop through top-rated products
        while ($top_rated_products->have_posts()) {
            $top_rated_products->the_post();
            echo '<li class="widget-product__item">';
            echo '<div class="thumb">';
            echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a>';
            echo '</div>';
            echo '<div class="content">';
            echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            echo '<span class="price">' . wc_price(get_post_meta(get_the_ID(), '_price', true)) . '</span>';
            echo '</div>';
            echo '</li>';
        }

        // Reset post data
        wp_reset_postdata();

        echo '</ul>';
        echo '</div>';
        echo $args['after_widget'];
    }
}
