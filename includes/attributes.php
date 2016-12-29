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
