<?php
/**
 * Loads customizer-related files (see `/inc/customize`) and sets up customizer
 * functionality.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Register customizer controls scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_customize_register_controls_scripts() {
	$suffix = carelib_get_suffix();

	wp_register_script(
		'carelib-customize-controls',
		carelib_get_js_uri( "customize-controls{$suffix}.js" ),
		array( 'customize-controls' ),
		CARELIB_VERSION,
		true
	);
}

/**
 * Register customizer preview scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_customize_register_preview_scripts() {
	$suffix = carelib_get_suffix();

	wp_register_script(
		'carelib-customize-preview',
		carelib_get_js_uri( "customize-preview{$suffix}.js" ),
		array( 'jquery' ),
		CARELIB_VERSION,
		true
	);
}

/**
 * Register customizer preview scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_customize_enqueue_preview_scripts() {
	wp_enqueue_script( 'carelib-customize-preview' );
}
