<?php
/**
 * The template for displaying product archives, including the main shop page
 * which is a post type archive.
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_title
 */
remove_action( 'carelib_archive_header', 'alpha_archive_title', 15 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_description
 */
remove_action( 'carelib_archive_header', 'alpha_archive_description', 25 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see carelib_null_entry_containers
 */
add_action( 'carelib_content_while_before', 'carelib_null_entry_containers', 5 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_before_shop_loop
 */
add_action( 'carelib_content_while_before', 'carelib_wc_before_shop_loop', 6 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see carelib_wc_product_loop_start
 */
add_action( 'carelib_content_while_before', 'carelib_wc_product_loop_start', 8 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see woocommerce_product_subcategories
 */
add_action( 'carelib_content_while_before', 'woocommerce_product_subcategories', 10 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_before_main_content
 */
add_action( 'carelib_content_before', 'carelib_wc_before_main_content', 8 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see carelib_wc_page_title
 */
add_action( 'carelib_archive_header', 'carelib_wc_page_title', 15 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_archive_description
 */
add_action( 'carelib_archive_header', 'carelib_wc_archive_description', 30 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_after_main_content
 */
add_action( 'carelib_content_after', 'carelib_wc_after_main_content', 8 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see carelib_wc_product_loop_end
 */
add_action( 'carelib_content_while_after', 'carelib_wc_product_loop_end', 10 );

/**
 * Callback defined in carelib/includes/woocommerce/template-global.php
 *
 * @see carelib_wc_after_shop_loop
 */
add_action( 'carelib_content_while_after', 'carelib_wc_after_shop_loop', 12 );

carelib_framework( 'shop' );
