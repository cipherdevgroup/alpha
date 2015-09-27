<?php
/**
 * Theme functions which must be run on the WordPress core 'init' hook.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'init', 'alpha_register_image_sizes', 5 );
add_action( 'init', 'alpha_register_nav_menus',  10 );

/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_image_sizes() {
	set_post_thumbnail_size( 175, 130, true );
	add_image_size( 'featured',     1025, 500, true );
	add_image_size( 'related-posts', 350, 250, true );
}

/**
 * Register custom nav menus for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_nav_menus() {
	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'alpha' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'alpha' ),
	) );
}
