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
 * The absolute path to the template's root directory with a trailing slash.
 *
 * @since 1.0.0
 * @uses  get_template_directory()
 * @uses  trailingslashit()
 */
define( 'ALPHA_DIR',  trailingslashit( get_template_directory() ) );

require_once ALPHA_DIR . 'includes/vendor/carelib/carelib.php';
require_once ALPHA_DIR . 'includes/vendor/tha-theme-hooks.php';
require_once ALPHA_DIR . 'includes/attributes.php';
require_once ALPHA_DIR . 'includes/plugins.php';
require_once ALPHA_DIR . 'includes/scripts.php';
require_once ALPHA_DIR . 'includes/template-archive.php';
require_once ALPHA_DIR . 'includes/template-attachment.php';
require_once ALPHA_DIR . 'includes/template-entry.php';
require_once ALPHA_DIR . 'includes/template-global.php';
require_once ALPHA_DIR . 'includes/template-layout.php';
require_once ALPHA_DIR . 'includes/theme-setup.php';
require_once ALPHA_DIR . 'includes/actions.php';
require_once ALPHA_DIR . 'includes/filters.php';

if ( is_admin() ) {
	require_once ALPHA_DIR . 'includes/admin/layout.php';
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
