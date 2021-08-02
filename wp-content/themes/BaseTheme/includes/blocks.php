<?php
/**
 * Functions for custom Gutenberg blocks
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

/**
 * Register custom Gutenberg blocks category
 */
function my_acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'glide-blocks',
				'title' => __( 'Glide Blocks', 'basetheme21_td' ),
				'icon'  => 'admin-generic',
				'icon'  =>  file_get_contents( get_template_directory() . '/assets/img/glide-icon.svg' ),
			),

		)
	);
}
add_filter( 'block_categories', 'my_acf_block_categories', 10, 2 );


/**
 * Register custom Gutenberg blocks
 */
add_action( 'acf/init', 'theme_acf_init' );
function theme_acf_init() {

	if ( function_exists( 'acf_register_block' ) ) {

		// register a ACFBlock
		acf_register_block(
			array(
				'name'            => 'acfblock',
				'title'           => __( 'ACFBlock', 'basetheme21_td' ),
				'description'     => __( 'A custom ACFBlock.', 'basetheme21_td' ),
				'render_callback' => 'my_acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'ACFBlock' ),
				'align'           => 'wide',
				'supports'        => array(
				),

			)
		);

	}
}

/**
 * Reder custom Gutenberg blocks
 */

function my_acf_block_render_callback( $block ) {
	// convert name ("acf/Testimonial") into path friendly slug ("Testimonial")
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the "template-parts/block" folder
	if ( file_exists( get_theme_file_path( "/blocks/block-{$slug}.php" ) ) ) {
		include get_theme_file_path( "/blocks/block-{$slug}.php" );
	}
}
