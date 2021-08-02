<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Include header.
get_header();

// Global variables.
global $option_fields;
global $pID;
global $fields;

// $post_type = get_post_type();

?>

<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

				// Include specific template for the content
				get_template_part( 'partials/content', 'archive-post' );
		}
		?>
		<div class="clear"></div>
		<?php
	} else {

		// If no content, include the "No posts found" template.
		get_template_part( 'partials/content', 'none' );
	}
?>


<?php get_footer(); ?>
