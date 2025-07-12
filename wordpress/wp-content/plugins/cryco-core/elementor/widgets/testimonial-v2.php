<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Testimonial_V2 extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'int-testimonial-v2';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Testimonial V2', 'cryco-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'cryco-custom-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['cryco_widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_option',
            [
                'label' => esc_html__('Content', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Avatar', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'flag',
            [
                'label' => esc_html__('Flag', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'country_name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Country Name', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Name', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'desig',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Designation', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Content', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'brand_logo',
            [
                'label' => esc_html__('Brand Logo', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'rating_number',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'rating',
            [
                'label' => esc_html__( 'Rating', 'cryco-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 5,
                'default' => 5,
            ]
        );
        $this->add_control(
            'lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Style', 'cryco-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'border_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-testimonial-wrap::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Border Color', 'cryco-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'country_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'country-c',
            [
                'label' => esc_html__('Country Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial-wrap .xb-item--nationality span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'country_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial-wrap .xb-item--nationality span',
            ]
        );
        $this->add_control(
            'name_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'name-c',
            [
                'label' => esc_html__('Name Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial-wrap .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial-wrap .xb-item--title',
            ]
        );
        $this->add_control(
            'desig_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'desig-c',
            [
                'label' => esc_html__('Designation Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial-wrap .xb-item--sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial-wrap .xb-item--sub-title',
            ]
        );
        $this->add_control(
            'content-c',
            [
                'label' => esc_html__('Content Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial-wrap .xb-item--content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial-wrap .xb-item--content p',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_img = CRYCO_DIR_URL . 'assets/img/tm_bg.png';
        ?>
        <div class="xb-testimonial-wrap">
            <div class="xb-testimonial-slider swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($settings['lists'] as $list):
                        ?>
                        <div class="swiper-slide ul_li">
                            <div class="xb-item--author text-center">
                                <div class="xb-item--avater">
                                    <?php echo wp_get_attachment_image($list['image']['id'], 'full'); ?>
                                </div>
                                <div class="xb-item--holder">
                                    <div class="xb-item--nationality align-items-center">
                                        <?php echo wp_get_attachment_image($list['flag']['id'], 'thumbnail'); ?>
                                        <span><?php echo esc_html($list['country_name']); ?></span>
                                    </div>
                                    <h3 class="xb-item--title"><?php echo esc_html($list['name']); ?></h3>
                                    <span class="xb-item--sub-title"><?php echo esc_html($list['desig']); ?></span>
                                </div>
                            </div>
                            <div class="xb-item--content">
                                <p>
                                    <?php echo wp_kses($list['content'], true); ?>
                                </p>
                                <div class="xb-item--reating ul_li">
                                    <?php echo wp_get_attachment_image($list['brand_logo']['id'], 'thumbnail'); ?>
                                    <span><?php echo esc_html($list['rating_number']) ?></span>
                                    <ul class="xb-star ul_li">
                                        <?php if ($list['rating'] == '1'): ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                        <?php elseif ($list['rating'] == '2'): ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                        <?php elseif ($list['rating'] == '3'): ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                        <?php elseif ($list['rating'] == '4'): ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                        <?php elseif ($list['rating'] == '5'): ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Testimonial_V2());