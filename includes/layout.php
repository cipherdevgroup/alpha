<?php
/**
 * Functions for controlling layout options.
 *
 * @package    Alpha\Functions\Layout
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'alpha_register_layouts', 'alpha_register_layouts', 10 );
/**
 * Register our theme's custom layout options.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_layouts() {
	$layouts = array(
		'2c-r' => array(
			'label'            => _x( '2 Columns: Right Sidebar', 'theme layout', 'alpha' ),
			'is_global_layout' => true,
			'is_post_layout'   => true,
			'image'            => '%s/images/sidebar-right.svg',
		),
		'2c-l' => array(
			'label'            => _x( '2 Columns: Left Sidebar', 'theme layout', 'alpha' ),
			'is_global_layout' => true,
			'is_post_layout'   => true,
			'image'            => '%s/images/sidebar-left.svg',
		),
		'1c' => array(
			'label'            => _x( '1 Column Wide', 'theme layout', 'alpha' ),
			'is_global_layout' => true,
			'is_post_layout'   => true,
			'image'            => '%s/images/one-column.svg',
		),
		'1c-narrow' => array(
			'label'            => _x( '1 Column Narrow', 'theme layout', 'alpha' ),
			'is_global_layout' => true,
			'is_post_layout'   => true,
			'image'            => '%s/images/one-column-narrow.svg',
		),
	);

	foreach ( $layouts as $layout => $args ) {
		carelib_get( 'layouts' )->register_layout( $layout, $args );
	}
}

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
