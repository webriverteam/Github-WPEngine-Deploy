<?php
/**
 * Custom functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

/**
 * Excerpt Function
 *
 * Function used to create excerpt for single posts.
 *
 */
function custom_excerpt($count){
	global $post;
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.' ...';
	$excerpt = $excerpt;
	return $excerpt;
}


/**
 * Excerpt with no Read More option
 *
 * Function used to create excerpt for single posts.
 *
 */
function custom_excerpt_no_more($count){
	global $post;
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt;
	return $excerpt;
}


/**
 * Pagination Function
 *
 * The pagination function to display paginatio on a archive page
 *
 */
function pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	 if(1 != $pages)
	{
		echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "<div class='clear'></div></div>\n";
	}
}


/**
 * Allow SVG files upload in WordPress Media panel
 *
 * By default the WordPress doesn't allows you to upload SVG files.
 * This function is used to remove that restriction so that you can
 * upload SVG files.
 *
 */
function fix_svg_upload_error($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'fix_svg_upload_error');


/**
 * Remove default WordPress login  logo link
 *
 * This function removes the default link on the login screen logo.
 * Makes this logo go to homepage of the website.
 *
 */
function custom_login_logo_url($url) {
	return '"'.home_url().'"';
}

add_filter( 'login_headerurl', 'custom_login_logo_url' );


/**
 * Add viewport meta tag in head
 *
 */
function viewport_tag() {
	echo '
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	';
}

add_action( 'wp_head', 'viewport_tag' );


/**
 * Gravity forms filters
 *
 */
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_init_scripts_footer', '__return_true' );

// Set Tabindex For Gravity Form
add_filter( 'gform_tabindex', 'change_tabindex' , 10, 2 );
function change_tabindex( $tabindex, $form ) {
    return 10;
}

/**
 * First and last menu item classes
 *
 */
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first-menu-item';
    $items[count($items)]->classes[] = 'last-menu-item';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');


/**
 * How it Works Block Title to slug
 */

function slugify( $text ) {
	// Strip html tags
	$text = strip_tags( $text );
	// Replace non letter or digits by -
	$text = preg_replace( '~[^\pL\d]+~u', '-', $text );
	// Transliterate
	setlocale( LC_ALL, 'en_US.utf8' );
	$text = iconv( 'utf-8', 'us-ascii//TRANSLIT', $text );
	// Remove unwanted characters
	$text = preg_replace( '~[^-\w]+~', '', $text );
	// Trim
	$text = trim( $text, '-' );
	// Remove duplicate -
	$text = preg_replace( '~-+~', '-', $text );
	// Lowercase
	$text = strtolower( $text );
	// Check if it is empty
	if ( empty( $text ) ) {
		return 'n-a'; }
	// Return result
	return $text;
}
