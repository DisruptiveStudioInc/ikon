<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Section_Title extends Widget_Base
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
        return 'int-sec-title';
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
        return esc_html__('Section Title', 'cryco-core');
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
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'cryco-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'cryco-core'),
                    'style_2' => __('Style 2', 'cryco-core'),
                    'style_3' => __('Style 3', 'cryco-core'),
                ],
                'default' => 'style_1',
            ]
        );

        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'cryco-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'cryco-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Text Align', 'cryco-core'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'start' => [
                        'title' => __('Left', 'cryco-core'),
                        'icon' => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'cryco-core'),
                        'icon' => 'eicon-text-align-center',
                    ],

                    'end' => [
                        'title' => __('Right', 'cryco-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ],
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
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .career-sec-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sub-title-dot-c',
            [
                'label' => esc_html__('Sub Title Dot Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .career-sec-subtitle',
            ]
        );

        $this->add_control(
            'cta-box-styl',
            [
                'label' => esc_html__('Title Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .section-title .title > span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-highlight-c',
            [
                'label' => esc_html__('Title Highlight Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'title-highlight-c-2',
            [
                'label' => esc_html__('Title Highlight Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title > span > span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'border-bottom-color',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title--border .title::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .section-title .title',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .section-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'number_hr',
            [
                'label' => esc_html__('Number', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'design_style' => 'style_3',
                ],
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title--two .number' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_3',
                ],
            ]
        );
        $this->add_control(
            'number_bg_color',
            [
                'label' => esc_html__('Number BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title--two .number' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_3',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .section-title--two .number',
                'condition' => [
                    'design_style' => 'style_3',
                ],
            ]
        );
        $this->add_control(
            'border_hr',
            [
                'label' => esc_html__('Border', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'border-c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .branding-sec-title .sub-title::after' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="section-title section-title--dm branding-sec-title">
            <span class="sub-title"><?php echo esc_html($settings['sub_title']); ?></span>
            <h3 class="title"><?php echo wp_kses($settings['title'], true); ?></h3>
        </div>
    <?php elseif ($settings['design_style'] === 'style_3'): ?>
        <div class="ds-section-title text-center">
            <span class="sub-title"><?php echo esc_html($settings['sub_title']); ?></span>
            <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
        </div>
    <?php else: ?>
        <div class="section-title">
            <?php if (!empty($settings['sub_title'])): ?>
                <h5 class="sub-title wow fadeInRight"
                    data-wow-duration=".7s"><?php echo esc_html($settings['sub_title']); ?></h5>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?php
            if (!empty($settings['title'])): ?>
                <h2 class="title wow skewIn"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif; ?>
        </div>
    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Cryco_Section_Title());