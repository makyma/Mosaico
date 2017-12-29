<?php
/**
 * The template for displaying the content.
 * @package bizwhoop
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bizwhoop-blog-post-box"> 
		<?php
		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
		if ( !empty( $post_thumbnail_url ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="bizwhoop-blog-thumb">
					<?php echo $post_thumbnail_url; ?>
        </a>
		<?php
		}
		?>
		<article class="small"> 
			<span class="bizwhoop-blog-date"><span class="h3"><?php echo get_the_date('j'); ?></span> 
				<span><?php echo get_the_date('M'); ?></span>
			</span> 
			<h2><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
			<?php
				$bizwhoop_more = strpos( $post->post_content, '<!--more' );
				if ( $bizwhoop_more ) :
					echo get_the_content();
				else :
					echo get_the_excerpt();
				endif;
			?>
			<div class="bizwhoop-blog-category"> 
				<i class="fa fa-folder"></i>
				<?php   $cat_list = get_the_category_list();
				if(!empty($cat_list)) { ?>
				<?php the_category(', '); ?>
				<?php } ?>
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php _e('by','bizwhoop'); ?>
				<?php the_author(); ?>
				</a> 
			</div>
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'bizwhoop' ), 'after' => '</div>' ) ); ?>
		</article>
	</div>
</div>