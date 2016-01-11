<?php
/**
 * Include library and setup files.
 *
 * @package    Alpha\Functions
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Require an included theme file once.
 *
 * @since  1.0.0
 * @access public
 * @param  string $path the relative path of the file to be included.
 * @return void
 */
function alpha_require_once( $path ) {
	require_once trailingslashit( get_template_directory() ) . 'includes/' . ltrim( $path );
}

alpha_require_once( 'vendor/carelib/carelib.php' );
alpha_require_once( 'vendor/tha-theme-hooks.php' );
alpha_require_once( 'attributes.php' );
alpha_require_once( 'compatibility.php' );
alpha_require_once( 'layout.php' );
alpha_require_once( 'scripts.php' );
alpha_require_once( 'template-archive.php' );
alpha_require_once( 'template-attachment.php' );
alpha_require_once( 'template-entry.php' );
alpha_require_once( 'template-global.php' );
alpha_require_once( 'theme-setup.php' );
alpha_require_once( 'actions.php' );
alpha_require_once( 'filters.php' );

if ( is_admin() ) {
	alpha_require_once( 'admin/layout.php' );
}

carelib()->set_prefix( 'alpha' )->run();

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
