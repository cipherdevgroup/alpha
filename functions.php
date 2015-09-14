<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Return a path to the alpha includes directory with a trailing slash.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_get_includes_dir() {
	return trailingslashit( get_template_directory() ) . 'includes/';
}

// Include CareLib.
require_once alpha_get_includes_dir() . 'vendor/carelib/carelib.php';
carelib()->run( array( 'prefix' => 'alpha' ) );

add_action( 'after_setup_theme', 'alpha_setup', 10 );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since   1.0.0
 * @return  void
 */
function alpha_setup() {
	global $content_width;

	$content_width = 1140;

	add_theme_support( 'theme-layouts', array( 'default' => is_rtl() ? '2c-l' : '2c-r' ) );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'site-logo' );

	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'alpha' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'alpha' ),
	) );
}

add_action( 'init', 'alpha_register_image_sizes', 5 );
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

add_action( 'widgets_init', 'alpha_register_sidebars', 5 );
/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_sidebars() {
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'alpha' ),
		'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'alpha' ),
	) );
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'footer-widgets',
		'name'        => _x( 'Footer Widgets', 'sidebar', 'alpha' ),
		'description' => __( 'A widgeted area which displays just before the main site footer on all pages.', 'alpha' ),
	) );
}

add_action( 'after_setup_theme', 'alpha_includes', 10 );
/**
 * Load all required theme files.
 *
 * @since   1.0.0
 * @return  void
 */
function alpha_includes() {
	$dir = alpha_get_includes_dir();

	require_once "{$dir}vendor/tha-theme-hooks.php";
	require_once "{$dir}attributes.php";
	require_once "{$dir}compatibility.php";
	require_once "{$dir}layout.php";
	require_once "{$dir}template-comments.php";

	if ( is_admin() ) {
		require_once "{$dir}admin/scripts.php";
	} else {
		require_once "{$dir}hooked-archive.php";
		require_once "{$dir}hooked-attachment.php";
		require_once "{$dir}hooked-entry.php";
		require_once "{$dir}hooked-global.php";
		require_once "{$dir}scripts.php";
		require_once "{$dir}template-blog.php";
		require_once "{$dir}template-entry.php";
		require_once "{$dir}template-global.php";
	}
}

// Add a hook for child themes to execute code.
do_action( 'sitecare_after_setup_parent' );
