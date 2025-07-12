<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Process extends Widget_Base
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
        return 'int-process';
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
        return esc_html__('Process', 'cryco-core');
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
            'icon',
            [
                'label' => esc_html__('Icon', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
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
                'title_field' => '{{{ title }}}',
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
            'title-c',
            [
                'label' => esc_html__('Title Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-process .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-process .xb-item--title',
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content-c',
            [
                'label' => esc_html__('Content Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-process .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .xb-process .xb-item--content',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $icon_bg = CRYCO_DIR_URL . 'assets/img/prc-icon-bg.png';
        ?>
        <div class="xb-process-wrap">
            <div class="row justify-content-center mt-none-130">
                <?php
                foreach ($settings['lists'] as $index => $list):
                    $bg_shape_id = 'bg_shape_id' . $index;
                ?>
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <div class="xb-item--icon-bg">
                                <img src="<?php echo esc_url($icon_bg); ?>" alt="">
                            </div>
                            <div class="xb-item--icon-inner">
                                <?php \Elementor\Icons_Manager::render_icon($list['icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title"><?php echo esc_html($list['title']); ?></h2>
                            <p class="xb-item--content"><?php echo wp_kses($list['content'], true); ?></p>
                        </div>
                        <div class="xb-item--shape">
                                <span>
                                    <svg width="410" height="274" viewBox="0 0 410 274" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                        <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z" fill="url(#<?php echo esc_attr($bg_shape_id); ?>)" />
                                        <defs>
                                            <radialGradient id="<?php echo esc_attr($bg_shape_id); ?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                                <stop offset="0" stop-color="#EBF7FD" />
                                                <stop offset="0.09" stop-color="#9162FF" />
                                                <stop offset="0.26792" stop-color="#1C30A8" />
                                                <stop offset="0.474094" stop-color="#080B18" />
                                            </radialGradient>
                                        </defs>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Cryco_Process());