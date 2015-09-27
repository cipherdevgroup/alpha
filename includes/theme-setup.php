<?php
/**
 * Theme setup functions and definitions.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'alpha_content_width',   0 );
add_action( 'after_setup_theme', 'alpha_setup',          10 );
add_action( 'after_setup_theme', 'alpha_includes',       10 );
add_action( 'after_setup_theme', 'alpha_admin_includes', 10 );

/**
 * Set the content width and allow it to be filtered directly.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alpha_content_width', 1140 );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_setup() {
	add_theme_support( 'theme-layouts', array( 'default' => is_rtl() ? '2c-l' : '2c-r' ) );

	carelib_get( 'site-logo' )->add_support();

	add_theme_support( 'automatic-feed-links' );
}

/**
 * Load all required theme files.
 *
 * @since  1.0.0
 * @access public
 * @uses   alpha_require_once()
 * @return void
 */
function alpha_includes() {
	alpha_require_once( 'vendor/tha-theme-hooks.php' );
	alpha_require_once( 'attributes.php' );
	alpha_require_once( 'compatibility.php' );
	alpha_require_once( 'hooked-archive.php' );
	alpha_require_once( 'hooked-attachment.php' );
	alpha_require_once( 'hooked-entry.php' );
	alpha_require_once( 'hooked-global.php' );
	alpha_require_once( 'layout.php' );
	alpha_require_once( 'scripts.php' );
	alpha_require_once( 'template-blog.php' );
	alpha_require_once( 'template-comments.php' );
	alpha_require_once( 'template-entry.php' );
	alpha_require_once( 'template-global.php' );
	alpha_require_once( 'theme-init.php' );
	alpha_require_once( 'widgets-init.php' );
}

/**
 * Load all required admin theme files.
 *
 * @since  1.0.0
 * @access public
 * @uses   alpha_require_once()
 * @return void
 */
function alpha_admin_includes() {
	if ( is_admin() ) {
		alpha_require_once( 'admin/layout.php' );
	}
}
