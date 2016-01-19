<?php
/**
 * Functions for controlling layout options.
 *
 * @package    Alpha\Functions\Layout
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the full width content slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the full width content layout.
 */
function alpha_return_full_width_layout() {
	return '1c';
}

/**
 * Force the full width layout and return the slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the full content layout.
 */
function alpha_force_full_width_layout() {
	add_filter( 'alpha_allow_layout_control', '__return_false' );
	return alpha_return_full_width_layout();
}

/**
 * Return the narrow narrow full width content slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the narrow full width content layout.
 */
function alpha_return_full_narrow_layout() {
	return '1c-narrow';
}

/**
 * Force the narrow full width layout and return the slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the narrow full content layout.
 */
function alpha_force_full_narrow_layout() {
	add_filter( 'alpha_allow_layout_control', '__return_false' );
	return alpha_return_full_narrow_layout();
}

/**
 * Return the 2 column content / sidebar layout slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the right sidebar layout.
 */
function alpha_return_right_sidebar_layout() {
	return '2c-r';
}

/**
 * Force the 2 column content / sidebar layout slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the right sidebar layout.
 */
function alpha_force_right_sidebar_layout() {
	add_filter( 'alpha_allow_layout_control', '__return_false' );
	return alpha_return_right_sidebar_layout();
}

/**
 * Return the 2 column sidebar / content layout slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the left sidebar layout.
 */
function alpha_return_left_sidebar_layout() {
	return '2c-l';
}

/**
 * Force the 2 column content / sidebar layout slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the right sidebar layout.
 */
function alpha_force_left_sidebar_layout() {
	add_filter( 'alpha_allow_layout_control', '__return_false' );
	return alpha_return_left_sidebar_layout();
}

/**
 * Check whether the current layout includes a sidebar.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Layouts::get_theme_layout
 * @return bool true if the current layout includes a sidebar
 */
function alpha_layout_has_sidebar() {
	return ! in_array(
		carelib_get( 'layouts' )->get_theme_layout(),
		array( '1c', '1c-narrow' ),
		true
	);
}
