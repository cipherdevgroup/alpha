<?php
/**
 * Wrappers for WooCommerce's default hooks to allow them to be re-hooked.
 *
 * @package   CareLib\Functions\WooCommerce
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     2.0.0
 */

/**
 * Wrapper for the woocommerce_before_main_content hook to facilitate hooking.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_wc_before_main_content() {
	do_action( 'woocommerce_before_main_content' );
}

/**
 * Wrapper for the woocommerce_archive_description hook to facilitate hooking.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_wc_archive_description() {
	do_action( 'woocommerce_archive_description' );
}

/**
 * Wrapper for the woocommerce_before_shop_loop hook to facilitate hooking.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_wc_before_shop_loop() {
	do_action( 'woocommerce_before_shop_loop' );
}

/**
 * Wrapper for the woocommerce_after_shop_loop hook to facilitate hooking.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_wc_after_shop_loop() {
	do_action( 'woocommerce_after_shop_loop' );
}

/**
 * Wrapper for the woocommerce_after_main_content hook to facilitate hooking.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_wc_after_main_content() {
	do_action( 'woocommerce_after_main_content' );
}
