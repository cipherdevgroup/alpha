<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package   Alpha\Functions\Hooks
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */

defined( 'WPINC' ) || die;

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_get_parent_textdomain
 */
add_filter( 'carelib_parent_textdomain', 'alpha_get_parent_textdomain' );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_content_width
 */
add_action( 'after_setup_theme', 'alpha_content_width', 0 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_setup
 */
add_action( 'after_setup_theme', 'alpha_setup', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_image_sizes
 */
add_action( 'init', 'alpha_register_image_sizes', 5 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_nav_menus
 */
add_action( 'init', 'alpha_register_nav_menus', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_add_editor_styles
 */
add_action( 'init', 'alpha_add_editor_styles', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_layouts
 */
add_action( 'carelib_register_layouts', 'alpha_register_layouts', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_set_default_layout
 */
add_action( 'carelib_register_layouts', 'alpha_set_default_layout', 12 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_content_width_full
 */
add_filter( 'alpha_content_width', 'alpha_content_width_full', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_sidebars
 */
add_action( 'widgets_init', 'alpha_register_sidebars', 5 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_enqueue_styles
 */
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_styles',  10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_enqueue_scripts
 */
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_scripts', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_rtl_add_data
 */
add_action( 'wp_enqueue_scripts', 'alpha_rtl_add_data', 12 );
