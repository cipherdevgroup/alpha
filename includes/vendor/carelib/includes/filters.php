<?php
/**
 * All the default filters within the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in WordPress core.
 *
 * Don't strip tags on single post titles
 *
 * @see strip_tags
 */
remove_filter( 'single_post_title', 'strip_tags' );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see carelib_untitled_post
 */
add_filter( 'the_title', 'carelib_untitled_post' );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see carelib_archive_title
 */
add_filter( 'get_the_archive_title', 'carelib_archive_title', 5 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see carelib_archive_description
 */
add_filter( 'get_the_archive_description', 'carelib_archive_description', 5 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see carelib_add_the_content_filters
 */
carelib_add_the_content_filters( 'carelib_archive_description' );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see carelib_excerpt_more
 */
add_filter( 'excerpt_more', 'carelib_excerpt_more', 5 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see carelib_excerpt_more
 */
add_filter( 'the_content_more_link', 'carelib_excerpt_more', 5 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see carelib_link_pages_args
 */
add_filter( 'wp_link_pages_args', 'carelib_link_pages_args', 5 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see carelib_link_pages_link
 */
add_filter( 'wp_link_pages_link', 'carelib_link_pages_link', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_head
 */
add_filter( 'carelib_attr_head', 'carelib_attr_head', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_body
 */
add_filter( 'carelib_attr_body', 'carelib_attr_body', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_container
 */
add_filter( 'carelib_attr_site-container', 'carelib_attr_site_container', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_inner
 */
add_filter( 'carelib_attr_site-inner', 'carelib_attr_site_inner', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_footer
 */
add_filter( 'carelib_attr_site-footer', 'carelib_attr_site_footer', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_content
 */
add_filter( 'carelib_attr_content', 'carelib_attr_content', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_skip_link
 */
add_filter( 'carelib_attr_skip-link', 'carelib_attr_skip_link', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_sidebar
 */
add_filter( 'carelib_attr_sidebar', 'carelib_attr_sidebar', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_menu_toggle
 */
add_filter( 'carelib_attr_menu-toggle', 'carelib_attr_menu_toggle', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_menu
 */
add_filter( 'carelib_attr_menu', 'carelib_attr_menu', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_nav
 */
add_filter( 'carelib_attr_nav', 'carelib_attr_nav', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_footer_widgets
 */
add_filter( 'carelib_attr_footer-widgets', 'carelib_attr_footer_widgets', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_header
 */
add_filter( 'carelib_attr_site-header', 'carelib_attr_site_header', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_branding
 */
add_filter( 'carelib_attr_site-branding', 'carelib_attr_site_branding', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_title
 */
add_filter( 'carelib_attr_site-title', 'carelib_attr_site_title', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_site_description
 */
add_filter( 'carelib_attr_site-description', 'carelib_attr_site_description', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_post
 */
add_filter( 'carelib_attr_post', 'carelib_attr_post', 5, 2 );

/**
 * Alternate for "post"
 *
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_post
 */
add_filter( 'carelib_attr_entry', 'carelib_attr_post', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_entry_published
 */
add_filter( 'carelib_attr_entry-published', 'carelib_attr_entry_published', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_entry_summary
 */
add_filter( 'carelib_attr_entry-summary', 'carelib_attr_entry_summary', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_comment
 */
add_filter( 'carelib_attr_comment', 'carelib_attr_comment', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_comment_published
 */
add_filter( 'carelib_attr_comment-published', 'carelib_attr_comment_published', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see carelib_attr_comment_permalink
 */
add_filter( 'carelib_attr_comment-permalink', 'carelib_attr_comment_permalink', 5 );

/**
 * Callback defined in includes/template-load.php
 *
 * @see carelib_index_include
 */
add_filter( 'template_include', 'carelib_index_include', 95 );

/**
 * Callback defined in includes/template-load.php
 *
 * Doesn't work b/c bug with get_query_template().
 *
 * @see carelib_front_page_template
 */
add_filter( 'front_page_template', 'carelib_front_page_template', 5 );

/**
 * Callback defined in includes/template-load.php
 *
 * @see carelib_front_page_template
 */
add_filter( 'frontpage_template', 'carelib_front_page_template', 5 );

/**
 * Callback defined in includes/template-comments.php
 *
 * @see carelib_comments_template
 */
add_filter( 'comments_template', 'carelib_comments_template', 5 );

/**
 * Callback defined in includes/context.php
 *
 * @see carelib_body_class_filter
 */
add_filter( 'body_class', 'carelib_body_class_filter', 0 );

/**
 * Callback defined in includes/context.php
 *
 * @see carelib_post_class_filter
 */
add_filter( 'post_class', 'carelib_post_class_filter', 0, 3 );

/**
 * Callback defined in includes/context.php
 *
 * @see carelib_comment_class_filter
 */
add_filter( 'comment_class', 'carelib_comment_class_filter', 0, 3 );

/**
 * Callback defined in includes/styles.php
 *
 * @see carelib_min_stylesheet_uri
 */
add_filter( 'stylesheet_uri', 'carelib_min_stylesheet_uri', 5, 2 );

/**
 * Callback defined in includes/styles.php
 *
 * @see carelib_locale_stylesheet_uri
 */
add_filter( 'locale_stylesheet_uri', 'carelib_locale_stylesheet_uri', 5 );

/**
 * Callback defined in includes/search-form.php
 *
 * @see carelib_search_form_get_form
 */
add_filter( 'get_search_form', 'carelib_search_form_get_form', 99 );

/**
 * Callback defined in includes/layouts.php
 *
 * @see carelib_filter_layout
 */
add_filter( 'carelib_get_theme_layout', 'carelib_filter_layout', 5 );
