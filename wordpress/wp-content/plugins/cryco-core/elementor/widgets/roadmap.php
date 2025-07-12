<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Roadmap extends Widget_Base
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
        return 'int-roadmap';
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
        return esc_html__('Roadmap', 'cryco-core');
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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'features_list',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Feature List', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'year',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Year', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Top List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'bottom_list',
            [
                'label' => esc_html__('Bottom List', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'features_list',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Feature List', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'year',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Year', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'b_lists',
            [
                'label' => esc_html__('Bottom List', 'cryco-core'),
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
                    '{{WRAPPER}} .roadmap-wrap .roadmap--head' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .roadmap-wrap .roadmap--head',
            ]
        );
        $this->add_control(
            'list_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'list-c',
            [
                'label' => esc_html__('List Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .roadmap-wrap .roadmap--info li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_typography',
                'selector' => '{{WRAPPER}} .roadmap-wrap .roadmap--info li',
            ]
        );
        $this->add_control(
            'date_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'date-c',
            [
                'label' => esc_html__('Date Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .roadmap-wrap .roadmap--year span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .roadmap-wrap .roadmap--year span',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="roadmap-wrap">
            <div class="roadmap--top">
                <?php
                foreach ($settings['lists'] as $list):
                    ?>
                    <div class="roadmap--item">
                        <h2 class="roadmap--head "><?php echo esc_html($list['title']); ?></h2>

                        <?php $features_list = $list['features_list'];
                        if (!empty($features_list)) {
                            $features_list = explode("\n", ($features_list));
                            ?>
                            <ul class="roadmap--info">
                                <?php foreach ($features_list as $features): ?>
                                    <li><span><?php echo wp_kses($features, true); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php } ?>

                        <div class="roadmap--year">
                            <div class="roadmap--circle"><span></span></div>
                            <span><?php echo esc_html($list['year']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="roadmap--line"></div>
            <div class="roadmap--bottom">
                <?php
                foreach ($settings['b_lists'] as $list):
                    ?>
                    <div class="roadmap--item bottom-item">
                        <div class="roadmap--year">
                            <span><?php echo esc_html($list['year']); ?></span>
                            <div class="roadmap--circle"><span></span></div>
                        </div>
                        <h2 class="roadmap--head"><?php echo esc_html($list['title']); ?></h2>
                        <?php $features_list = $list['features_list'];
                        if (!empty($features_list)) {
                            $features_list = explode("\n", ($features_list));
                            ?>
                            <ul class="roadmap--info">
                                <?php foreach ($features_list as $features): ?>
                                    <li><span><?php echo wp_kses($features, true); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_Roadmap());