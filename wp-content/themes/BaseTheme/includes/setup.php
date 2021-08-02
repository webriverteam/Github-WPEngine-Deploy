<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

 /**
  * Sets up theme defaults and registers support for various WordPress features.
  */
if ( ! function_exists( 'theme_setup_function' ) ) :

	function theme_setup_function() {

		// Make theme available for translation.
		load_theme_textdomain( 'basetheme21_td' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for RSS Feed.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail sizes
		set_post_thumbnail_size( 150, 150, true );

		// Add custom thumbnail sizes
		add_image_size( 'admin', 50, 50 );
		add_image_size( 'full', 9999, 9999 );
		add_image_size( 'thumbnail', 980, 625, false );

		// Register wp_nav_menu() menus
		register_nav_menus(
			array(
				'main'   => __( 'Main Navigation', 'basetheme21_td' ),
				'footer' => __( 'Footer Menu', 'basetheme21_td' ),
			)
		);

		// Fallback function for menus
		function fallbackmenu(){ ?> <div id="menu">
	<ul>
		<li> <?php _e( 'Go to Admin > Appearance > Menus to create your menu.', 'basetheme21_td' ); ?></li>
	</ul>
</div>
			<?php
		}

		// Adding HTML5 support
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Align support for Gutenberg - Enabling theme support for align full and align wide option for the block editor.
		add_theme_support( 'align-wide' );

		// Set JPEG quality to 100%
		add_filter(
			'jpeg_quality',
			function() {
				return 100;
			}
		);

	}
endif;

add_action( 'after_setup_theme', 'theme_setup_function' );
