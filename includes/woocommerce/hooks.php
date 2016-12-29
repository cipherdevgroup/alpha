<?php
/**
 * Provides compatibility with WooCommerce.
 *
 * @package   Alpha\Actions\WooCommerce
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'WPINC' ) || die;

add_filter( 'woocommerce_add_to_cart_fragments', 'alpha_wc_cart_link_fragment', 10 );

add_filter( 'wp_nav_menu_items', 'alpha_wc_header_cart', 5, 2 );

add_filter( 'alpha_sidebar_location','alpha_wc_sidebar_location', 10 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
