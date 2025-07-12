<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Team extends Widget_Base
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
        return 'int-team';
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
        return esc_html__('Team', 'cryco-core');
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
            'design_style',
            [
                'label' => __('Design Style', 'cryco-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'cryco-core'),
                    'style_2' => __('Style 2', 'cryco-core'),
                ],
                'default' => 'style_1',
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
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Name', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'desig',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Designation', 'cryco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'social_icon',
            [
                'label' => esc_html__('Social Icon', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'social_url',
            [
                'label' => esc_html__('Social Url', 'cryco-core'),
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
                'selector' => '{{WRAPPER}} .xb-team',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background Color', 'cryco-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'social_style',
            [
                'label' => esc_html__('Social Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
            'social-c',
            [
                'label' => esc_html__('Social Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--link svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-border-c',
            [
                'label' => esc_html__('Social Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--link' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-bg-c',
            [
                'label' => esc_html__('Social BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--link' => 'background: {{VALUE}}',
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
            'hsocial-c',
            [
                'label' => esc_html__('Social Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team:hover .xb-item--link svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hsocial-border-c',
            [
                'label' => esc_html__('Social Border Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team:hover .xb-item--link' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hsocial-bg-c',
            [
                'label' => esc_html__('Social BG Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team:hover .xb-item--link' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'name_style',
            [
                'label' => esc_html__('Name Style', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'name-c',
            [
                'label' => esc_html__('Name Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-team .xb-item--title',
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
                    '{{WRAPPER}} .xb-team .xb-item--sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-team .xb-item--sub-title',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="xb-team text-center">
            <div class="xb-item--img pos-rel">
                <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
            </div>
            <div class="xb-item--holder">
                <a class="xb-item--link"
                   href="<?php echo esc_url($settings['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($settings['social_icon'], ['aria-hidden' => 'true']); ?></a>
                <?php if (!empty($settings['name'])): ?>
                    <h2 class="xb-item--title"><?php echo esc_html($settings['name']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['desig'])): ?>
                    <span class="xb-item--sub-title"><?php echo esc_html($settings['desig']); ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="xb-team xb-team1 text-center">
            <div class="xb-item--img pos-rel">
                <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
            </div>
            <div class="xb-item--holder">
                <a class="xb-item--link"
                   href="<?php echo esc_url($settings['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($settings['social_icon'], ['aria-hidden' => 'true']); ?></a>
                <?php if (!empty($settings['name'])): ?>
                    <h2 class="xb-item--title"><?php echo esc_html($settings['name']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['desig'])): ?>
                    <span class="xb-item--sub-title"><?php echo esc_html($settings['desig']); ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endif;
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Team());