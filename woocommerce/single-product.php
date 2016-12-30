<?php
/**
 * The Template for displaying all single products.
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

/**
 * Callback defined in carelib/includes/template-entry.php
 *
 * @see carelib_null_entry_containers
 */
add_action( 'carelib_content_while_before', 'carelib_null_entry_containers', 10 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_before_main_content
 */
add_action( 'carelib_content_before', 'carelib_wc_before_main_content', 8 );

/**
 * Callback defined in carelib/includes/woocommerce/template-hooks.php
 *
 * @see carelib_wc_after_main_content
 */
add_action( 'carelib_content_after', 'carelib_wc_after_main_content', 8 );

carelib_framework( 'shop' );
