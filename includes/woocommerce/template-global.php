<?php
/**
 * Provides compatibility with WooCommerce.
 *
 * @package   Alpha\Functions\WooCommerce
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Return a link to the cart including the number of items and the cart total.
 *
 * @since  1.0.0
 * @access public
 * @return string A link to the shopping cart.
 */
function alpha_wc_get_cart_link() {
	return sprintf( '<a class="cart-contents" href="%s" title="%s">%s</a>',
		esc_url( WC()->cart->get_cart_url() ),
		__( 'View your shopping cart', 'alpha' ),
		sprintf( '<span class="count">%s</span>',
			absint( WC()->cart->get_cart_contents_count() )
		)
	);
}

/**
 * Display a link to the cart including the number of items and the cart total.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wc_cart_link() {
	echo alpha_wc_get_cart_link();
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @since  1.0.0
 * @param  array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 */
function alpha_wc_cart_link_fragment( $fragments ) {
	$fragments['a.cart-contents'] = alpha_wc_get_cart_link();

	return $fragments;
}

/**
 * Display a link to the WooCommerce cart in the main menu.
 *
 * @since  1.0.0
 * @param  string   $menu HTML string of list items.
 * @param  stdClass $args Menu arguments.
 * @return string Amended HTML string of list items.
 */
function alpha_wc_header_cart( $menu, $args ) {
	if ( 'primary' !== $args->theme_location ) {
		return $menu;
	}

	$class = 'right menu-item site-header-cart';
	if ( is_cart() ) {
		$class .= ' current-menu-item';
	}

	return sprintf( '%s<li id="site-header-cart" class="%s">%s</li>',
		$menu,
		$class,
		alpha_wc_get_cart_link()
	);
}

/**
 * Change the primary sidebar ID.
 *
 * @since  1.0.0
 * @access public
 * @param  string $id The default primary sidebar ID.
 * @return string
 */
function alpha_wc_primary_sidebar_id( $id ) {
	if ( is_active_sidebar( 'shop' ) ) {
		$id = 'shop';
	}

	return $id;
}
