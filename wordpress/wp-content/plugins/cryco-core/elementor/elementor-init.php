<?php
/**
 * All Elementor widget init
 * @package cryco
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( !class_exists('Cryco_Elementor_Widget_Init') ){

	class Cryco_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/editor/after_enqueue_styles',array($this,'editor_style'));
			add_action('elementor/documents/register_controls',array($this,'register_document_controls'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'cryco_widgets',
				[
					'title' => __( 'Cryco Addons', 'cryco-core' ),
					'icon' => 'fa fa-plug'
				]
			);
			$elements_manager->add_category(
				'cryco_hf_widgets',
				[
					'title' => __( 'Cryco Header & Footer', 'cryco-core' ),
					'icon' => 'fa fa-plug'
				]
			);
		}
		

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(	
				
				// cryco Theme Widgets
				'xb-logo',
				'sec-title',
				'xb-button',
				'countdown',
				'token-info',
				'scroll-down',
				'brand',
				'sub-title',
				'process',
				'distribution',
				'token',
				'token-v2',
				'roadmap',
				'feature',
				'cta',
				'team',
				'faq',
				'event',
				'contact',
				'testimonial',
				'testimonial-v2',
				'xb-social',
				'footer-cta',
				'hero-title',
				'hero-img',
				'brand-v2',
				'feature-v2',
				'parallax-image',
				'feature-v3',
				'feature-v4',
				'feature-v5',
				'funfact',
				'coin-chart',
				'review',
				'integration',
				'faq-v2',
				'contact-v2',
				'footer-cta-v2',
				'footer-links',
				'footer-animation',
				'contact-info',

				// header
				'01-header',
				'02-header',

			);

			$elementor_widgets = apply_filters('cryco_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = CRYCO_DIR_PATH.'/elementor/widgets/'.$widget.'.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}
		}

		public function editor_style(){
			$cs_icon = plugins_url( 'icons.png', __FILE__ );
			wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .cryco-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
		}

		/**
		 * Register additional document controls.
		 *
		 * @param \Elementor\Core\DocumentTypes\PageBase $document The PageBase document instance.
		 */
		public function register_document_controls( $document ) {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

			$document->start_controls_section(
				'body_typography',
				[
					'label' => esc_html__( 'Body Typography', 'cryco-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_body_font',
					'selector' => '{{WRAPPER}}',
				]
			);
			$document->add_control(
				'body_color',
				[
					'label' => esc_html__( 'Body Color', 'cryco-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Heading Color', 'cryco-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h1, h2, h3, h4, h5, h6' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_heading_font',
					'selector' => '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
				]
			);

			$document->end_controls_section();
		}
	}

	if ( class_exists('Cryco_Elementor_Widget_Init') ){
		Cryco_Elementor_Widget_Init::getInstance();
	}

}//end if