<?php
/**
 * Helpers for various plugins.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     2.0.0
 */

/**
 * Determine if Beaver Builder is enabled within the current loop.
 *
 * @since  0.1.0
 * @access public
 * @return bool True if Beaver Builder is enabled.
 */
function carelib_is_beaver_enabled() {
	$enabled = false;

	if ( is_callable( array( 'FLBuilderModel', 'is_builder_enabled' ) ) ) {
		$enabled = FLBuilderModel::is_builder_enabled();
	}

	return $enabled;
}

/**
 * Determine if WooCommerce is installed and activated.
 *
 * @since  0.1.0
 * @access public
 * @return bool True if WooCommerce is active.
 */
function carelib_is_woocommerce_active() {
	static $enabled;

	if ( null === $enabled ) {
		$enabled = false;

		if ( function_exists( 'WC' ) ) {
			$enabled = true;
		}
	}

	return $enabled;
}
