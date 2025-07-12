<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cryco
 */

if(get_post_meta(get_the_ID(), 'cryco_common_meta', true)) {
    $header_meta = get_post_meta(get_the_ID(), 'cryco_common_meta', true);
} else {
    $header_meta = array();
}

if( array_key_exists( 'page_header_disable', $header_meta )) {
    $page_header_disable = $header_meta['page_header_disable'];
} else {
    $page_header_disable = false;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php cryco_scroll_up_btn(); cryco_preloader(); cryco_border(); ?>
<div id="page" class="site site_wrapper">
    <div class="cryco-main-wrap">
    
    <?php
    if($page_header_disable != true){
        Cryco_Helper::cryco_header_template();
    }

    ?>
