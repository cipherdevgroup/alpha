<?php
/**
 * Include library and setup files.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * The current version of the parent theme. Should match the version in style.css.
 *
 * @since 0.1.0
 */
define( 'PARENT_THEME_VERSION', '1.0.0' );

/**
 * The absolute path to the template's root directory with a trailing slash.
 *
 * @since 0.1.0
 * @uses  get_template_directory()
 * @uses  trailingslashit()
 */
define( 'PARENT_THEME_DIR', trailingslashit( get_template_directory() ) );

/**
 * The absolute path to the template's root directory with a trailing slash.
 *
 * @since 0.1.0
 * @uses  get_template_directory_uri()
 * @uses  trailingslashit()
 */
define( 'PARENT_THEME_URI', trailingslashit( get_template_directory_uri() ) );

require_once PARENT_THEME_DIR . 'includes/vendor/carelib/carelib.php';
require_once PARENT_THEME_DIR . 'includes/scripts.php';
require_once PARENT_THEME_DIR . 'includes/template-404.php';
require_once PARENT_THEME_DIR . 'includes/template-archive.php';
require_once PARENT_THEME_DIR . 'includes/template-entry.php';
require_once PARENT_THEME_DIR . 'includes/template-global.php';
require_once PARENT_THEME_DIR . 'includes/template-layout.php';
require_once PARENT_THEME_DIR . 'includes/theme-setup.php';
require_once PARENT_THEME_DIR . 'includes/actions.php';
require_once PARENT_THEME_DIR . 'includes/filters.php';

if ( carelib_is_woocommerce_active() ) {
	require_once PARENT_THEME_DIR . 'includes/woocommerce/template-global.php';
	require_once PARENT_THEME_DIR . 'includes/woocommerce/actions.php';
	require_once PARENT_THEME_DIR . 'includes/woocommerce/filters.php';
}

if ( is_admin() ) {
	require_once PARENT_THEME_DIR . 'admin/layout.php';
	require_once PARENT_THEME_DIR . 'admin/filters.php';
}

/**
 * A hook within the global scope; common to all WP Site Care themes.
 *
 * This is meant for plugins and child themes to execute code after the parent
 * theme setup has been completed.
 *
 * @since  0.1.0
 * @access public
 */
do_action( 'sitecare_after_setup_parent' );
