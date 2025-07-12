<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Token_V2 extends Widget_Base
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
        return 'int-token-v2';
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
        return esc_html__('Token V2', 'cryco-core');
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

        $this->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'percentage',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Percentage', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'percentage-c',
            [
                'label' => esc_html__('Percentage Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'percentages',
            [
                'label' => esc_html__('Percentage List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ percentage }}}',
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('List Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'dot-c',
            [
                'label' => esc_html__('Dot Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}::after' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Bottom Text List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list_text }}}',
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
                    '{{WRAPPER}} .token-sale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'bg-c',
            [
                'label' => esc_html__('Background Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .token-sale' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .token-sale' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .token-sale .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .token-sale .xb-item--title',
            ]
        );
        $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="token-sale model">
            <?php if (!empty($settings['title'])): ?>
                <h2 class="xb-item--title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif; ?>
            <div class="xb-item--progress_bar">
                <div class="xb-item--parcenteg ul_li">
                    <?php
                    foreach ($settings['percentages'] as $percentage):
                        ?>
                        <span class="elementor-repeater-item-<?php echo esc_attr($percentage['_id']); ?>"><?php echo esc_html($percentage['percentage']); ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="xb-item--token_progress ul_li">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <ul class="xb-item--pro_list ul_li">
                <?php
                foreach ($settings['lists'] as $list):
                    ?>
                    <li class="elementor-repeater-item-<?php echo esc_attr($list['_id']); ?>"><?php echo esc_html($list['list_text']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Cryco_Token_V2());