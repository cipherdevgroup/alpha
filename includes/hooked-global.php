<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

add_action( 'tha_header_before', 'alpha_skip_link',       10 );
add_action( 'tha_header_top',    'alpha_branding',        10 );
add_action( 'tha_header_bottom', 'alpha_menu_primary',    10 );
add_action( 'tha_header_after',  'alpha_menu_secondary',  10 );
add_action( 'tha_content_top',   'alpha_breadcrumbs',     10 );
add_action( 'tha_content_after', 'alpha_primary_sidebar', 10 );
add_action( 'tha_footer_before', 'alpha_footer_widgets',  10 );
add_action( 'tha_footer_bottom', 'alpha_footer',          10 );

/**
 * Display a11y skip links.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_skip_link() {
	get_template_part( 'templates/hooked/site', 'skip-link' );
}

/**
 * Display the site's branding elements like a logo and title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_branding() {
	get_template_part( 'templates/hooked/site', 'branding' );
}

/**
 * Display the site's primary menu.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_menu_primary() {
	if ( has_nav_menu( 'primary' ) ) {
		alpha_menu( 'primary' );
	}
}

/**
 * Display the site's primary menu fallback for logged-in users who can edit
 * theme options.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_menu_primary_fallback() {
	if ( ! has_nav_menu( 'primary' ) && current_user_can( 'edit_theme_options' ) ) {
		alpha_menu( 'fallback-primary' );
	}
}

/**
 * Display the site's secondary menu.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_menu_secondary() {
	if ( has_nav_menu( 'secondary' ) ) {
		alpha_menu( 'secondary' );
	}
}

/**
 * Load the breadcrumbs template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_breadcrumbs() {
	if ( ! alpha_display_breadcrumbs() ) {
		return;
	}
	// Use Yoast breadcrumbs if they're available.
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb(
			'<nav class="breadcrumbs" itemprop="breadcrumb">',
			'</nav>'
		);
	}
}

/**
 * Load the primary sidebar on all multi-column layouts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_primary_sidebar() {
	if ( ! in_array( get_theme_mod( 'theme_layout' ), array( '1c', '1c-narrow' ) ) ) {
		alpha_sidebar( 'primary' );
	}
}

/**
 * Display the theme's footer credit links.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_footer() {
	printf( '<p class="credit">%s</p>', sprintf(
		// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link.
		__( 'Copyright &#169; %1$s %2$s. Designed by %3$s.', 'alpha' ),
		date_i18n( 'Y' ),
		carelib_class( 'template-global' )->get_site_link(),
		carelib_class( 'template-global' )->get_credit_link()
	) );
}

/**
 * Displays all registered footer widget areas using a template.
 *
 * @since  1.0.0
 * @access public
 * @return null
 */
function alpha_footer_widgets() {
	if ( is_active_sidebar( 'footer-widgets' ) ) {
		alpha_sidebar( 'footer-widgets' );
	}
}
