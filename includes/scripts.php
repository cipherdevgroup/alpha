<?php
/**
 * Load Theme JavaScript and CSS
 *
 * @package    Alpha\Functions\Scripts
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'alpha_enqueue_styles',  10 );
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_scripts', 10 );
add_action( 'wp_enqueue_scripts', 'alpha_rtl_add_data',    12 );

/**
 * Return a suffix to load minified JavaScript on production.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_get_suffix() {
	return carelib_get( 'public-scripts' )->get_suffix();
}

/**
 * Load a minified version of the theme's stylesheet along with any other
 * required theme CSS files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_enqueue_styles() {
	wp_enqueue_style( 'alpha-style' );
	wp_enqueue_style(
		'alpha-google-fonts',
		'//fonts.googleapis.com/css?family=Raleway:400,600|Lato:400,400italic,700',
		array(),
		null
	);
}

/**
 * Register and load JavaScript files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_enqueue_scripts() {
	$js_uri  = trailingslashit( get_template_directory_uri() ) . 'js/';
	$suffix  = alpha_get_suffix();
	$version = carelib_get( 'public-scripts' )->theme_version();

	wp_enqueue_script(
		'alpha-general',
		"{$js_uri}theme{$suffix}.js",
		array( 'jquery' ),
		'1.0.0',
		$version
	);
}

/**
 * Replace the default theme stylesheet with a RTL version when a RTL
 * language is being used.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_rtl_add_data() {
	wp_style_add_data( 'alpha-style', 'rtl', 'replace' );
	wp_style_add_data( 'alpha-style', 'suffix', alpha_get_suffix() );
}
