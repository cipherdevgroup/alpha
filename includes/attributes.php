<?php
/**
 * HTML attribute functions and filters.
 *
 * @package   Alpha\Functions\Attributes
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
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
	echo carelib_get_attr( $slug, $context, $attr );
}

/**
 * Modify the site inner attributes to allow for full-width pages..
 *
 * @since  0.1.0
 * @access public
 * @param  array $attr The current attributes.
 * @return array
 */
function alpha_attr_full_width_inner( $attr ) {
	$attr['class'] = 'full-width-inner';

	return $attr;
}
