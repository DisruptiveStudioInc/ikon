<?php
if(is_archive()){
	$post_item_layout = cryco_option('archive_layout', 'right-sidebar');
}else if(is_search()){
	$post_item_layout = cryco_option('search_layout', 'right-sidebar');
}else{
	$post_item_layout = cryco_option('blog_layout', 'right-sidebar');
}

if($post_item_layout == 'grid-ls' || $post_item_layout == 'grid-rs' || $post_item_layout == 'grid'){
	$word_count = 20;
}else{
	$word_count = 50;
}

$show_author_name = cryco_option('post_author', true);
$show_post_date = cryco_option('post_date', true);
$show_category = cryco_option('show_category', false);
$show_read_more = cryco_option('read_more_button', true);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog__item">
		<?php
            if(get_post_format() === 'gallery'){
	            get_template_part( 'template-parts/post/post-format-gallery');
            }else if(get_post_format() === 'video'){
	            get_template_part( 'template-parts/post/post-format-video');
            }else if(get_post_format() === 'audio'){
	            get_template_part( 'template-parts/post/post-format-audio');
            }else{
	            get_template_part( 'template-parts/post/post-format-others');
            }
        ?>

		<div class="blog__inner">

			<?php if ( 'post' === get_post_type() ) : ?>
				<ul class="blog__meta ul_li mb-20">
					<?php if($show_author_name == true):?>
						<li><?php cryco_posted_by(); ?></li>
					<?php endif; ?>

					<?php if($post_item_layout == 'left-sidebar' || $post_item_layout == 'right-sidebar' ) : ?>
						<li><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php print esc_html__('Comments', 'cryco'); ?> (<?php print get_comments_number();?>)</a></li>
					<?php endif;?>

					<?php if($show_post_date == true):?>
					<li><?php cryco_posted_on(); ?></li>
					<?php endif;?>

					<?php if($show_category == true):?>
					<li><?php cryco_post_first_category(); ?></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>

			<?php the_title( '<h3 class="post-title border_effect"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="post-excerpt">
				<p><?php echo cryco_words_limit( get_the_excerpt(), $word_count ); ?><?php if ( ! empty( get_the_content() ) ) {
						echo ' [...]';
					} ?></p>
			</div>

			<?php if($show_read_more == true):?>
			<div class="post-read-more">
                <?php if($post_item_layout == 'left-sidebar' || $post_item_layout == 'right-sidebar') : ?>
					<a href="<?php echo esc_url( get_the_permalink() ) ?>" class="blog-btn"><?php echo esc_html__( 'Read More', 'cryco' ); ?></a>
                <?php else : ?>
                    <a href="<?php echo esc_url( get_the_permalink() ) ?>" class="blog-btn"><?php echo esc_html__( 'Read More', 'cryco' ); ?></a>
                <?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>