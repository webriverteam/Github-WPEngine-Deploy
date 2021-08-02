<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 *
 * This template is for displaying home page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

<?php
	// WP_Query arguments
	$args = array(
		'post_type'              => array( 'post' ),
		'posts_per_page'         => '-1',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	// The Query
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
		//Include specific template for the content.
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

<?php get_footer();
