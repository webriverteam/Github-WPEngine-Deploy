<?php
/**
 * The template  displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

// Global variables
global $option_fields;
global $pID;
global $fields;

// page - Advanced custom fields variables
$basethemevar_error_text             = $option_fields['basethemevar_error_text'];
$basethemevar_error_menu             = $option_fields['basethemevar_error_menu'];
$basethemevar_error_menu_bottom_text             = $option_fields['basethemevar_error_menu_bottom_text'];
$basethemevar_error_search             = $option_fields['basethemevar_error_search'];

?>

<div class="s-section">
	<div class="wrapper">
		<section class="error-404 not-found">
			<div class="page-content">
			<?php if ( $basethemevar_error_text ) { ?>
					<?php echo $basethemevar_error_text; ?>
				<?php } ?>
				<?php if ( $basethemevar_error_menu ) { ?>
					<div class="error">
					<?php echo $basethemevar_error_menu; ?>
					</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="404-form">
				<?php if ( $basethemevar_error_menu_bottom_text ) { ?>
					<?php echo $basethemevar_error_menu_bottom_text; ?>
				<?php } ?>
				<?php if ( $basethemevar_error_search != 1 ) { ?>
					<?php get_search_form(); ?>
				<?php } ?>
				</div><!--404-form-->
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
		<div class="xl-2"></div>
	</div>
</div>
<?php
get_footer();
