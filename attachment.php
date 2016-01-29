<?php
/**
 * The template for displaying the attachment pages.
 *
 * @package    Alpha
 * @subpackage Alpha\CoreTemplates
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Callback defined in includes/template-layout.php
 *
 * @see alpha_force_full_narrow_layout
 */
add_filter( 'alpha_get_theme_layout', 'alpha_force_full_narrow_layout' );

/**
 * Callback defined in includes/template-attachment.php
 *
 * @see alpha_attachment_image
 */
add_action( 'tha_entry_top', 'alpha_attachment_image', 4 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_author
 */
remove_action( 'alpha_entry_header_meta', 'alpha_entry_author', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_comments_link
 */
remove_action( 'alpha_entry_header_meta', 'alpha_entry_comments_link', 22 );

/**
 * Callback defined in includes/template-attachment.php
 *
 * @see alpha_attachment_meta_open
 */
add_action( 'tha_entry_content_after', 'alpha_attachment_meta_open', 12 );

/**
 * Callback defined in includes/template-attachment.php
 *
 * @see alpha_attachment_image_gallery
 */
add_action( 'tha_entry_content_after', 'alpha_attachment_image_gallery', 14 );

/**
 * Callback defined in includes/template-attachment.php
 *
 * @see alpha_attachment_meta_close
 */
add_action( 'tha_entry_content_after', 'alpha_attachment_meta_close', 16 );

alpha_framework();
