<?php
/**
 * Extra functions for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

/**
 * Custom logo for WordPress login screen
 *
 * This function replaces the default WordPress logo on the login with website logo.
 */
function custom_login_logo() {
	echo '
		<style type="text/css">
			.login h1 a {
				background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/logo.svg) !important;
				background-position: center center;
				color:rgba(0, 0, 0, 0);
				background-size: contain;
				height: 80px;
				width: 80%;
				outline: 0;
			}

		</style>
	';
}

add_action( 'login_head', 'custom_login_logo' );

/**
 * Custom CSS Styling for Admin Page
 *
 * This function adds some new css styles to admin page.
 */
function glide_custom_css_styles() {
	echo '<style>
    tr.form-field.term-description-wrap {
		display: none;
	}
  </style>';
}

add_action( 'admin_head', 'glide_custom_css_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 750 );
}

add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Set favicon of dashboard
 */

function add_my_favicon() {
	$favicon_path = get_template_directory_uri() . '/favicon.ico';

	echo '<link rel="shortcut icon" href="' . esc_url( $favicon_path ) . '" />';
}

add_action( 'admin_head', 'add_my_favicon' );

/**
 * Function to remove the starting words from the_archive_title()
 *
 * E.g. from Category : Dallas Neighborhoods => Dallas Neighborhoods
 */

add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { // for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		}
		return $title;
	}
);
