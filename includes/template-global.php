<?php
/**
 * Global template helper functions.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\TemplateHelpers
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Load the base theme framework template.
 *
 * @since  0.1.0
 * @uses   CareLib_Template_Global::framework
 * @param  string $name The name of the specialized template.
 * @return void
 */
function alpha_framework( $name = null ) {
	carelib_framework( $name );
}

/**
 * Output the opening tag for a wrapping <div>.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_wrap_open() {
	echo '<div ' . alpha_get_attr( 'wrap' ) . '>';
}

/**
 * Close out the closing tag for a wrapping <div>.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_wrap_close() {
	echo '</div>';
}

/**
 * Output skip-to-content link markup for screen readers.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_skip_to_content() {
	echo '<div id="skip-to-content" class="skip-link">';
	echo apply_filters( 'alpha_skip_to_content',
		sprintf( '<a href="#content" class="button screen-reader-text">%s</a>',
			esc_html__( 'Skip to content (Press enter)', 'alpha' )
		)
	);
	echo '</div><!-- #skip-to-content -->';
}

/**
 * Load the site header template.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_header() {
	get_template_part( 'template-parts/site-header' );
}

/**
 * Output the opening markup for the site's branding elements.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_branding_open() {
	echo '<div ' . alpha_get_attr( 'branding' ) . '>';
}

/**
 * Display the linked site title wrapped in an `<h1>` or `<p>` tag.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Global::get_site_title
 * @return void
 */
function alpha_site_title() {
	echo carelib_get_site_title();
}

/**
 * Display the site description wrapped in a `<p>` tag.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Global::get_site_description
 * @return void
 */
function alpha_site_description() {
	echo carelib_get_site_description();
}

/**
 * Output the closing markup for the site's branding elements.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_branding_close() {
	echo '</div><!-- #branding -->';
}

/**
 * Output a given menu template.
 *
 * @since  0.1.0
 * @access public
 * @param  string $name The name of the menu to load.
 * @uses   CareLib_Menu::template
 * @return void
 */
function alpha_menu( $name = null ) {
	carelib_get_menu( $name );
}

/**
 * Return the name of a given WordPress menu location.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Menu::get_location_name
 * @param  string $location The WordPress menu location to check.
 * @return string
 */
function alpha_get_menu_location_name( $location ) {
	return carelib_get_menu_location_name( $location );
}

/**
 * Output the markup for the primary menu toggle button.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_menu_toggle() {
	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) {
		printf( '<button %s>%s</button>',
			alpha_get_attr( 'menu-toggle', 'primary' ),
			apply_filters( 'alpha_menu_toggle_text', '' )
		);
	}
}

/**
 * Load the site's primary menu template.
 *
 * @since  0.1.0
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
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_menu_fallback() {
	if ( ! has_nav_menu( 'primary' ) && current_user_can( 'edit_theme_options' ) ) {
		alpha_menu( 'fallback-primary' );
	}
}

/**
 * Load the site's secondary menu template.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_menu_secondary() {
	if ( has_nav_menu( 'secondary' ) ) {
		alpha_menu( 'secondary' );
	}
}

/**
 * Display our breadcrumbs based on selections made in the WordPress customizer.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Global::display_breadcrumbs
 * @return bool true if both our template tag and theme mod return true.
 */
function alpha_display_breadcrumbs() {
	return carelib_display_breadcrumbs();
}

/**
 * Load the breadcrumbs template.
 *
 * @since  0.1.0
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
 * Return a featured image using CareLib's advanced image grabber class.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Image_Grabber_API::get
 * @param  array $args a list of arguments to pass to the image grabber class.
 * @return mixed string or an array depending on what arguments are used
 */
function alpha_get_image( $args = array() ) {
	return carelib_get_image( $args );
}

/**
 * Display a featured image using CareLib's advanced image grabber class.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Image_Grabber_API::get
 * @param  array $args a list of arguments to pass to the image grabber class.
 * @return void
 */
function alpha_image( $args = array() ) {
	echo alpha_get_image( $args );
}

/**
 * Output a given sidebar template.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Sidebar::template
 * @param  string $name the name of the sidebar to load.
 * @return void
 */
function alpha_sidebar( $name = null ) {
	carelib_get_sidebar( $name );
}

/**
 * Return the name of a given dynamic sidebar.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Sidebar::get_name
 * @param  string $id The id of the sidebar to check.
 * @return string
 */
function alpha_get_sidebar_name( $id ) {
	return carelib_get_sidebar_name( $id );
}

/**
 * Load the primary sidebar on all multi-column layouts.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_primary_sidebar() {
	if ( alpha_layout_has_sidebar() ) {
		alpha_sidebar( 'primary' );
	}
}

/**
 * Return a formatted link to the customizer panel.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Global::get_customizer_link
 * @param  array $args options for how the link will be formatted.
 * @return string an escaped link to the WordPress customizer panel.
 */
function alpha_get_customizer_link( $args = array() ) {
	return carelib_get_customizer_link( $args );
}

/**
 * Load the site-wide footer widgets template.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_footer_widgets() {
	if ( is_active_sidebar( 'footer-widgets' ) ) {
		alpha_sidebar( 'footer-widgets' );
	}
}

/**
 * Load the site footer template.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_footer() {
	get_template_part( 'template-parts/site-footer' );
}

/**
 * Display the theme's footer credit links.
 *
 * @since  0.1.0
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
