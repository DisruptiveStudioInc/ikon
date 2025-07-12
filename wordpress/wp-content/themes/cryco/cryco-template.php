<?php
/**
 * Template Name: Cryco Elementor Full Template
 *
 *
 * @package cryco
 */


get_header();

if ( get_post_meta( $post->ID, 'cryco_common_meta', true ) ) {
    $common_meta = get_post_meta( $post->ID, 'cryco_common_meta', true );
} else {
    $common_meta = array();
}

if ( array_key_exists( 'enable_banner', $common_meta ) ) {
    $page_banner = $common_meta['enable_banner'];
} else {
    $page_banner = true;
}

if ( array_key_exists( 'custom_title', $common_meta ) ) {
    $custom_title = $common_meta['custom_title'];
} else {
    $custom_title = '';
}

if ( array_key_exists( 'banner_text_align_meta', $common_meta ) && $common_meta['banner_text_align_meta'] != 'default' ) {
    $banner_text_align = $common_meta['banner_text_align_meta'];
} else {
    $banner_text_align = cryco_option( 'banner_default_text_align', 'start' );
}

?>

<?php if($page_banner == true) : ?>
    <div class="breadcrumb page-banner pos-rel">
        <div class="container">
            <div class="breadcrumb__content text-<?php echo esc_attr( $banner_text_align ); ?>">
                <h2 class="breadcrumb__title">
                    <?php
                    if ( ! empty( $custom_title ) ) {
                        echo esc_html( $custom_title );
                    } else {
                        the_title();
                    }
                    ?>
                </h2>
                <?php if ( function_exists( 'bcn_display' ) ) :?>
                    <div class="breadcrumb-container">
                        <?php bcn_display();?>
                    </div>
                <?php endif;?>
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

    <div id="elementor_page_builder">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // End of the loop. ?>
    </div><!-- #main -->

<?php get_footer();