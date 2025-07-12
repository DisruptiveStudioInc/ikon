<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cryco
 */

get_header();

$error_banner      = cryco_option('error_banner', true);
$error_banner_title = cryco_option('error_page_title');
$banner_text_align = cryco_option('banner_default_text_align', 'start');
$error_img = cryco_option('error_img');
$not_found_text     = cryco_option('not_found_text');
$go_back_home       = cryco_option('go_back_home', true);

?>

<?php if($error_banner == true) : ?>
    <div class="breadcrumb error-page-banner pos-rel">
        <div class="container">
            <div class="breadcrumb__content text-<?php echo esc_attr( $banner_text_align ); ?>">
                <h2 class="breadcrumb__title">
                    <?php echo esc_html($error_banner_title); ?>
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

    <div id="primary" class="content-area pt-130 pb-130">
        <div class="container not-found-content">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contant-wrapper text-center">
                        <div class="error-page__text">
                            <h2>404</h2>
                        </div>
                        <div class="error-page__content mb-50">
                            <?php
                            if (!empty($not_found_text)) {
                                echo wp_kses( $not_found_text, array(
                                    'a'      => array(
                                        'href'   => array(),
                                        'target' => array()
                                    ),
                                    'strong' => array(),
                                    'small'  => array(),
                                    'span'   => array(),
                                    'p'   => array(),
                                    'h1'   => array(),
                                    'h2'   => array(),
                                    'h3'   => array(),
                                    'h4'   => array(),
                                    'h5'   => array(),
                                    'h6'   => array(),
                                ) );
                            }else {
                                ?>
                                <h2><?php esc_html_e( 'Hi 👋 Sorry We Can’t Find That Page!', 'cryco') ?></h2>
                                <p><?php esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'cryco') ?></p>
                                <?php
                            }
                            ?>

                            <?php if ($go_back_home == true) : ?>
                                <div class="error-page-button">
                                    <a class="them-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Go Back Home', 'cryco') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();