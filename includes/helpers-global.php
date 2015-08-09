<?php
/**
 * Global template helper functions.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Load the base theme framework template.
 *
 * @since  1.0.0
 * @uses   CareLib_Template_Global::framework
 * @param  string $name The name of the specialized template.
 * @return void
 */
function alpha_framework( $name = null ) {
	carelib_class( 'template-global' )->framework( $name );
}

/**
 * Output the opening tag for a wrapping <div>.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_wrap_open() {
	echo '<div ' . alpha_get_attr( 'wrap' ) . '>';
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
 * Output a given menu template.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Menu::template
 * @return void
 */
function alpha_menu( $name = null ) {
	carelib_class( 'menu' )->template( $name );
}

/**
 * Return the name of a given WordPress menu location.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Menu::get_location_name
 * @param  string $location
 * @return string
 */
function alpha_get_menu_location_name( $location ) {
	return carelib_class( 'menu' )->get_location_name( $location );
}

/**
 * Display our breadcrumbs based on selections made in the WordPress customizer.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::display_breadcrumbs
 * @return bool true if both our template tag and theme mod return true.
 */
function alpha_display_breadcrumbs() {
	return carelib_class( 'template-global' )->display_breadcrumbs();
}

/**
 * Output a given sidebar template.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Sidebar::template
 * @return void
 */
function alpha_sidebar( $name = null ) {
	carelib_class( 'sidebar' )->template( $name );
}

/**
 * Return the name of a given dynamic sidebar.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Sidebar::get_name
 * @param  string $sidebar_id
 * @return string
 */
function alpha_get_sidebar_name( $id ) {
	return carelib_class( 'sidebar' )->get_name( $id );
}

/**
 * Return a formatted link to the customizer panel.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::get_customizer_link
 * @param  $args array options for how the link will be formatted
 * @return string an escaped link to the WordPress customizer panel.
 */
function alpha_get_customizer_link( $args = array() ) {
	return carelib_class( 'template-global' )->get_customizer_link( $args );
}
