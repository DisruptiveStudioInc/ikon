<?php

function cryco_body_class($classes){

        if (is_page()) {
            global $post;
            $pid = $post->ID;
            $meta = get_post_meta($pid, '_cryco_meta', 'true');
            $style_class = isset($meta['style']) && $meta['style'] ? $meta['style'] : '';
            $classes[] = $style_class;
        } else {
            $classes[] = 'cryco-inner-page';
        }
        return $classes;
}
add_filter('body_class', 'cryco_body_class');

function ae_drop_posts($post_type){
  $args = array(
    'numberposts' => -1,
    'post_type'   => $post_type
  );

  $posts = get_posts( $args );        
  $list = array();
  foreach ($posts as $cpost){
  //  print_r($cform);
      $list[$cpost->ID] = $cpost->post_title;
  }
  return $list;
}

function get_wp_image($source){
  if (isset($source)){
      $image =  wp_get_attachment_image( $source['id'], 'full' );
  }
  return $image;

}


function cryco_menu_selector() {
  $menus = wp_get_nav_menus();
  $items = array();
  $i     = 0;
  foreach ( $menus as $menu ) {
      if ( $i == 0 ) {
          $default = $menu->slug;
          $i ++;
      }
      $items[ $menu->slug ] = $menu->name;
  }
  return $items;
}

/**
 * All Category List
 */
function cryco_blog_category (){
    $terms = get_terms( array(
        'taxonomy'    => 'category',
        'hide_empty'  => true
    ) );

    $cat_list = [];
    foreach($terms as $post) {
        $cat_list[$post->slug]  = [$post->name];
    }
    return $cat_list;
}

/**
 * Authore Avater
 */
function cryco_post_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}

add_action('genesis_entry_header', 'cryco_post_author_avatars');


/**
 * Post Social Share
 *
 * @return void
 */
function cryco_post_share() {

    $post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    $post_id    = get_the_ID();
    $post_url   = get_permalink( $post_id );
    ?>
    <h5 class="title"><?php esc_html_e( 'Share:', 'cryco-core' );?></h5>
    <ul class="ul_li">
        <li>
            <a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>"  rel="external" target="_blank" class="fb-share">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>

        <li>
            <a href="https://twitter.com/share?text=<?php echo wp_strip_all_tags( $post_title ); ?>&amp;url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>" rel="external" target="_blank" class="twitter-share">
                <i class="fab fa-twitter"></i>
            </a>
        </li>

        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>&amp;title=<?php echo wp_strip_all_tags( $post_title ); ?>&amp;summary=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>"  rel="external" target="_blank" class="linkedin-share">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>

        <li>
            <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ); ?>&amp;description=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>"  rel="external" target="_blank" class="pinterest-share">
                <i class="fab fa-pinterest"></i>
            </a>
        </li>
    </ul>
    <?php
}