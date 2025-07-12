<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Event extends Widget_Base
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
        return 'int-event';
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
        return esc_html__('Event', 'cryco-core');
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
            'image',
            [
                'label' => esc_html__('Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'location',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Location', 'cryco-core'),
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
            'date',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Date', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'time',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Time', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Button Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
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
        $this->end_controls_section();

        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Style', 'cryco-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-event',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background Color', 'cryco-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'border_c',
            [
                'label' => esc_html__('Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-event' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-event .xb-item--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'location_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'location-c',
            [
                'label' => esc_html__('Location Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-event .xb-item--location span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_typography',
                'selector' => '{{WRAPPER}} .xb-event .xb-item--location span',
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
                    '{{WRAPPER}} .xb-event .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-event .xb-item--title',
            ]
        );
        $this->add_control(
            'meta_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'meta-c',
            [
                'label' => esc_html__('Meta Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-event .xb-item--date-time1 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .xb-event .xb-item--date-time1 span',
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
                    '{{WRAPPER}} .ds-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .mr-all-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .port-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .ds-btn, {{WRAPPER}} .mr-all-link,  {{WRAPPER}} .port-btn',
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
            'btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .them-btn' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-event .xb-item--event-btn .them-btn:hover .btn_icon svg path' => 'fill: {{VALUE}}',
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
        $this->add_control(
            'h_btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .them-btn:hover' => 'border-color: {{VALUE}}',
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
        <div class="xb-event">
            <div class="xb-item--img">
                <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
            </div>
            <div class="xb-item--holder">
                <?php if (!empty($settings['location'])): ?>
                    <div class="xb-item--location"><i
                                class="fal fa-map-marker-alt"></i><span><?php echo esc_html($settings['location']); ?></span>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['title'])): ?>
                    <h2 class="xb-item--title border_effect"><a
                                href="<?php echo esc_html($settings['link']['url']); ?>"><?php echo esc_html($settings['title']); ?></a>
                    </h2>
                <?php endif; ?>
                <div class="xb-item--date-time ul_li_between">
                    <?php if (!empty($settings['date'])): ?>
                        <div class="xb-item--date xb-item--date-time1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.66663 1.66675V4.16675" stroke="white" stroke-width="1.5"
                                      stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3334 1.66675V4.16675" stroke="white" stroke-width="1.5"
                                      stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.83337 10.8333H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.83337 14.1667H10" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3333 2.91675C16.1083 3.06675 17.5 4.12508 17.5 8.04175V13.1917C17.5 16.6251 16.6667 18.3417 12.5 18.3417H7.5C3.33333 18.3417 2.5 16.6251 2.5 13.1917V8.04175C2.5 4.12508 3.89167 3.07508 6.66667 2.91675H13.3333Z"
                                      stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo esc_html($settings['date']); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['time'])): ?>
                        <div class="xb-item--time xb-item--date-time1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2917 11.0417C17.2917 15.0667 14.025 18.3333 10 18.3333C5.97504 18.3333 2.70837 15.0667 2.70837 11.0417C2.70837 7.01667 5.97504 3.75 10 3.75C14.025 3.75 17.2917 7.01667 17.2917 11.0417Z"
                                      stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 6.66675V10.8334" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M7.5 1.66675H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo esc_html($settings['time']); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['btn_text'])): ?>
                    <div class="xb-item--event-btn">
                        <a class="them-btn" href="<?php echo esc_url($settings['btn_url']['url']); ?>">
                            <span class="btn_label" data-text="<?php echo esc_attr($settings['btn_text']); ?>"><?php echo esc_html($settings['btn_text']); ?></span>
                            <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                      fill="white"></path>
                              </svg>
                        </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Event());