<?php
/**
 * The template for displaying the attachment pages.
 *
 * @package   Alpha\CoreTemplates
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Callback defined in includes/template-layout.php
 *
 * @see alpha_force_full_narrow_layout
 */
add_filter( 'carelib_get_theme_layout', 'alpha_force_full_narrow_layout' );

/**
 * Callback defined in includes/template-attachment.php
 *
 * @see carelib_attachment_image
 */
add_action( 'carelib_entry_top', 'carelib_attachment_image', 4 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_author
 */
remove_action( 'carelib_entry_header_meta', 'alpha_entry_author', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_comments_link
 */
remove_action( 'carelib_entry_header_meta', 'alpha_entry_comments_link', 22 );

carelib_framework();
