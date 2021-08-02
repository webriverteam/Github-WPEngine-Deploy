<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

?>

<section class="no-results not-found">
	<div class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'basetheme21_td' ); ?></h1>
</div><!-- .page-header -->
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'basetheme21_td' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);
			?>
		<?php elseif ( is_search() ) : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'basetheme21_td' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'basetheme21_td' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
