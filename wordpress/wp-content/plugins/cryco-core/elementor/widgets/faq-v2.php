<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_FAQ_V2 extends Widget_Base
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
        return 'int-faq-v2';
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
        return esc_html__('FAQ V2', 'cryco-core');
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
            'faq_option',
            [
                'label' => esc_html__('FAQ', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'active',
            [
                'label' => esc_html__('Active', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'cryco-core'),
                'label_off' => esc_html__('Hide', 'cryco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'cryco-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'cryco-core'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'faqs',
            [
                'label' => esc_html__('Add Faq Item', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'faq_style',
            [
                'label' => esc_html__('FAQ', 'cryco-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ftitle-c',
            [
                'label' => esc_html__('Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion_box .block .acc-btn .arrow::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ftitle_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .acc-btn',
            ]
        );
        $this->add_control(
            'f_content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'fcontent-c',
            [
                'label' => esc_html__('Content Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion_box .block .content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fcontent_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .content',
            ]
        );
        $this->add_control(
            'f_border_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'f_border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'arrow-c',
            [
                'label' => esc_html__('Arrow Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__blockchain .arrow span::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow-active-c',
            [
                'label' => esc_html__('Arrow Active Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__blockchain .arrow span::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow-bg-c',
            [
                'label' => esc_html__('Arrow BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow-active-bg-c',
            [
                'label' => esc_html__('Arrow Active BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__blockchain .accordion.block.active-block .acc-btn .arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="faq__blockchain-two">
            <ul class="accordion_box clearfix">
                <?php foreach ($settings['faqs'] as $faq): ?>
                    <li class="accordion block <?php if ('yes' == $faq['active']) {
                        echo esc_attr('active-block');
                    } ?>">
                        <div class="accordion-inner">
                            <div class="acc-btn">
                                <?php echo wp_kses($faq['title'], true); ?>
                            </div>
                            <div class="acc_body <?php if ('yes' == $faq['active']) {
                                echo esc_attr('current');
                            } ?>">
                                <div class="content">
                                    <?php echo wp_kses($faq['content'], true); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_FAQ_V2());