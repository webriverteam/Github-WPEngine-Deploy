<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;


?>
<article class="post-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<div class="image">
			<?php
			if ( has_post_thumbnail() ) {
				echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
			} else {
				?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.png" alt="BaseTheme 2021 Default Image">
			<?php } ?>
		</div>
		<div class="post-content-area">
			<h5><?php the_title(); ?></h5>
			<p class="post-content"><?php echo get_the_excerpt(); ?></p>
		</div>
	</a>
</article>
