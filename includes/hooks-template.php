<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package   Alpha\Functions\Hooks
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

defined( 'WPINC' ) || die;

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_skip_to_content
 */
add_action( 'carelib_body_top', 'alpha_skip_to_content', 5 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_header
 */
add_action( 'carelib_body_top', 'alpha_header', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_branding_open
 */
add_action( 'carelib_header_top', 'alpha_branding_open', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_site_title
 */
add_action( 'carelib_header_top', 'alpha_site_title', 14 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_site_description
 */
add_action( 'carelib_header_top', 'alpha_site_description', 16 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_branding_close
 */
add_action( 'carelib_header_top', 'alpha_branding_close', 20 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_toggle
 */
add_action( 'carelib_header_top', 'alpha_menu_toggle', 22 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_primary
 */
add_action( 'carelib_header_bottom', 'alpha_menu_primary', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_secondary
 */
add_action( 'carelib_header_after', 'alpha_menu_secondary', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_breadcrumbs
 */
add_action( 'carelib_content_top', 'alpha_breadcrumbs', 10 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header
 */
add_action( 'carelib_content_top', 'carelib_archive_header', 12 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header_open
 */
add_action( 'carelib_archive_header', 'alpha_archive_header_open', 5 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_title
 */
add_action( 'carelib_archive_header', 'alpha_archive_title', 15 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_breadcrumbs
 */
add_action( 'carelib_archive_header', 'alpha_breadcrumbs', 20 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_description
 */
add_action( 'carelib_archive_header', 'alpha_archive_description', 25 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header_close
 */
add_action( 'carelib_archive_header', 'alpha_archive_header_close', 100 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_open
 */
add_action( 'carelib_entry_top', 'alpha_entry_open', 0 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_sticky_banner
 */
add_action( 'carelib_entry_top', 'alpha_sticky_banner', 2 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_featured_image
 */
add_action( 'carelib_entry_top', 'alpha_featured_image', 4 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_open
 */
add_action( 'carelib_entry_top', 'carelib_entry_header', 8 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_open
 */
add_action( 'carelib_entry_header', 'alpha_entry_header_open', 8 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_title
 */
add_action( 'carelib_entry_header', 'alpha_entry_title', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_meta
 */
add_action( 'carelib_entry_header', 'carelib_entry_header_meta', 12 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_open
 */
add_action( 'carelib_entry_header_meta', 'alpha_entry_meta_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_author
 */
add_action( 'carelib_entry_header_meta', 'alpha_entry_author', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_published
 */
add_action( 'carelib_entry_header_meta', 'alpha_entry_published', 18 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_comments_link
 */
add_action( 'carelib_entry_header_meta', 'alpha_entry_comments_link', 22 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_close
 */
add_action( 'carelib_entry_header_meta', 'alpha_entry_meta_close', 26 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_close
 */
add_action( 'carelib_entry_header', 'alpha_entry_header_close', 16 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_content_open
 */
add_action( 'carelib_entry_content_before', 'alpha_entry_content_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_content
 */
add_action( 'carelib_entry_content', 'alpha_content', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_link_pages
 */
add_action( 'carelib_entry_content_after', 'alpha_link_pages', 5 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_content_close
 */
add_action( 'carelib_entry_content_after', 'alpha_entry_content_close', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer
 */
add_action( 'carelib_entry_bottom', 'carelib_entry_footer', 20 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_open
 */
add_action( 'carelib_entry_footer', 'alpha_entry_footer_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_meta
 */
add_action( 'carelib_entry_footer', 'carelib_entry_footer_meta', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_tags
 */
add_action( 'carelib_entry_footer_meta', 'alpha_entry_meta_tags', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_categories
 */
add_action( 'carelib_entry_footer_meta', 'alpha_entry_meta_categories', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_close
 */
add_action( 'carelib_entry_footer', 'alpha_entry_footer_close', 22 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_close
 */
add_action( 'carelib_entry_bottom', 'alpha_entry_close', 99 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_post_navigation
 */
add_action( 'carelib_entry_after', 'alpha_post_navigation', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_comments
 */
add_action( 'carelib_entry_after', 'carelib_comments_load_template', 14 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_posts_navigation
 */
add_action( 'carelib_content_while_after', 'alpha_posts_navigation', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_primary_sidebar
 */
add_action( 'carelib_content_after', 'alpha_primary_sidebar', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer_widgets
 */
add_action( 'carelib_footer_before', 'alpha_footer_widgets', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer
 */
add_action( 'carelib_body_bottom', 'alpha_footer', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer_content
 */
add_action( 'carelib_footer_bottom', 'alpha_footer_content', 10 );
