<?php
/**
 * Loads customizer-related files (see `/inc/customize`) and sets up customizer
 * functionality.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/customize/register.php
 *
 * @see carelib_customize_load_breadcrumb_settings
 */
add_action( 'customize_register', 'carelib_customize_load_classes', 0 );

/**
 * Callback defined in includes/customize/register.php
 *
 * @see carelib_customize_register_layouts
 */
add_action( 'customize_register', 'carelib_customize_register_layouts', 10 );

if ( carelib_breadcrumb_plugin_is_active() ) {
	/**
	 * Callback defined in includes/customize/register.php
	 *
	 * @see carelib_register_breadcrumb_settings
	 */
	add_action( 'customize_register', 'carelib_register_breadcrumb_settings', 15 );
}

/**
 * Callback defined in includes/customize/styles.php
 *
 * @see carelib_customize_register_controls_styles
 */
add_action( 'customize_controls_enqueue_scripts', 'carelib_customize_register_controls_styles', 0 );

/**
 * Callback defined in includes/customize/scripts.php
 *
 * @see carelib_customize_register_controls_scripts
 */
add_action( 'customize_controls_enqueue_scripts', 'carelib_customize_register_controls_scripts', 0 );

/**
 * Callback defined in includes/customize/scripts.php
 *
 * @see carelib_customize_register_preview_scripts
 */
add_action( 'customize_preview_init', 'carelib_customize_register_preview_scripts', 0 );

/**
 * Callback defined in includes/customize/scripts.php
 *
 * @see carelib_customize_enqueue_preview_scripts
 */
add_action( 'customize_preview_init', 'carelib_customize_enqueue_preview_scripts', 10 );
