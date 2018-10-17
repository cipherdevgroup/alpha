<?php
/**
 * The default WordPress search form is lacking in terms of accessibility.
 * In order to bring it into compliance with WCAG we need to make a few changes.
 * This class adds some aria labels and a unique ID to each search form instance.
 * It also applies some filters which can be used to control the output of the
 * search form.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Get the search form elements and return them as a single string.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_search_form_get_form() {
	return sprintf( '<form class="search-form" method="get" action="%s" role="search">%s</form>',
		esc_url( home_url( '/' ) ),
		_carelib_search_form_get_input() . _carelib_search_form_get_button()
	);
}

/**
 * Get the search form label.
 *
 * @since  1.0.0
 * @access protected
 * @return string
 */
function _carelib_search_form_get_input() {
	$id = uniqid( 'searchform-' );

	$label = sprintf( '<label id="%1$s-label" for="%1$s" class="screen-reader-text">%2$s</label>',
		esc_attr( $id ),
		esc_attr( apply_filters( 'carelib_search_form_label', __( 'Search site', 'alpha' ) ) )
	);

	$input = sprintf( '<input type="search" name="s" id="%s" placeholder="%s" autocomplete="off" value="%s" />',
		esc_attr( $id ),
		esc_attr( apply_filters( 'carelib_search_text', __( 'Search this website', 'alpha' ) ) ),
		esc_attr( apply_filters( 'the_search_query', get_search_query() ? get_search_query(): '' ) )
	);

	return $label . $input;
}

/**
 * Get the search form button element.
 *
 * @since  1.0.0
 * @access protected
 * @return string
 */
function _carelib_search_form_get_button() {
	return sprintf( '<button type="submit" aria-label="%1$s">%2$s</button>',
		esc_attr( apply_filters( 'carelib_search_button_label', __( 'Search', 'alpha' ) ) ),
		apply_filters( 'carelib_search_button_text',
			sprintf( '<span class="screen-reader-text">%s</span>',
				esc_html__( 'Search', 'alpha' )
			)
		)
	);
}
