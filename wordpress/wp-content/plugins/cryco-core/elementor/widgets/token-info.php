<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_Token_Info extends Widget_Base
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
        return 'int-token-info';
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
        return esc_html__('Token Info', 'cryco-core');
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
        $this->add_control(
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Content', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'c_title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Coin Title', 'cryco-core'),
                'label_block' => true,
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
            'coin',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Coin Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'coins',
            [
                'label' => esc_html__('Coin List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ coin }}}',
            ]
        );

        $this->add_control(
            'right_content',
            [
                'label' => esc_html__('Right Content', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Sale Top List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list }}}',
            ]
        );
        $this->add_control(
            'sale_width',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Sale Width', 'cryco-core'),
                'default' => esc_html__('75', 'cryco-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'bottom_lists',
            [
                'label' => esc_html__('Sale Bottom List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list }}}',
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
            'text-c',
            [
                'label' => esc_html__('Text Color', 'cryco-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown .single p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .countdown .single p',
            ]
        );
        $this->add_control(
            'text_hr',
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
                    '{{WRAPPER}} .countdown .single h1' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .countdown .single h1',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="token-structure">
            <div class="row">
                <div class="col-lg-5">
                    <div class="hero-token">
                        <?php if (!empty($settings['title'])): ?>
                            <h3 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['content'])): ?>
                            <p class="xb-item--content">
                                <?php echo wp_kses($settings['content'], true); ?>
                            </p>
                        <?php endif; ?>
                        <div class="xb-item--accept">
                            <?php if (!empty($settings['c_title'])): ?>
                                <h5 class="xb-item--acc-title"><?php echo esc_html($settings['c_title']); ?></h5>
                            <?php endif; ?>
                            <ul class="xb-item--list ul_li">
                                <?php
                                foreach ($settings['coins'] as $coin):
                                    ?>
                                    <li><?php \Elementor\Icons_Manager::render_icon($coin['icon'], ['aria-hidden' => 'true']);
                                        echo esc_html($coin['coin']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-sale">
                        <div class="xb-item--sale_service ul_li_between">
                            <?php
                            foreach ($settings['lists'] as $list):
                                ?>
                                <span><?php echo esc_html($list['list']); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="xb-item--line ul_li_between">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="progress token-info-progress">
                            <div class="progress-bar" role="progressbar"
                                 style="width: <?php echo esc_attr($settings['sale_width']); ?>%"
                                 aria-valuenow="<?php echo esc_attr($settings['sale_width']); ?>"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="xb-item--target ul_li_between">
                            <?php
                            foreach ($settings['bottom_lists'] as $list):
                                ?>
                                <span><?php echo esc_html($list['list']) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Cryco_Token_Info());