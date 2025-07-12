<?php


/**
 * Enqueue styles and scripts.
 */
function cryco_enqueue_css_and_js() {

    /*
     * Load Google fonts.
     * User can customized this default fonts from theme options
     */
    function cryco_fonts_url() {
        $fonts_url = '';
        $fonts     = [];
        $subsets   = 'latin,latin-ext';

        if ( 'off' !== _x( 'on', 'Outfit: on or off', 'cryco' ) ) {
            $fonts[] = 'Outfit:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Manrope: on or off', 'cryco' ) ) {
            $fonts[] = 'Manrope:300,400,500,600,700,800';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }

    wp_enqueue_style( 'cryco-googlefonts', cryco_fonts_url(), [], null );

    // Enqueue Style
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), '5.0.', 'all' );

    wp_enqueue_style( 'font-awesome-5', get_theme_file_uri( 'assets/css/fontawesome.css' ), array(), '5.13.0', 'all' );

    wp_enqueue_style( 'e-animations', get_theme_file_uri( 'assets/css/animate.css' ), array(), '3.5.1', 'all' );

    wp_enqueue_style( 'swiper-cryco', get_theme_file_uri( 'assets/css/swiper.min.css' ), array(), '6.6.1', 'all' );

    wp_enqueue_style( 'odometer', get_theme_file_uri( 'assets/css/odometer.css' ), array(), '0.4.8', 'all' );

    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( 'assets/css/magnific-popup.css' ), array(), '3.1.9', 'all' );

    wp_enqueue_style( 'cryco-core', get_theme_file_uri( 'assets/css/cryco-core.css' ), array(), CRYCO_VERSION, 'all' );

    wp_enqueue_style( 'cryco-main', get_theme_file_uri( 'assets/css/main.css' ), array(), CRYCO_VERSION, 'all' );

    wp_enqueue_style( 'cryco-style', get_stylesheet_uri(), array(), CRYCO_VERSION, 'all' );

    // Enqueue script
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.bundle.min.js' ), array( 'jquery' ), '5.0.0', true );

    wp_enqueue_script( 'swiper-slider', get_theme_file_uri( 'assets/js/swiper.min.js' ), array( 'jquery' ), '6.7.0', true );

    wp_enqueue_script( 'wow', get_theme_file_uri( 'assets/js/wow.min.js' ), array( 'jquery' ), '1.1.3', true );

    wp_enqueue_script( 'appear', get_theme_file_uri( 'assets/js/appear.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'odometer', get_theme_file_uri( 'assets/js/odometer.min.js' ), array( 'jquery' ), '0.4.8', true );

    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( 'assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), '1.1.0', true );

    wp_enqueue_script( 'parallax-scroll', get_theme_file_uri( 'assets/js/parallax-scroll.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'countdown', get_theme_file_uri( 'assets/js/countdown.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'easing', get_theme_file_uri( 'assets/js/easing.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'scrollspy', get_theme_file_uri( 'assets/js/scrollspy.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'cryco-main', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), CRYCO_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'cryco_enqueue_css_and_js' );

/**
 * Enqueue Backend Styles And Scripts.
 **/

function cryco_backend_css_js( $screen ) {

    if ( $screen == "widgets.php" ) {
        wp_enqueue_media();
        wp_enqueue_script( 'cryco-media-upload', get_theme_file_uri( 'assets/js/media-upload.js' ), array( 'jquery' ), '1.0.0', true );
    }
}

add_action( 'admin_enqueue_scripts', 'cryco_backend_css_js' );