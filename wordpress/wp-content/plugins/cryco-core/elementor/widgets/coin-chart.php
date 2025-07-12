<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Coin_Chart extends Widget_Base
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
        return 'int-coin-chart';
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
        return esc_html__('Coin Chart', 'cryco-core');
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
                'label' => esc_html__('Coin Chart', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'head_text', [
                'label' => esc_html__('Title', 'cryco-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'head_lists',
            [
                'label' => esc_html__('Add Head List', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'coin',
            [
                'label' => esc_html__('Coin Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'coin_name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Coin Name', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'coin_name2',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Coin Name 2', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Price', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_change',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Price Change', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'chart_img',
            [
                'label' => esc_html__('Chart Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'btn_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Button Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_url',
            [
                'label' => esc_html__('Button Link', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Add Chart List', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Style', 'cryco-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'head_title-c',
            [
                'label' => esc_html__('Head Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--title span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'head_title_typography',
                'selector' => '{{WRAPPER}} .xb-currency .xb-item--title span',
            ]
        );
        $this->add_control(
            'text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'text-c',
            [
                'label' => esc_html__('Coin Text Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--item li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .xb-currency .xb-item--item li',
            ]
        );
        $this->add_control(
            'border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--title' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-currency .xb-item--item' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__('Button Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .xb-currency .xb-item--curr-btn',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'cryco-core'),
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'cryco-core'),
            ]
        );

        $this->add_control(
            'h_btn_color',
            [
                'label' => esc_html__('Button Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-currency .xb-item--curr-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="xb-currency">
            <div class="xb-item--title ul_li">
                <?php foreach ($settings['head_lists'] as $list): ?>
                    <span><?php echo esc_html($list['head_text']); ?></span>
                <?php endforeach; ?>
            </div>
            <?php foreach ($settings['lists'] as $list): ?>
                <ul class="xb-item--item ul_li">
                    <li class="xb-item--curr-name d-flex align-items-center">
                        <span class="xb-item--image"><?php echo wp_get_attachment_image($list['coin']['id'], 'full'); ?></span>
                        <span class="xb-item--color-white"><?php echo esc_html($list['coin_name']); ?></span>
                        <span><?php echo esc_html($list['coin_name2']); ?></span>
                    </li>
                    <li><?php echo esc_html($list['price']); ?></li>
                    <li><?php echo esc_html($list['price_change']); ?></li>
                    <li><?php echo wp_get_attachment_image($list['chart_img']['id'], 'full'); ?></li>
                    <?php if (!empty($list['btn_text'])): ?>
                        <li><a class="them-btn xb-item--curr-btn" href="<?php echo esc_url($list['btn_url']['url']); ?>"><?php echo esc_html($list['btn_text']); ?></a></li>
                    <?php endif; ?>
                </ul>
            <?php endforeach; ?>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Coin_Chart());