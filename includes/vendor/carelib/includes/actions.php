<?php
/**
 * All the default actions within the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/image.php
 *
 * @see carelib_delete_image_cache_by_post
 */
add_action( 'save_post', 'carelib_delete_image_cache_by_post', 10 );

/**
 * Callback defined in includes/image.php
 *
 * @see carelib_delete_image_cache_by_meta
 */
add_action( 'deleted_post_meta', 'carelib_delete_image_cache_by_meta', 10, 2 );

/**
 * Callback defined in includes/image.php
 *
 * @see carelib_delete_image_cache_by_meta
 */
add_action( 'updated_post_meta', 'carelib_delete_image_cache_by_meta', 10, 2 );

/**
 * Callback defined in includes/image.php
 *
 * @see carelib_delete_image_cache_by_meta
 */
add_action( 'added_post_meta', 'carelib_delete_image_cache_by_meta', 10, 2 );

/**
 * Callback defined in includes/language.php
 *
 * @see carelib_load_locale_functions
 */
add_action( 'after_setup_theme', 'carelib_load_locale_functions', 0 );

/**
 * Callback defined in includes/language.php
 *
 * @see carelib_load_textdomains
 */
add_action( 'after_setup_theme', 'carelib_load_textdomains', 5 );

/**
 * Callback defined in includes/support.php
 *
 * @see carelib_theme_support
 */
add_action( 'after_setup_theme', 'carelib_theme_support', 12 );

/**
 * Callback defined in includes/support.php
 *
 * @see carelib_post_type_support
 */
add_action( 'init', 'carelib_post_type_support', 15 );

/**
 * Callback defined in includes/meta.php
 *
 * @see carelib_register_layouts_meta
 */
add_action( 'init', 'carelib_register_layouts_meta', 15 );

/**
 * Callback defined in includes/layouts.php
 *
 * @see carelib_do_register_layouts
 */
add_action( 'init', 'carelib_do_register_layouts', 95 );

/**
 * Compatibility for when a theme doesn't register any sidebars.
 *
 * Callback defined in WordPress Core.
 *
 * @see carelib_register_sidebar
 */
add_action( 'widgets_init', '__return_false', 95 );

/**
 * Callback defined in includes/styles.php
 *
 * @see carelib_register_styles
 */
add_action( 'wp_enqueue_scripts', 'carelib_register_styles', 0 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see carelib_enqueue_scripts
 */
add_action( 'wp_enqueue_scripts', 'carelib_enqueue_scripts', 5 );

/**
 * Remove default WordPress emoji styles.
 *
 * Callback defined in WordPress Core.
 *
 * @see print_emoji_styles
 */
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Callback defined in includes/head.php
 *
 * @see carelib_meta_charset
 */
add_action( 'wp_head', 'carelib_meta_charset',  0 );

/**
 * Callback defined in includes/head.php
 *
 * @see carelib_meta_viewport
 */
add_action( 'wp_head', 'carelib_meta_viewport', 1 );

/**
 * Callback defined in includes/head.php
 *
 * @see carelib_link_pingback
 */
add_action( 'wp_head', 'carelib_link_pingback', 2 );

/**
 * Callback defined in includes/head.php
 *
 * @see carelib_meta_ios_phone_formatting
 */
add_action( 'wp_head', 'carelib_meta_ios_phone_formatting', 3 );

/**
 * Callback defined in includes/head.php
 *
 * @see carelib_canihas_js
 */
add_action( 'wp_head', 'carelib_canihas_js', 4 );
