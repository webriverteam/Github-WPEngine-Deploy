<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

?>
<article class="post-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="s-section">
		<div class="wrapper">
			<div class="page-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'basetheme21_td' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							)
						);
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'basetheme21_td' ),
								'after'  => '</div>',
							)
						);
						?>
			</div>
		</div>
		<div style="display:none">
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			?>
			<?php the_tags( '', ',', '' ); ?>
			<?php the_posts_pagination() ?>
		</div>
	</section>
	<?php
	wp_reset_query();
	wp_reset_postdata();

		$related = new WP_Query(
			array(
				'category__in'   => wp_get_post_categories( $post->ID ),
				'posts_per_page' => 3,
				'post__not_in'   => array( $post->ID ),
			)
		);

		// The Loop
		if ( $related->have_posts() ) {
			while ( $related->have_posts() ) {
				$related->the_post();
			//Include specific template for the content.
			get_template_part( 'partials/content', 'archive-post' );
			}
		?>

		<div class="clear"></div>
			<?php
		}
	?>

</article>
