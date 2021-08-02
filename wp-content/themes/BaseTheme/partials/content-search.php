<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

?>

<article  class="post-box" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-image">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="thumb">
					<?php the_post_thumbnail(
						'archive-post-thumbnail',
						array(
							'alt'   => get_the_title(),
							'title' => get_the_title(),
						)
					); ?>
				</div>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg"  class="attachment-single-post-thumbnail size-single-post-thumbnail wp-post-image" alt="" title="">
			<?php } ?>
		</a>
	</div><!-- .post-image -->
	<div class="post-content">
		<h4 id="post-<?php the_ID(); ?>" class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
		<div class="post-meta">
			<?php the_author_posts_link(); ?> - <?php the_time( pdtformat ); ?> - <?php the_category( ', ' ); ?>
		</div>
		<p><?php echo custom_excerpt_no_more( 130 ); ?></p>
	</div><!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
