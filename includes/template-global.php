<?php
/**
 * Global template helper functions.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */

/**
 * Output the opening tag for a wrapping <div>.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wrap_open() {
	echo '<div ' . carelib_get_attr( 'wrap' ) . '>';
}

/**
 * Close out the closing tag for a wrapping <div>.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wrap_close() {
	echo '</div>';
}

/**
 * Output skip-to-content link markup for screen readers.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_skip_to_content() {
	echo carelib_get_skip_link( 'content' );
}

/**
 * Load the site header template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_header() {
	get_template_part( 'template-parts/site-header' );
}

/**
 * Output the opening markup for the site's branding elements.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_branding_open() {
	echo '<div ' . carelib_get_attr( 'site-branding' ) . '>';
}

/**
 * Display the linked site title wrapped in an `<h1>` or `<p>` tag.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_site_title
 * @return void
 */
function alpha_site_title() {
	carelib_site_title();
}

/**
 * Display the site description wrapped in a `<p>` tag.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_site_description
 * @return void
 */
function alpha_site_description() {
	carelib_site_description();
}

/**
 * Output the closing markup for the site's branding elements.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_branding_close() {
	echo '</div><!-- #site-branding -->';
}

/**
 * Output the markup for the primary menu toggle button.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_menu_toggle() {
	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) {
		printf( '<button %s>%s</button>',
			carelib_get_attr( 'menu-toggle', 'primary' ),
			apply_filters( 'alpha_menu_toggle_text', '' )
		);
	}
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
		carelib_get_menu( 'primary' );
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
		carelib_get_menu( 'secondary' );
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
	if ( ! carelib_display_breadcrumbs() ) {
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
	if ( alpha_layout_has_sidebar() ) {
		carelib_get_sidebar();
	}
}

/**
 * Load the site-wide footer widgets template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_footer_widgets() {
	if ( is_active_sidebar( 'footer-widgets' ) ) {
		carelib_get_sidebar( 'footer-widgets' );
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
	get_template_part( 'template-parts/site-footer' );
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
		carelib_get_site_link(),
		carelib_get_credit_link()
	) );
}
