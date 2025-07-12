<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cryco
 */

get_header();

$search_banner = cryco_option('search_banner', true);
$search_layout = cryco_option('search_layout', 'right-sidebar');
$banner_text_align = cryco_option('banner_default_text_align', 'start');
?>

    <?php if ($search_banner == true) : ?>
        <div class="breadcrumb search-banner pos-rel">
            <div class="container">
                <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                    <h2 class="breadcrumb__title"><?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Search Results for: %s', 'cryco'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h2>
                    <?php if (function_exists('bcn_display')) : ?>
                        <div class="breadcrumb-container">
                            <?php bcn_display(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $icon = cryco_option('animation_icon','');
            if(!empty($icon['icon1']['id']) || !empty($icon['icon2']['id']) || !empty($icon['icon3']['id']) || !empty($icon['icon4']['id'])): ?>
                <div class="breadcrumb__icon">
                    <div class="icon icon--1 leftToRight">
                        <?php echo wp_get_attachment_image($icon['icon1']['id'], 'full'); ?>
                    </div>
                    <div class="icon icon--2 topToBottom">
                        <?php echo wp_get_attachment_image($icon['icon2']['id'], 'full'); ?>
                    </div>
                    <div class="icon icon--3 topToBottom">
                        <?php echo wp_get_attachment_image($icon['icon3']['id'], 'full'); ?>
                    </div>
                    <div class="icon icon--4 leftToRight">
                        <?php echo wp_get_attachment_image($icon['icon4']['id'], 'full'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="primary" class="content-area pt-130 pb-130 layout-<?php echo esc_attr($search_layout); ?>">
        <div class="container">
            <?php
            if ($search_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
