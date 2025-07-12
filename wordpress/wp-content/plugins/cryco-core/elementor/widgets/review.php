<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Review extends Widget_Base
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
        return 'int-review';
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
        return esc_html__('Review', 'cryco-core');
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
                'label' => esc_html__('Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
        $repeater->add_control(
            'rating_number',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Rating Number', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'rating_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Rating Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('Add List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ rating_text }}}',
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
            'border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-review .xb-item--holder' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-review' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'rating_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'review-c',
            [
                'label' => esc_html__('Review Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-star li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'rating_number-c',
            [
                'label' => esc_html__('Rating Number Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-review .xb-item--star span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rating_number_typography',
                'selector' => '{{WRAPPER}} .xb-review .xb-item--star span',
            ]
        );
        $this->add_control(
            'review_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'review_text_c',
            [
                'label' => esc_html__('Review Text Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-review .xb-item--review span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_text_typography',
                'selector' => '{{WRAPPER}} .xb-review .xb-item--review span',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="xb-review ul_li_between">
            <?php
            foreach ($settings['items'] as $item):
                ?>
                <div class="xb-item--holder ul_li">
                    <div class="xb-item--img">
                        <?php echo wp_get_attachment_image($item['image']['id'], 'full'); ?>
                    </div>
                    <div class="xb-item--review">
                        <div class="xb-item--star">
                            <ul class="xb-star ul_li">
                                <?php if ($item['rating'] == '1'): ?>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                <?php elseif ($item['rating'] == '2'): ?>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                <?php elseif ($item['rating'] == '3'): ?>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                <?php elseif ($item['rating'] == '4'): ?>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                <?php elseif ($item['rating'] == '5'): ?>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                <?php endif; ?>
                            </ul>

                            <span><?php echo esc_html($item['rating_number']) ?></span>
                        </div>
                        <span><?php echo esc_html($item['rating_text']); ?> </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Cryco_Review());