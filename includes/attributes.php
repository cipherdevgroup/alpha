<?php
/**
 * HTML attribute functions and filters.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\Attributes
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Output an HTML element's attributes.
 *
 * @since  0.1.0
 * @access public
 * @param  string $slug the slug/ID of the element (e.g., 'sidebar').
 * @param  string $context a specific context (e.g., 'primary').
 * @param  array  $attr A list of attributes to be merged.
 * @return void
 */
function alpha_attr( $slug, $context = '', $attr = array() ) {
	echo alpha_get_attr( $slug, $context, $attr );
}

/**
 * Return an HTML element's attributes.
 *
 * @since  0.1.0
 * @access public
 * @param  string $slug the slug/ID of the element (e.g., 'sidebar').
 * @param  string $context a specific context (e.g., 'primary').
 * @param  array  $attr A list of attributes to be merged.
 * @return string the attributes for a given element
 */
function alpha_get_attr( $slug, $context = '', $attr = array() ) {
	return carelib_get( 'attributes' )->get_attr( $slug, $context, $attr );
}
