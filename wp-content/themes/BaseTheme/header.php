<?php
/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_category() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

$option_fields = get_fields( 'option' );
$fields        = get_fields( $pID );

// Page Tags - Advanced custom fields variables
$tracking = $option_fields['tracking_code'];
$ccss     = $option_fields['custom_css'];
$hscripts = $option_fields['head_scripts'];
$bscripts = $option_fields['body_scripts'];

// Page variables - Advanced custom fields variables

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri()) ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri()); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri()); ?>/favicon-16x16.png">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/favicon.ico" />

	<script>
		// Identifies the Browser type in the HTML tag for specific browser CSS
		var doc = document.documentElement;
		doc.setAttribute('data-useragent', navigator.userAgent);
		doc.setAttribute("data-platform", navigator.platform);
	</script>
	<?php
		// Add Tracking Code
	if ( $tracking != '' ) {
		echo $tracking;
	}
		// Add Custom CSS
	if ( $ccss != '' ) {
		echo '<style type="text/css">';
		echo $ccss;
		echo '</style>';
	}
		// Add Head Scripts
	if ( $hscripts != '' ) {
		echo $hscripts;
	}
	?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<?php if ( $bscripts != '' ) { ?>
		<div style="display: none;">
			<?php echo $bscripts; ?>
		</div>
	<?php } ?>
	<header class="site-header">
		<div class="big-wrapper">
			<div class="left-header">
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Logo</a>
				</div>
			</div>
			<div class="right-header">
				<div class="menu-overlay">
					<div class="menu-container">
						<div class="menu-content">
							<div class="main-menu">
								<span class="header-menu-item">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main',
											'fallback_cb' => 'fallbackmenu',
										)
									);
								?>
								</span>
							</div>
							<div class="header-btns">
							</div>
							<!-- /.header-btns -->
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="menu-btn">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /.wrapper -->

	</header>

	<main id="content" class="site-content">
	<?php
		/**
		 * Include masthead
		 *
		 * Contains masthead settings for each type and template for the theme
		 */
		get_template_part( 'partials/masthead' );
	?>
