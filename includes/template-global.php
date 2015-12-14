<?php
/**
 * Global template helper functions.
 *
 * @package    Alpha\Functions\TemplateHelpers
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

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
	carelib_get( 'template-global' )->framework( $name );
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
 * Output a given menu template.
 *
 * @since  1.0.0
 * @access public
 * @param  string $name The name of the menu to load.
 * @uses   CareLib_Menu::template
 * @return void
 */
function alpha_menu( $name = null ) {
	carelib_get( 'menu' )->template( $name );
}

/**
 * Return the name of a given WordPress menu location.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Menu::get_location_name
 * @param  string $location The WordPress menu location to check.
 * @return string
 */
function alpha_get_menu_location_name( $location ) {
	return carelib_get( 'menu' )->get_location_name( $location );
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
	return carelib_get( 'template-global' )->display_breadcrumbs();
}

/**
 * Return a featured image using CareLib's advanced image grabber class.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Image_Grabber_API::get
 * @param  array $args a list of arguments to pass to the image grabber class.
 * @return mixed string or an array depending on what arguments are used
 */
function alpha_get_image( $args = array() ) {
	return carelib_get( 'image-grabber-api' )->get( $args );
}

/**
 * Display a featured image using CareLib's advanced image grabber class.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Image_Grabber_API::get
 * @param  array $args a list of arguments to pass to the image grabber class.
 * @return void
 */
function alpha_image( $args = array() ) {
	echo carelib_get( 'image-grabber-api' )->get( $args );
}

/**
 * Output a given sidebar template.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Sidebar::template
 * @param  string $name the name of the sidebar to load.
 * @return void
 */
function alpha_sidebar( $name = null ) {
	carelib_get( 'sidebar' )->template( $name );
}

/**
 * Return the name of a given dynamic sidebar.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Sidebar::get_name
 * @param  string $id The id of the sidebar to check.
 * @return string
 */
function alpha_get_sidebar_name( $id ) {
	return carelib_get( 'sidebar' )->get_name( $id );
}

/**
 * Return a formatted link to the customizer panel.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Global::get_customizer_link
 * @param  array $args options for how the link will be formatted.
 * @return string an escaped link to the WordPress customizer panel.
 */
function alpha_get_customizer_link( $args = array() ) {
	return carelib_get( 'template-global' )->get_customizer_link( $args );
}
