<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cryco
 */

get_header();

$archive_layout = cryco_option('archive_layout', 'right-sidebar');
$archive_banner = cryco_option('archive_banner', true);
$banner_text_align = cryco_option('banner_default_text_align', 'start');
?>

    <?php if ($archive_banner == true) : ?>
        <div class="breadcrumb archive-banner pos-rel">
            <div class="container">
                <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                    <?php
                    the_archive_title('<h2 class="breadcrumb__title">', '</h2>');
                    ?>
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

    <div id="primary" class="content-area pt-130 pb-130 layout-<?php echo esc_attr($archive_layout); ?>">
        <div class="container">
            <?php
            if ($archive_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div>

<?php
get_footer();
