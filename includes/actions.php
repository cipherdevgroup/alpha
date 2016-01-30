<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\Hooks
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_content_width
 */
add_action( 'after_setup_theme', 'alpha_content_width', 0 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_setup
 */
add_action( 'after_setup_theme', 'alpha_setup', 10 );

/**
 * Callback defined in includes/plugins.php
 *
 * @see alpha_jetpack_setup
 */
add_action( 'after_setup_theme', 'alpha_jetpack_setup', 12 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_image_sizes
 */
add_action( 'init', 'alpha_register_image_sizes', 5 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_nav_menus
 */
add_action( 'init', 'alpha_register_nav_menus', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_add_editor_styles
 */
add_action( 'init', 'alpha_add_editor_styles', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_layouts
 */
add_action( 'alpha_register_layouts', 'alpha_register_layouts', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_register_sidebars
 */
add_action( 'widgets_init', 'alpha_register_sidebars', 5 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_enqueue_styles
 */
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_styles',  10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_enqueue_scripts
 */
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_scripts', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see alpha_rtl_add_data
 */
add_action( 'wp_enqueue_scripts', 'alpha_rtl_add_data', 12 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_skip_to_content
 */
add_action( 'tha_body_top', 'alpha_skip_to_content', 5 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_header
 */
add_action( 'tha_body_top', 'alpha_header', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_branding_open
 */
add_action( 'tha_header_top', 'alpha_branding_open', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_site_title
 */
add_action( 'tha_header_top', 'alpha_site_title', 14 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_site_description
 */
add_action( 'tha_header_top', 'alpha_site_description', 16 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_branding_close
 */
add_action( 'tha_header_top', 'alpha_branding_close', 20 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_toggle
 */
add_action( 'tha_header_top', 'alpha_menu_toggle', 22 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_primary
 */
add_action( 'tha_header_bottom', 'alpha_menu_primary', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_fallback
 */
add_action( 'tha_header_bottom', 'alpha_menu_fallback', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_menu_secondary
 */
add_action( 'tha_header_after', 'alpha_menu_secondary', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_breadcrumbs
 */
add_action( 'tha_content_top', 'alpha_breadcrumbs', 10 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header
 */
add_action( 'tha_content_top', 'alpha_archive_header', 12 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header_open
 */
add_action( 'alpha_archive_header', 'alpha_archive_header_open', 5 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_wrap_open
 */
add_action( 'alpha_archive_header', 'alpha_wrap_open', 10 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_title
 */
add_action( 'alpha_archive_header', 'alpha_archive_title', 15 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_breadcrumbs
 */
add_action( 'alpha_archive_header', 'alpha_breadcrumbs', 20 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_sub_terms
 */
add_action( 'alpha_archive_header', 'alpha_archive_sub_terms', 25 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_description
 */
add_action( 'alpha_archive_header', 'alpha_archive_description', 30 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_wrap_close
 */
add_action( 'alpha_archive_header', 'alpha_wrap_close', 95 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_archive_header_close
 */
add_action( 'alpha_archive_header', 'alpha_archive_header_close', 100 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_open
 */
add_action( 'tha_entry_top', 'alpha_entry_open', 0 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_sticky_banner
 */
add_action( 'tha_entry_top', 'alpha_sticky_banner', 2 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_post_image
 */
add_action( 'tha_entry_top', 'alpha_post_image', 4 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_open
 */
add_action( 'tha_entry_top', 'alpha_entry_header', 8 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_open
 */
add_action( 'alpha_entry_header', 'alpha_entry_header_open', 8 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_title
 */
add_action( 'alpha_entry_header', 'alpha_entry_title', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_meta
 */
add_action( 'alpha_entry_header', 'alpha_entry_header_meta', 12 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_open
 */
add_action( 'alpha_entry_header_meta', 'alpha_entry_meta_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_author
 */
add_action( 'alpha_entry_header_meta', 'alpha_entry_author', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_published
 */
add_action( 'alpha_entry_header_meta', 'alpha_entry_published', 18 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_comments_link
 */
add_action( 'alpha_entry_header_meta', 'alpha_entry_comments_link', 22 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_close
 */
add_action( 'alpha_entry_header_meta', 'alpha_entry_meta_close', 26 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_header_close
 */
add_action( 'alpha_entry_header', 'alpha_entry_header_close', 16 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_content_open
 */
add_action( 'tha_entry_content_before', 'alpha_entry_content_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_link_pages
 */
add_action( 'tha_entry_content_after', 'alpha_link_pages', 5 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_content_close
 */
add_action( 'tha_entry_content_after', 'alpha_entry_content_close', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer
 */
add_action( 'tha_entry_content_after', 'alpha_entry_footer', 18 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_open
 */
add_action( 'alpha_entry_footer', 'alpha_entry_footer_open', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_meta
 */
add_action( 'alpha_entry_footer', 'alpha_entry_footer_meta', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_tags
 */
add_action( 'alpha_entry_footer_meta', 'alpha_entry_meta_tags', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_meta_categories
 */
add_action( 'alpha_entry_footer_meta', 'alpha_entry_meta_categories', 14 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_footer_close
 */
add_action( 'alpha_entry_footer', 'alpha_entry_footer_close', 22 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_entry_close
 */
add_action( 'tha_entry_bottom', 'alpha_entry_close', 99 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_post_navigation
 */
add_action( 'tha_entry_after', 'alpha_post_navigation', 10 );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see alpha_comments
 */
add_action( 'tha_entry_after', 'alpha_comments', 14 );

/**
 * Callback defined in includes/template-archive.php
 *
 * @see alpha_posts_navigation
 */
add_action( 'tha_content_while_after', 'alpha_posts_navigation', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_primary_sidebar
 */
add_action( 'tha_content_after', 'alpha_primary_sidebar', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer_widgets
 */
add_action( 'tha_footer_before', 'alpha_footer_widgets', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer
 */
add_action( 'tha_body_bottom', 'alpha_footer', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see alpha_footer_content
 */
add_action( 'tha_footer_bottom', 'alpha_footer_content', 10 );
