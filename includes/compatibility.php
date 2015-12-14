<?php
/**
 * Provides compatibility with various WordPress plugins.
 *
 * @package    Alpha\Functions\Plugins
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'alpha_jetpack_setup', 12 );
/**
 * Make adjustments to the theme when Jetpack is installed and activated.
 * Change the default related posts image size.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_jetpack_setup() {
	// Return early if Jetpack isn't activated.
	if ( ! class_exists( 'Jetpack' ) ) {
		return;
	}

	// Add support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}

add_filter( 'rp4wp_thumbnail_size', 'alpha_related_posts_image' );
/**
 * Change the default related posts image size.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_related_posts_image() {
	return 'related-posts';
}
