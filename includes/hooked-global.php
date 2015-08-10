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

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'tha_body_top',      'alpha_header',           10 );
add_action( 'tha_header_top',    'alpha_branding_open',    10 );
add_action( 'tha_header_top',    'alpha_logo',             12 );
add_action( 'tha_header_top',    'alpha_site_title',       14 );
add_action( 'tha_header_top',    'alpha_site_description', 16 );
add_action( 'tha_header_top',    'alpha_branding_close',   20 );
add_action( 'tha_header_bottom', 'alpha_menu_primary',     10 );
add_action( 'tha_header_after',  'alpha_menu_secondary',   10 );
add_action( 'tha_content_top',   'alpha_breadcrumbs',      10 );
add_action( 'tha_content_after', 'alpha_primary_sidebar',  10 );
add_action( 'tha_footer_before', 'alpha_footer_widgets',   10 );
add_action( 'tha_body_bottom',   'alpha_footer',           10 );
add_action( 'tha_footer_bottom', 'alpha_footer_content',   10 );

/**
 * Load the site header template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_header() {
	get_template_part( 'templates/hooked/site', 'header' );
}

/**
 * Output the opening markup for the site's branding elements.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_branding_open() {
	printf( '<div %s>', alpha_get_attr( 'branding' ) );
}

/**
 * Display the linked site title wrapped in an `<h1>` or `<p>` tag.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::get_site_title
 * @return void
 */
function alpha_site_title() {
	echo carelib_class( 'template-global' )->get_site_title();
}

/**
 * Display the site description wrapped in a `<p>` tag.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::get_site_description
 * @return void
 */
function alpha_site_description() {
	echo carelib_class( 'template-global' )->get_site_description();
}

/**
 * Output an <img> tag of the site logo.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::the_logo
 * @return void
 */
function alpha_logo() {
	carelib_class( 'template-global' )->the_logo();
}

/**
 * Output the closing markup for the site's branding elements.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_branding_close() {
	echo '</div><!-- #branding -->';
}

/**
 * Load the site's primary menu template.
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
 * Load the site's secondary menu template.
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
 * Load the site-wide footer widgets template.
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

/**
 * Load the site footer template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_footer() {
	get_template_part( 'templates/hooked/site', 'footer' );
}

/**
 * Display the theme's footer credit links.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_footer_content() {
	printf( '<p class="credit">%s</p>', sprintf(
		// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link.
		__( 'Copyright &#169; %1$s %2$s. Designed by %3$s.', 'alpha' ),
		date_i18n( 'Y' ),
		carelib_class( 'template-global' )->get_site_link(),
		carelib_class( 'template-global' )->get_credit_link()
	) );
}
