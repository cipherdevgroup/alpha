<?php
/**
 * Provides compatibility with WooCommerce.
 *
 * @package   Alpha\Actions\WooCommerce
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'WPINC' ) || die;

/**
 * Callback defined in includes/woocommerce/template-global.php
 *
 * @see alpha_wc_cart_link_fragment
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'alpha_wc_cart_link_fragment', 10 );

/**
 * Callback defined in includes/woocommerce/template-global.php
 *
 * @see alpha_wc_header_cart
 */
add_filter( 'wp_nav_menu_items', 'alpha_wc_header_cart', 5, 2 );

/**
 * Callback defined in includes/woocommerce/template-global.php
 *
 * @see alpha_wc_sidebar_location
 */
add_filter( 'alpha_sidebar_location', 'alpha_wc_sidebar_location', 10 );

/**
 * Callback defined in WooCommerce
 *
 * Remove the default content wrapper start.
 *
 * @see woocommerce_output_content_wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

/**
 * Callback defined in WooCommerce
 *
 * Remove the default content wrapper end.
 *
 * @see woocommerce_output_content_wrapper_end
 */
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Callback defined in WooCommerce
 *
 * Remove the default breadcrumbs.
 *
 * @see woocommerce_breadcrumb
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
