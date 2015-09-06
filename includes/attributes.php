<?php
/**
 * HTML attribute functions and filters.
 *
 * @package    Alpha\Fucntions\Attributes
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Output an HTML element's attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  string $slug the slug/ID of the element (e.g., 'sidebar').
 * @param  string $context a specific context (e.g., 'primary').
 * @return void
 */
function alpha_attr( $slug, $context = '' ) {
	echo alpha_get_attr( $slug, $context );
}

/**
 * Return an HTML element's attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  string $slug the slug/ID of the element (e.g., 'sidebar').
 * @param  string $context a specific context (e.g., 'primary').
 * @return string the attributes for a given element
 */
function alpha_get_attr( $slug, $context = '' ) {
	return carelib_get( 'attributes' )->get_attr( $slug, $context );
}
