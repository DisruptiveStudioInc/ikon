<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cryco
 */

get_header();
$blog_layout = cryco_option('blog_layout', 'right-sidebar');
$enable_banner = cryco_option('blog_banner', true);
$banner_title = cryco_option('blog_title');
$banner_text_align = cryco_option('banner_default_text_align', 'center');
?>

    <?php if ($enable_banner == true) : ?>
        <div class="breadcrumb bg_img blog-banner pos-rel">
            <div class="container">
                <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                    <h2 class="breadcrumb__title">
                        <?php echo esc_html($banner_title); ?>
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

    <div id="primary" class="content-area pt-130 pb-130 layout-<?php echo esc_attr($blog_layout); ?>">
        <div class="container">
            <?php
            if ($blog_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
