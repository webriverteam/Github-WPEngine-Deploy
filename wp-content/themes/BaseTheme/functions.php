<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

$file_includes = array(
	'includes/setup.php',           // Basic theme setup
	'includes/scripts.php',         // Enqeue theme styles and scripts
	'includes/widgets.php',         // Theme widget area
	'includes/project.php',         // Custom functions for this specific project
	'includes/acf.php',             // Advanced custom fields functions
	'includes/blocks.php',          // Custom Gutenberg blocks
	'includes/cpt.php',             // Custom post types setup
	'includes/custom.php',          // Custom functions
	'includes/ajax.php',            // Ajax related functions
	'includes/browsers.php',        // Browser detection function
	// 'includes/dashboard.php',       // Custom Dashboard function

);

/**
 * Checks if any file have error while including it.
 */
foreach ( $file_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'basetheme21_td' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
global $browser;
$browser = new Browsersphp\Browsers();
