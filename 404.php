<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package   Alpha\CoreTemplates
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_open
 */
remove_action( 'carelib_entry_top', 'alpha_entry_open', 0 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_entry_open
 */
add_action( 'carelib_entry_top', 'alpha_404_entry_open', 0 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_title
 */
remove_action( 'carelib_entry_header', 'alpha_entry_title', 10 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_entry_title
 */
add_action( 'carelib_entry_header', 'alpha_404_entry_title', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_meta
 */
remove_action( 'carelib_entry_header', 'carelib_entry_header_meta', 12 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see carelib_get_404_content
 */
add_filter( 'the_content', 'carelib_get_404_content', 99 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer
 */
remove_action( 'carelib_entry_content_after', 'carelib_entry_footer', 18 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_close
 */
remove_action( 'carelib_entry_bottom', 'alpha_entry_close', 99 );

/**
 * Callback defined in includes/template-404.php
 *
 * @see alpha_404_entry_close
 */
add_action( 'carelib_entry_bottom', 'alpha_404_entry_close', 99 );

carelib_framework( '404' );
