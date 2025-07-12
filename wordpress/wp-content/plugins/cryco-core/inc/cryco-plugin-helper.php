<?php
/**
 * cryco Theme Helper Class
 *
 *
 * @class        Cryco_Plugin_Helper
 * @version      1.0
 * @category     Class
 * @author       ThemeTags
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Cryco_Plugin_Helper')) {
    class Cryco_Plugin_Helper
    {

        /**
         * Get Header Template Type
         *
         * @return  [type]  [return description]
         */
        public static function get_header_types()
        {
            $header = ['' => esc_html__('Default', 'cryco-core')];
            $headers = get_posts(
                [
                    'posts_per_page' => -1,
                    'post_type' => 'cryco_template',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'cryco_template_type',
                            'value' => 'tf_header_key',
                            'compare' => '='
                        )
                    )
                ]
            );
            foreach ($headers as $value) {
                $header[$value->ID] = $value->post_title;
            }
            return $header;
        }

        /**
         * Get Footer Template Type
         *
         * @return  [type]  [return description]
         */
        public static function get_footer_types()
        {
            $footer = ['' => esc_html__('Default', 'cryco-core')];
            $footers = get_posts(
                [
                    'posts_per_page' => -1,
                    'post_type' => 'cryco_template',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'cryco_template_type',
                            'value' => 'tf_footer_key',
                            'compare' => '='
                        )
                    )
                ]
            );
            foreach ($footers as $value) {
                $footer[$value->ID] = $value->post_title;
            }
            return $footer;
        }

        /**
         * Render Header
         *
         * @param   [type]  $header_style  [$header_style description]
         *
         * @return  [type]                 [return description]
         */
        public static function cryco_render_header($header_style)
        {
            $elementor_instance = Elementor\Plugin::instance();
            return $elementor_instance->frontend->get_builder_content_for_display($header_style);
        }


        /**
         * Render Footer
         *
         * @param   [type]  $footer_style  [$footer_style description]
         *
         * @return  [type]                 [return description]
         */
        public static function cryco_render_footer($footer_style)
        {
            $elementor_instance = Elementor\Plugin::instance();
            return $elementor_instance->frontend->get_builder_content_for_display($footer_style);
        }

    }

    // Instantiate theme
    new Cryco_Plugin_Helper();
}