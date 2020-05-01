<?php
/**
 * Helpers for various plugins.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     2.0.0
 */

/**
 * Determine if Beaver Builder is enabled within the current loop.
 *
 * @since  2.0.0
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
 * Determine if Elementor is enabled for a given post.
 *
 * @since  2.2.0
 * @access public
 * @param  bool $post_id The ID of the post to check.
 * @return bool True if Elementor is enabled.
 */
function carelib_is_built_with_elementor( $post_id = false ) {
	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return false;
	}

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return (bool) get_post_meta( $post_id, '_elementor_edit_mode', true );
}

/**
 * Determine if WooCommerce is installed and activated.
 *
 * @since  2.0.0
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
