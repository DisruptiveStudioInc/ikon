<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Contact_V2 extends Widget_Base
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
        return 'int-contact-v2';
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
        return esc_html__('Contact V2', 'cryco-core');
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
            'contact_option',
            [
                'label' => esc_html__('Contact Form', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'subtitle_icon',
            [
                'label' => esc_html__('Subtitle Icon', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Sub Title', 'cryco-core'),
                'label_block' => true,
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
        $this->add_control(
            'shortcode',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Shortcode', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cta_option',
            [
                'label' => esc_html__('CTA', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shadow_img',
            [
                'label' => esc_html__('Shadow Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'c_title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'c_content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Content', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'btn_icon',
            [
                'label' => esc_html__('Icon', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'btn_label',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Button Label', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_link',
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
            'btns',
            [
                'label' => esc_html__('Add Button', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ btn_label }}}',
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
            'bg-c',
            [
                'label' => esc_html__('Background Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'sub_title-c',
            [
                'label' => esc_html__('Sub Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form .xb-item--sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .xb-contact-form .xb-item--sub-title',
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
                    '{{WRAPPER}} .xb-contact-form .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-contact-form .xb-item--title',
            ]
        );
        $this->add_control(
            'form_style',
            [
                'label' => esc_html__('Form Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'field-c',
            [
                'label' => esc_html__('Field Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form .xb-item--field input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact-form .xb-item--field textarea' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field-bg-c',
            [
                'label' => esc_html__('Field BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form .xb-item--field input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact-form .xb-item--field textarea' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field_border_c',
            [
                'label' => esc_html__('Field Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact-form .xb-item--field input' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact-form .xb-item--field textarea' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .them-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .them-btn',
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
                    '{{WRAPPER}} .them-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .them-btn .btn_icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .them-btn' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .them-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .them-btn:hover .btn_icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .them-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'right_content_style',
            [
                'label' => esc_html__('Right Content Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'r_title-c',
            [
                'label' => esc_html__('Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-apps .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'r_title_typography',
                'selector' => '{{WRAPPER}} .footer-apps .xb-item--title',
            ]
        );
        $this->add_control(
            'r_content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'r_content-c',
            [
                'label' => esc_html__('Content Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-apps .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'r_content_typography',
                'selector' => '{{WRAPPER}} .footer-apps .xb-item--content',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="xb-contact-form">
            <div class="row g-0 mt-none-30">
                <div class="col-lg-7 mt-30">
                    <div class="xb-inner">
                        <?php if (!empty($settings['subtitle'])): ?>
                            <h5 class="xb-item--sub-title">
                                <span><?php \Elementor\Icons_Manager::render_icon($settings['subtitle_icon'], ['aria-hidden' => 'true']); ?></span>
                                <?php echo esc_html($settings['subtitle']); ?></h5>
                        <?php endif; ?>
                        <?php if ($settings['title']): ?>
                            <h2 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['shortcode'])): ?>
                            <div class="xb-item--form">
                                <?php echo do_shortcode($settings['shortcode']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5 mt-30">
                    <div class="footer-apps">
                        <div class="xb-item--img pos-rel">
                            <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                            <div class="xb-item--shadow">
                                <?php echo wp_get_attachment_image($settings['shadow_img']['id'], 'full'); ?>
                            </div>
                        </div>
                        <div class="xb-item--holder text-center">
                            <?php if (!empty($settings['c_title'])): ?>
                                <h2 class="xb-item--title"><?php echo esc_html($settings['c_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['c_content'])): ?>
                                <p class="xb-item--content"><?php echo esc_html($settings['c_content']); ?></p>
                            <?php endif; ?>
                            <div class="xb-item--button">
                                <?php
                                foreach ($settings['btns'] as $btn):
                                    ?>
                                    <a class="them-btn apps-btn" href="<?php echo esc_url($btn['btn_link']['url']); ?>">
                                        <span class="btn_icon">
                                            <?php \Elementor\Icons_Manager::render_icon($btn['btn_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                        <span class="btn_label"
                                              data-text="<?php echo esc_attr($btn['btn_label']); ?>"><?php echo esc_html($btn['btn_label']); ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Contact_V2());