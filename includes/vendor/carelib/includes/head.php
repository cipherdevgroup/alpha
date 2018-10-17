<?php
/**
 * Functions for outputting common site data in the `<head>` area of a site.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Output a meta meta tag to set the charset.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_meta_charset() {
	printf( '<meta charset="%s" />' . "\n", esc_attr( get_bloginfo( 'charset' ) ) );
}

/**
 * Output a meta meta tag to set the viewport width and initial scale.
 *
 * @since  1.0.0
 * @access public
 */
function carelib_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Output a meta meta tag to prevent iOS devices from auto-formatting phone
 * numbers by default.
 *
 * @since  1.0.0
 * @access public
 */
function carelib_meta_ios_phone_formatting() {
	echo '<meta name="format-detection" content="telephone=no">' . "\n";
}

/**
 * Output the pingback link.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_link_pingback() {
	if ( 'open' === get_option( 'default_ping_status' ) ) {
		printf( '<link rel="pingback" href="%s" />' . "\n",
			esc_url( get_bloginfo( 'pingback_url' ) )
		);
	}
}

/**
 * Print an inline script which adds a class of 'has-js' to the <html> tag.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_canihas_js() {
	echo '<script type="text/javascript">document.documentElement.classList.add("has-js");</script>' . "\n";
}
