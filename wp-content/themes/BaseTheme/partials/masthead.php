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

// Global variables
global $option_fields;
global $pID;
global $fields;


/**
 * Homepage Masthead
 *
 */
if ( is_page_template( 'templates/template-home.php' ) ) {
	$basethemevar_pagetitle = $fields['basethemevar_pagetitle'];
	if(!$basethemevar_pagetitle){
		$basethemevar_pagetitle = get_the_title();
	}

	?>


	<?php }


/**
 * 404 page masthead
 *
 */
elseif ( is_404() ) {
	$basethemevar_error_headline             = $option_fields['basethemevar_error_headline'];
	$basethemevar_error_sub_headline             = $option_fields['basethemevar_error_sub_headline'];

	?>

	<section class="m-section">
		<div class="banner-container center-align">
			<div class="wrapper">
			<h1 class="heading"><?php echo $basethemevar_error_headline; ?></h1>
				<div class="banner-text">
					<p><?php echo $basethemevar_error_sub_headline; ?></p>
				</div>
			</div>
		</div>
	</section>

	<?php }


/**
 * Archive masthead
 *
 */
elseif ( is_archive() ) { ?>

	<?php the_archive_title( '<h1 class="heading">', '</h1>' ); ?>

	<?php }


/**
 * Search masthead
 *
 */
elseif ( is_search() ) { ?>

<?php
			printf(
				/* translators: %s: search term. */
				esc_html__( 'Results for "%s"', 'basetheme21_td' ),
				'<span class="search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>

	<?php }


/**
 * Single CPT masthead
 *
 */
elseif ( is_singular( 'cpt' ) ) { ?>

	<?php }


/**
 * Single post masthead
 *
 */
elseif ( is_singular( 'post' ) ) { ?>


	<?php }


/**
 * Index masthead
 *
 */
elseif ( is_home() & is_front_page() ) { ?>

	<h1 class="heading"> <?php bloginfo( 'name' ); ?> </h1>
	<h2 class="subheading"><?php bloginfo( 'description' ); ?></h2>

	<?php }


/**
 * Page masthead
 *
 */
else {
	$basethemevar_pagetitle = $fields['basethemevar_pagetitle'];
	if(!$basethemevar_pagetitle){
		$basethemevar_pagetitle = get_the_title();
	}
	?>

	<?php }
