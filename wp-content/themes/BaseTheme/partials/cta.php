<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;


$basethemevar_page_cta_pagevisibility = $fields['basethemevar_page_cta_pagevisibility'];

$basethemevar_ftrcta_headline = ( $fields['basethemevar_page_cta_headline'] ) ? $fields['basethemevar_page_cta_headline'] : $option_fields['basethemevar_to_cta_headline'];
