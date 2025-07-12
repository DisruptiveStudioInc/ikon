<?php

/**
 * Elementor Single Widget
 * @package cryco-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Cryco_CTA extends Widget_Base
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
        return 'int-cta';
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
        return esc_html__('CTA', 'cryco-core');
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
            'subtitle_icon',
            [
                'label' => esc_html__('Sub Title Icon', 'cryco-core'),
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
            'subtitle_badge',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Sub Title Badge', 'cryco-core'),
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
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Content', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('List Text', 'cryco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('List', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list }}}',
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
            'btn_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Button Text', 'cryco-core'),
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
                'label' => esc_html__('Button', 'cryco-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ btn_text }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_option',
            [
                'label' => esc_html__('Image', 'cryco-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
                'selector' => '{{WRAPPER}} .feature-wrap',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background Color', 'cryco-core'),
                    ]
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'border_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-border::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background Color', 'cryco-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'cryco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .feature-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-wrap .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .feature-wrap .xb-item--title',
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
                    '{{WRAPPER}} .feature-wrap .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .feature-wrap .xb-item--content',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $icon_bg = CRYCO_DIR_URL . 'assets/img/feat_icon_bg.png';
        ?>
        <div class="feature-crypto bg_img" <?php if (!empty($settings['bg_image']['url'])): ?>
             style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>') <?php endif; ?>">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="mobile-crypto">
                        <div class="xb-item--sub-title">
                                    <span>
                                        <?php \Elementor\Icons_Manager::render_icon($settings['subtitle_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php echo esc_html($settings['subtitle']); ?>
                                        <?php if (!empty($settings['subtitle_badge'])): ?>
                                            <span class="new-btn"><?php echo esc_html($settings['subtitle_badge']); ?></span>
                                        <?php endif; ?>
                                    </span>
                        </div>
                        <?php if (!empty($settings['title'])): ?>
                            <h2 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['content'])): ?>
                            <p class="xb-item--content">
                                <?php echo wp_kses($settings['content'], true); ?>
                            </p>
                        <?php endif; ?>
                        <ul class="xb-item--crypto-list">
                            <?php
                            foreach ($settings['lists'] as $list):
                                ?>
                                <li>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                              fill="white"></path>
                                        <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                              fill="#080B18"></path>
                                    </svg>
                                    <?php echo esc_html($list['list']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="xb-item--crypto-btn">
                            <?php
                            foreach ($settings['btns'] as $btn):
                                ?>
                                <a class="them-btn crp-btn" href="<?php echo esc_url($btn['btn_link']['url']); ?>">
                                        <span class="btn_icon">
                                            <?php \Elementor\Icons_Manager::render_icon($btn['btn_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    <span class="btn_label"
                                          data-text="<?php echo esc_attr($btn['btn_text']); ?>"><?php echo esc_html($btn['btn_text']); ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cry-mobile-img">
                        <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Cryco_CTA());