<?php
/**
 * General Theme-Specific Functions.
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
		carelib_class( 'layouts' )->register_layout( $layout, $args );
	}
}

/**
 * Return the narrow full width content slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the full width content layout.
 */
function alpha_return_full_width_narrow_layout() {
	return '1c-narrow';
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
 * Return the 2 column sidebar / content layout slug.
 *
 * @since  1.0.0
 * @access public
 * @return string the slug of the left sidebar layout.
 */
function alpha_return_left_sidebar_layout() {
	return '2c-l';
}
