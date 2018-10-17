<?php
/**
 * Methods for handling admin JavaScript and CSS in the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Registers admin styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_admin_register_styles() {
	$suffix = carelib_get_suffix();

	wp_register_style(
		'carelib-admin',
		carelib_get_css_uri( "carelib-admin{$suffix}.css" ),
		null,
		CARELIB_VERSION
	);
}
