<?php
/**
 * Getters for the parent and child theme objects which will only spin up a new
 * instance of WP_Theme a single time.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

/**
 * Return a single instance of the current theme's WP_Theme object.
 *
 * @since  1.0.0
 * @access public
 * @return WP_Theme A single instance of the WP_Theme object.
 */
function carelib_get_theme() {
	static $theme;

	if ( null === $theme ) {
		$theme = wp_get_theme();
	}

	return $theme;
}

/**
 * Return a single instance of the parent theme's WP_Theme object.
 *
 * @since  1.0.0
 * @access public
 * @return WP_Theme A single instance of the parent's WP_Theme object.
 */
function carelib_get_parent() {
	static $parent;

	if ( null === $parent ) {
		$parent = wp_get_theme( get_template() );
	}

	return $parent;
}

/**
 * Return the fallback version by getting it from the WP_Theme object.
 *
 * @since  1.0.0
 * @access public
 * @return string The current theme's version number.
 */
function carelib_get_fallback_version() {
	return carelib_get_theme()->get( 'Version' );
}

/**
 * Return the version number of the current parent theme.
 *
 * @since  1.0.0
 * @access public
 * @return string The current parent theme's version number.
 */
function carelib_get_parent_version() {
	return defined( 'PARENT_THEME_VERSION' ) ? PARENT_THEME_VERSION : carelib_get_fallback_version();
}

/**
 * Return the version number of the current theme.
 *
 * @since  1.0.0
 * @access public
 * @return string The current theme's version number.
 */
function carelib_get_theme_version() {
	return defined( 'CHILD_THEME_VERSION' ) ? CHILD_THEME_VERSION : carelib_get_parent_version();
}
