<?php
/**
 * Methods for handling admin JavaScript and CSS in the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/admin/scripts.php
 *
 * @see carelib_admin_register_scripts
 */
add_action( 'admin_enqueue_scripts',  'carelib_admin_register_scripts', 0 );

/**
 * Callback defined in includes/admin/styles.php
 *
 * @see carelib_admin_register_styles
 */
add_action( 'admin_enqueue_scripts', 'carelib_admin_register_styles', 0 );

/**
 * Callback defined in includes/admin/metabox-post-layouts.php
 *
 * @see carelib_metabox_post_layouts_actions
 */
add_action( 'load-post.php', 'carelib_metabox_post_layouts_actions' );

/**
 * Callback defined in includes/admin/metabox-post-layouts.php
 *
 * @see carelib_metabox_post_layouts_actions
 */
add_action( 'load-post-new.php', 'carelib_metabox_post_layouts_actions' );

/**
 * Callback defined in includes/admin/metabox-post-layouts.php
 *
 * @see carelib_maybe_disable_post_layout_metabox
 */
add_action( 'add_meta_boxes','carelib_maybe_disable_post_layout_metabox', 5, 2 );
