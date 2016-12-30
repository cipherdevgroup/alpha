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
 * Register customizer controls styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_customize_register_controls_styles() {
	$suffix = carelib_get_suffix();

	wp_register_style(
		'carelib-customize-controls',
		carelib_get_css_uri( "customize-controls{$suffix}.css" ),
		array(),
		CARELIB_VERSION
	);
}
