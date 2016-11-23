<?php
/**
 * The Template for displaying all single products.
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_null_entry_containers
 */
add_action( 'tha_content_while_before', 'alpha_null_entry_containers', 10 );

add_action( 'tha_content_before', 'alpha_wc_before_main_content', 8 );

add_action( 'tha_content_after',  'alpha_wc_after_main_content', 8 );

alpha_framework( 'shop' );
