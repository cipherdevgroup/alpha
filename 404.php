<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package    Alpha
 * @subpackage Alpha\CoreTemplates
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_open
 */
remove_action( 'tha_entry_top', 'alpha_entry_open', 0 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_entry_open
 */
add_action( 'tha_entry_top', 'alpha_404_entry_open', 0 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_title
 */
remove_action( 'alpha_entry_header', 'alpha_entry_title', 10 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_entry_title
 */
add_action( 'alpha_entry_header', 'alpha_404_entry_title', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_meta
 */
remove_action( 'alpha_entry_header', 'alpha_entry_header_meta', 12 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_content
 */
add_filter( 'the_content', 'alpha_404_content', 99 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer
 */
remove_action( 'tha_entry_content_after', 'alpha_entry_footer', 18 );

alpha_framework( '404' );
