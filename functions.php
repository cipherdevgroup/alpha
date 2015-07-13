<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Include CareLib.
require_once trailingslashit( get_template_directory() ) . 'includes/vendor/carelib/carelib.php';
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

	// http://themehybrid.com/docs/theme-layouts
	add_theme_support( 'theme-layouts', array( 'default' => is_rtl() ? '2c-r' : '2c-l' ) );

	// http://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// https://developer.wordpress.org/themes/functionality/navigation-menus/
	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'alpha' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'alpha' ),
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
	$dir = trailingslashit( get_template_directory() ) . 'includes/';

	require_once "{$dir}vendor/tha-theme-hooks.php";

	// Load all PHP files in the includes directory.
	require_once "{$dir}compatibility.php";
	require_once "{$dir}general.php";
	require_once "{$dir}scripts.php";
	require_once "{$dir}widgetize.php";
}

// Add a hook for child themes to execute code.
do_action( 'sitecare_after_setup_parent' );
