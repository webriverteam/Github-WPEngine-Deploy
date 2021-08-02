<?php
/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

/**
 * Register a custom post type called "Testimonials".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_testimonials() {
	$cpt_singular_caps = 'Testimonial';
	$cpt_multiple_caps = 'Testimonials';
	$cpt_singular_small = 'testimonial';
	$cpt_multiple_small = 'testimonials';
	$labels = array(
		'name'                  => _x( $cpt_multiple_caps, 'Post type general name', 'basetheme21_td' ),
		'singular_name'         => _x( $cpt_singular_caps, 'Post type singular name', 'basetheme21_td' ),
		'menu_name'             => _x( $cpt_multiple_caps, 'Admin Menu text', 'basetheme21_td' ),
		'name_admin_bar'        => _x( $cpt_singular_caps, 'Add New on Toolbar', 'basetheme21_td' ),
		'add_new'               => __( 'Add New ', 'basetheme21_td' ),
		'add_new_item'          => __( 'Add New ', 'basetheme21_td' ),
		'new_item'              => __( 'New '.$cpt_singular_caps, 'basetheme21_td' ),
		'edit_item'             => __( 'Edit '.$cpt_singular_caps, 'basetheme21_td' ),
		'view_item'             => __( 'View  '.$cpt_singular_caps, 'basetheme21_td' ),
		'all_items'             => __( 'All '.$cpt_multiple_caps, 'basetheme21_td' ),
		'search_items'          => __( 'Search '.$cpt_multiple_caps, 'basetheme21_td' ),
		'parent_item_colon'     => __( 'Parent :'.$cpt_multiple_caps, 'basetheme21_td' ),
		'not_found'             => __( 'No '.$cpt_multiple_small.' found.', 'basetheme21_td' ),
		'not_found_in_trash'    => __( 'No '.$cpt_multiple_small.' found in Trash.', 'basetheme21_td' ),
		'featured_image'        => _x( 'Thumbnail Image', 'Overrides the “Featured Image” phrase.', 'basetheme21_td' ),
		'set_featured_image'    => _x( 'Set thumbnail image', 'Overrides the “Set featured image” phrase.', 'basetheme21_td' ),
		'remove_featured_image' => _x( 'Remove '. $cpt_singular_small . ' image', 'Overrides the “Remove featured image” phrase.', 'basetheme21_td' ),
		'use_featured_image'    => _x( 'Use as '.$cpt_singular_small.' image', 'Overrides the “Use as featured image” phrase.', 'basetheme21_td' ),
		'archives'              => _x( $cpt_singular_caps . ' archives', 'The post type archive label used in nav menus.', 'basetheme21_td' ),
		'insert_into_item'      => _x( 'Insert into '.$cpt_singular_small, 'Overrides the “Insert into post” phrase.', 'basetheme21_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this '.$cpt_singular_small, 'Overrides the “Uploaded to this post” phrase.', 'basetheme21_td' ),
		'filter_items_list'     => _x( 'Filter '.$cpt_multiple_small.' list', 'Screen reader text for the filter links.', 'basetheme21_td' ),
		'items_list_navigation' => _x( $cpt_multiple_caps . ' list navigation', 'Screen reader text for the pagination.', 'basetheme21_td' ),
		'items_list'            => _x( $cpt_multiple_caps . ' list', 'Screen reader text for the items list.', 'basetheme21_td' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => $cpt_multiple_small,
			'with_front' => 1,
		),
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-groups',
		'map_meta_cap'       => true,
		'show_in_rest' => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author','excrept' ),
	);

	register_post_type( $cpt_multiple_small, $args );
}

add_action( 'init', 'theme_register_cpt_testimonials' );
