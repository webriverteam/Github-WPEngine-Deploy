<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

if ( ! is_active_sidebar( 'sidebar-widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="widgets-area">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-widgets')) ?>
</aside>
