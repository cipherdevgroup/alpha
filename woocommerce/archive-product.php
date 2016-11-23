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
remove_action( 'alpha_archive_header', 'alpha_archive_title', 15 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_description
 */
remove_action( 'alpha_archive_header', 'alpha_archive_description', 25 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_null_entry_containers
 */
add_action( 'tha_content_while_before', 'alpha_null_entry_containers', 5 );

add_action( 'tha_content_while_before', 'alpha_product_loop_start', 8 );
add_action( 'tha_content_while_before', 'woocommerce_product_subcategories', 10 );
add_action( 'tha_content_before',       'alpha_wc_before_main_content', 8 );

add_action( 'alpha_archive_header',  'alpha_wc_page_title',                  15 );

add_action( 'alpha_archive_header',  'alpha_wc_archive_description',         30 );

add_action( 'tha_content_after',        'alpha_wc_after_main_content',           8 );

add_action( 'tha_content_while_after',  'alpha_product_loop_end',  10 );

alpha_framework( 'shop' );
