<?php
/**
 * Load all required library files.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * The current version of CareLib.
 *
 * @since 1.0.0
 */
define( 'CARELIB_VERSION', '1.0.0' );

/**
 * The absolute path to CareLib's root directory with a trailing slash.
 *
 * @since 1.0.0
 * @uses  get_template_directory()
 * @uses  trailingslashit()
 */
define( 'CARELIB_DIR', trailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'PARENT_THEME_DIR' ) ) {
	/**
	 * The absolute path to the template's root directory with a trailing slash.
	 *
	 * @since 1.0.0
	 * @uses  get_template_directory()
	 * @uses  trailingslashit()
	 */
	define( 'PARENT_THEME_DIR', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'PARENT_THEME_URI' ) ) {
	/**
	 * The absolute path to the template's root directory with a trailing slash.
	 *
	 * @since 1.0.0
	 * @uses  get_template_directory_uri()
	 * @uses  trailingslashit()
	 */
	define( 'PARENT_THEME_URI', trailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'CHILD_THEME_DIR' ) ) {
	/**
	 * The absolute path to the template's root directory with a trailing slash.
	 *
	 * @since 1.0.0
	 * @uses  get_stylesheet_directory()
	 * @uses  trailingslashit()
	 */
	define( 'CHILD_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );
}

if ( ! defined( 'PARENT_THEME_URI' ) ) {
	/**
	 * The absolute path to the template's root directory with a trailing slash.
	 *
	 * @since 1.0.0
	 * @uses  get_stylesheet_directory_uri()
	 * @uses  trailingslashit()
	 */
	define( 'CHILD_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );
}

/**
 * The global used to store all layout objects.
 *
 * @since 1.0.0
 */
if ( ! isset( $GLOBALS['_carelib_layouts'] ) ) {
	$GLOBALS['_carelib_layouts'] = array();
}

require_once CARELIB_DIR . 'includes/attributes.php';
require_once CARELIB_DIR . 'includes/breadcrumbs.php';
require_once CARELIB_DIR . 'includes/context.php';
require_once CARELIB_DIR . 'includes/head.php';
require_once CARELIB_DIR . 'includes/image.php';
require_once CARELIB_DIR . 'includes/language.php';
require_once CARELIB_DIR . 'includes/layouts.php';
require_once CARELIB_DIR . 'includes/menu.php';
require_once CARELIB_DIR . 'includes/paths.php';
require_once CARELIB_DIR . 'includes/plugins.php';
require_once CARELIB_DIR . 'includes/scripts.php';
require_once CARELIB_DIR . 'includes/search-form.php';
require_once CARELIB_DIR . 'includes/sidebar.php';
require_once CARELIB_DIR . 'includes/styles.php';
require_once CARELIB_DIR . 'includes/support.php';
require_once CARELIB_DIR . 'includes/template-404.php';
require_once CARELIB_DIR . 'includes/template-archive.php';
require_once CARELIB_DIR . 'includes/template-attachment.php';
require_once CARELIB_DIR . 'includes/template-comments.php';
require_once CARELIB_DIR . 'includes/template-entry.php';
require_once CARELIB_DIR . 'includes/template-global.php';
require_once CARELIB_DIR . 'includes/template-hooks.php';
require_once CARELIB_DIR . 'includes/template-load.php';
require_once CARELIB_DIR . 'includes/theme.php';
require_once CARELIB_DIR . 'includes/tinymce.php';
require_once CARELIB_DIR . 'admin/layouts.php';
require_once CARELIB_DIR . 'admin/metabox-post-layouts.php';
require_once CARELIB_DIR . 'admin/scripts.php';
require_once CARELIB_DIR . 'admin/styles.php';

if ( carelib_is_woocommerce_active() ) {
	require_once CARELIB_DIR . 'includes/woocommerce/template-global.php';
	require_once CARELIB_DIR . 'includes/woocommerce/template-hooks.php';
}

add_action( 'after_setup_theme', 'carelib_init', -95 );
/**
 * Load and initialize all library functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_init() {
	require_once CARELIB_DIR . 'includes/init.php';
}

add_action( 'after_setup_theme', 'carelib_admin_init', -95 );
/**
 * Load and initialize all library functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_admin_init() {
	if ( is_admin() ) {
		require_once CARELIB_DIR . 'admin/init.php';
	}
}

add_action( 'after_setup_theme', 'carelib_customize_init', -95 );
/**
 * Load and initialize all library functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_customize_init() {
	if ( is_customize_preview() ) {
		require_once CARELIB_DIR . 'customize/init.php';
	}
}
