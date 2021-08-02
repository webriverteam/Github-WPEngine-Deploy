<?php
/**
 * Template part for displaying content of about us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

 ?>

<div class="post-meta">
	<?php the_author_posts_link(); ?> - <?php echo the_time( pdtformat ); ?> - <?php the_category( ', ' ); ?>
</div>
