<?php
/**
 * Provides compatibility with various WordPress plugins.
 *
 * @package    Alpha\Functions\Compatibility
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) or exit;

add_action( 'after_setup_theme', 'alpha_jetpack_setup', 12 );
/**
 * Make adjustments to the theme when Jetpack is installed and activated.
 * Change the default related posts image size.
 *
 * @since  1.0.0
 * @return void
 * @access public
 * @return string
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
