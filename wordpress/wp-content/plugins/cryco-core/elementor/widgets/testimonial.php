<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Testimonial extends Widget_Base
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
        return 'int-testimonial';
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
        return esc_html__('Testimonial', 'cryco-core');
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
            'avatar',
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
            'country',
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
                    '{{WRAPPER}} .testimonial-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .xb-testimonial .xb-item--nationality span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'country_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial .xb-item--nationality span',
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
                    '{{WRAPPER}} .xb-testimonial .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial .xb-item--title',
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
                    '{{WRAPPER}} .xb-testimonial .xb-item--sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial .xb-item--sub-title',
            ]
        );
        $this->add_control(
            'bullet_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'bullet-c',
            [
                'label' => esc_html__('Bullet Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-slider .swiper-pagination .swiper-pagination-bullet' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_img = CRYCO_DIR_URL . 'assets/img/tm_bg.png';
        ?>
        <div class="testimonial-wrap bg_img" style="background-image: url('<?php echo $bg_img; ?>')">
            <div class="testimonial-slider swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($settings['lists'] as $list):
                        ?>
                        <div class="swiper-slide">
                            <div class="xb-testimonial">
                                <div class="xb-item--avater ul_li">
                                    <div class="xb-item--img">
                                        <?php echo wp_get_attachment_image($list['avatar']['id'], 'thumbnail'); ?>
                                    </div>
                                    <div class="xb-item--holder">
                                        <div class="xb-item--nationality ul_li">
                                            <?php echo wp_get_attachment_image($list['flag']['id'], 'thumbnail'); ?>
                                            <span><?php echo esc_html($list['country']); ?></span>
                                        </div>
                                        <?php if (!empty($list['name'])): ?>
                                            <h2 class="xb-item--title"><?php echo esc_html($list['name']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($list['desig'])): ?>
                                            <span class="xb-item--sub-title"><?php echo esc_html($list['desig']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (!empty($list['content'])): ?>
                                    <p class="xb-item--comment"><?php echo esc_html($list['content']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Testimonial());