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

alpha_require_once( 'theme-setup.php' );

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
