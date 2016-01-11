<?php
/**
 * Load Theme JavaScript and CSS
 *
 * @package    Alpha\Functions\Scripts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

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
 * Build a Google Fonts string.
 *
 * @since  1.0.0
 * @access public
 * @param  string $families the font families to include.
 * @param  bool   $editor_style set to true if string is being used as editor style.
 * @return string
 */
function alpha_google_fonts_string( $families, $editor_style = false ) {
	$string = "https://fonts.googleapis.com/css?family={$families}";
	return $editor_style ? str_replace( ',', '%2C', $string ) : $string;
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
	if ( apply_filters( 'alpha_enable_google_fonts', true ) ) {
		wp_enqueue_style(
			'alpha-google-fonts',
			alpha_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700' ),
			array(),
			null
		);
	}
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
		$version,
		true
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
