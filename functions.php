<?php
/**
 * Include library and setup files.
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
 * Require an included theme file once.
 *
 * @since  1.0.0
 * @access public
 * @param  string $path the relative path of the file to be included
 * @return void
 */
function alpha_require_once( $path ) {
	require_once trailingslashit( get_template_directory() ) . 'includes/' . ltrim( $path );
}

alpha_require_once( 'vendor/carelib/carelib.php' );

carelib()->set_prefix( 'alpha' )->run();

add_action( 'after_setup_theme', 'alpha_content_width', 0 );
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

add_action( 'after_setup_theme', 'alpha_setup', 10 );
/**
 * Set up theme defaults and add support for WordPress and CareLib features.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_setup() {
	carelib_get( 'layouts' )->set_default( is_rtl() ? '2c-l' : '2c-r' )->add_support();

	carelib_get( 'site-logo' )->add_support();

	add_theme_support( 'automatic-feed-links' );
}

add_action( 'after_setup_theme', 'alpha_includes', 10 );
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

add_action( 'after_setup_theme', 'alpha_admin_includes', 10 );
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

/**
 * A hook within the global scope; common to all WP Site Care themes.
 *
 * This is meant for plugins and child themes to execute code after the parent
 * theme setup has been completed.
 *
 * @since  1.0.0
 * @access public
 */
do_action( 'sitecare_after_setup_parent' );
