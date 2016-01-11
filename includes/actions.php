<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'alpha_content_width', 0 );
add_action( 'after_setup_theme', 'alpha_setup', 10 );
add_action( 'after_setup_theme', 'alpha_jetpack_setup', 12 );
add_action( 'init', 'alpha_register_image_sizes', 5 );
add_action( 'init', 'alpha_register_nav_menus',  10 );
add_action( 'init', 'alpha_add_editor_styles',   10 );
add_action( 'alpha_register_layouts', 'alpha_register_layouts', 10 );
add_action( 'widgets_init', 'alpha_register_sidebars', 5 );
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_styles',  10 );
add_action( 'wp_enqueue_scripts', 'alpha_enqueue_scripts', 10 );
add_action( 'wp_enqueue_scripts', 'alpha_rtl_add_data',    12 );
add_action( 'tha_head_bottom',  'alpha_force_attachment_layout',  10 );
add_action( 'tha_body_top',      'alpha_skip_to_content',   5 );
add_action( 'tha_body_top',      'alpha_header',           10 );
add_action( 'tha_header_top',    'alpha_branding_open',    10 );
add_action( 'tha_header_top',    'alpha_logo',             12 );
add_action( 'tha_header_top',    'alpha_site_title',       14 );
add_action( 'tha_header_top',    'alpha_site_description', 16 );
add_action( 'tha_header_top',    'alpha_branding_close',   20 );
add_action( 'tha_header_top',    'alpha_menu_toggle',      22 );
add_action( 'tha_header_bottom', 'alpha_menu_primary',     10 );
add_action( 'tha_header_bottom', 'alpha_menu_fallback',    10 );
add_action( 'tha_header_after',  'alpha_menu_secondary',   10 );
add_action( 'tha_content_top',   'alpha_breadcrumbs',      10 );
add_action( 'tha_content_top',         'alpha_archive_header',        12 );
add_action( 'alpha_archive_header',    'alpha_archive_header_open',    5 );
add_action( 'alpha_archive_header',    'alpha_wrap_open',             10 );
add_action( 'alpha_archive_header',    'alpha_archive_title',         15 );
add_action( 'alpha_archive_header',    'alpha_breadcrumbs',           20 );
add_action( 'alpha_archive_header',    'alpha_archive_sub_terms',     25 );
add_action( 'alpha_archive_header',    'alpha_archive_description',   30 );
add_action( 'alpha_archive_header',    'alpha_wrap_close',            95 );
add_action( 'alpha_archive_header',    'alpha_archive_header_close', 100 );
add_action( 'tha_entry_top',            'alpha_entry_open',           0 );
add_action( 'tha_entry_top',            'alpha_sticky_banner',        2 );
add_action( 'tha_entry_top',            'alpha_post_image',           4 );
add_action( 'tha_entry_top',            'alpha_entry_header_open',    8 );
add_action( 'tha_entry_top',            'alpha_entry_title',         10 );
add_action( 'tha_entry_before', 'alpha_attachment_entry_content', 10 );
add_action( 'tha_entry_before',         'alpha_entry_meta',          12 );
add_action( 'tha_entry_top',            'alpha_entry_header_close',  30 );
add_action( 'tha_entry_content_before', 'alpha_entry_content_open',  10 );
add_action( 'tha_entry_content_after',  'alpha_link_pages',           5 );
add_action( 'tha_entry_content_after',  'alpha_entry_content_close', 10 );
add_action( 'tha_entry_content_after',  'alpha_entry_footer',        10 );
add_action( 'tha_entry_bottom',         'alpha_entry_close',         99 );
add_action( 'tha_entry_after',          'alpha_post_navigation',     10 );
add_action( 'tha_entry_after',          'alpha_comments',            14 );
add_action( 'tha_content_while_after', 'alpha_posts_navigation',      10 );
add_action( 'tha_content_after', 'alpha_primary_sidebar',  10 );
add_action( 'tha_footer_before', 'alpha_footer_widgets',   10 );
add_action( 'tha_body_bottom',   'alpha_footer',           10 );
add_action( 'tha_footer_bottom', 'alpha_footer_content',   10 );
