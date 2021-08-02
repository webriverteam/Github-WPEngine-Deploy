<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

<?php while ( have_posts() ) : the_post();

	//Include specific template for the content.
	get_template_part( 'partials/content', 'page' );
endwhile; ?>

<div class="clear"></div>


<?php get_footer(); ?>
