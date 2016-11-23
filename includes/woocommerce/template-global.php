<?php
/**
 * Provides compatibility with WooCommerce.
 *
 * @package   Alpha\Functions\WooCommerce
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Check to see if we're on an archive WooCommerce page.
 *
 * @since  1.0.0
 * @access public
 * @return bool true if viewing any WooCommerce archive page.
 */
function alpha_wc_is_plural() {
	return is_shop() || is_product_taxonomy();
}

/**
 * Check to see if we're on a singular WooCommerce page.
 *
 * @since  1.0.0
 * @access public
 * @return bool True if viewing any single WooCommerce entry or page.
 */
function alpha_wc_is_singular() {
	return is_page( array( 'my-account', 'cart', 'checkout' ) ) || is_product();
}

/**
 * Load the main content template for WooCommerce.
 *
 * @since  1.0.0
 * @access public
 * @return null
 */
function alpha_wc_content() {
	if ( is_product() ) {
		return wc_get_template_part( 'content', 'single-product' );
	}

	return wc_get_template_part( 'content', 'product' );
}

/**
 * Output WooCommerce product subcategories.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wc_product_subcategories() {
	woocommerce_product_subcategories( array(
		'before' => alpha_get_product_loop_start(),
		'after'  => alpha_get_product_loop_end(),
	) );
}

/**
 * Return the start of a product loop without loading an entire fucking template
 * for a single god damn HTML tag.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_get_product_loop_start() {
	return apply_filters( 'alpha_product_loop_start', '<ul class="products">' );
}

/**
 * Output the start of a product loop without loading an entire fucking template
 * for a single god damn HTML tag.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_product_loop_start() {
	echo alpha_get_product_loop_start();
}

/**
 * Return the end of a product loop without loading an entire fucking template
 * for a single god damn HTML tag.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_get_product_loop_end() {
	return apply_filters( 'alpha_product_loop_end', '</ul>' );
}

/**
 * Output the end of a product loop without loading an entire fucking template
 * for a single god damn HTML tag.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_product_loop_end() {
	echo alpha_get_product_loop_end();
}

/**
 * Output WooCommerce page title on WooCommerce archives.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wc_page_title() {
	if ( apply_filters( 'woocommerce_show_page_title', true ) ) {
		echo '<h1 ' . alpha_get_attr( 'archive-title' ) . '>';
		woocommerce_page_title();
		echo '</h1>';
	}
}

/**
 * Return a WooCommerce product image.
 *
 * Apparently WooCommerce doesn't have a template function to output ONLY the
 * main featured image. Instead they just do a bunch of crazy shit inside the
 * actual loop template to display a single image. Good times. Good times.
 *
 * @since  1.0.0
 * @param  int $post_id The post ID to use when getting the product image.
 * @return string
 */
function alpha_wc_get_product_image( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$image = sprintf( '<img src="%s" alt="%s" />hello',
		wc_placeholder_img_src(),
		__( 'Placeholder', 'alpha' )
	);

	if ( has_post_thumbnail() ) {
		$image = get_the_post_thumbnail(
			$post_id,
			apply_filters( 'single_product_large_thumbnail_size', 'shop_single' )
		);
	}

	return apply_filters( 'woocommerce_single_product_image_html',
		sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image" title="%s">%s</a>',
			get_permalink( $post_id ),
			the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ),
			$image
		),
		$post_id
	);
}

/**
 * Display a WooCommerce product image.
 *
 * @since  1.0.0
 * @access public
 * @param  int $post_id The post ID to use when getting the product image.
 * @return void
 */
function alpha_wc_product_image( $post_id = false ) {
	echo alpha_wc_get_product_image( $post_id );
}

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
