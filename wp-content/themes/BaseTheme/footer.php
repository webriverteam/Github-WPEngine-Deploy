<?php
/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Include header.
get_header();

// Global variables.
global $option_fields;
global $pID;
global $fields;

?>

</main> <?php get_template_part( 'partials/cta' ); ?>


<?php

// basethemevar_Schema Markup - Advanced custom fields variables.
$basethemevar_schema_locality            = $option_fields['locality'];
$basethemevar_schema_region              = $option_fields['region'];
$basethemevar_schema_postal_code         = $option_fields['postal_code'];
$basethemevar_schema_street_address      = $option_fields['street_address'];
$basethemevar_schema_map_short_link      = $option_fields['map_short_link'];
$basethemevar_schema_latitude            = $option_fields['latitude'];
$basethemevar_schema_longitude           = $option_fields['longitude'];
$basethemevar_schema_business_name       = $option_fields['business_name'];
$basethemevar_schema_opening_hours       = $option_fields['opening_hours'];
$basethemevar_schema_telephone           = $option_fields['telephone'];
$basethemevar_schema_business_email      = $option_fields['business_email'];
$basethemevar_schema_business_image_logo = $option_fields['business_image_logo'];
$basethemevar_schema_business_legal_name = $option_fields['business_legal_name'];
$basethemevar_schema_price_range         = $option_fields['price_range'];
$basethemevar_schema_business_type       = $option_fields['business_type'];

?>


<footer>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "<?php echo $basethemevar_schema_business_type; ?>",
		"address": {
			"@type": "PostalAddress",
			"addressLocality": "<?php echo $basethemevar_schema_locality; ?> ",
			"addressRegion": "<?php echo $basethemevar_schema_region; ?> ",
			"postalCode": "<?php echo $basethemevar_schema_postal_code; ?> ",
			"streetAddress": "<?php echo $basethemevar_schema_street_address; ?> "
		},
		"hasMap": "<?php echo $basethemevar_schema_map_short_link; ?>",
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": "<?php echo $basethemevar_schema_latitude; ?> ",
			"longitude": "<?php echo $basethemevar_schema_longitude; ?> "
		},
		"name": "<?php echo $basethemevar_schema_business_name; ?>",
		"openingHours": [ < ? php echo $basethemevar_schema_opening_hours; ? > ],
		"telephone": "<?php echo $basethemevar_schema_telephone; ?> ",
		"email": "<?php echo $basethemevar_schema_business_email; ?> ",
		"url": "<?php echo esc_url( home_url() ); ?>",
		"image": "<?php echo $basethemevar_schema_business_image_logo; ?> ",
		"legalName": "<?php echo $basethemevar_schema_business_legal_name; ?> ",
		"priceRange": "<?php echo $basethemevar_schema_price_range; ?>"
	}
	</script>
</footer>

<?php wp_footer(); ?> </body>

</html>
