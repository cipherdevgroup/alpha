<?php
/**
 * Methods for controlling breadcrumb display.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * An array of breadcrumb locations.
 *
 * @since  1.0.0
 * @access public
 * @return array $breadcrumbs
 */
function carelib_get_breadcrumb_options() {
	return apply_filters( 'carelib_breadcrumb_options', array(
		'carelib_breadcrumb_single' => array(
			'default'  => 0,
			'label'    => __( 'Single Entries', 'alpha' ),
		),
		'carelib_breadcrumb_pages' => array(
			'default'  => 0,
			'label'    => __( 'Pages', 'alpha' ),
		),
		'carelib_breadcrumb_blog_page' => array(
			'default'  => 0,
			'label'    => __( 'Blog Page', 'alpha' ),
		),
		'carelib_breadcrumb_archive' => array(
			'default'  => 0,
			'label'    => __( 'Archives', 'alpha' ),
		),
		'carelib_breadcrumb_404' => array(
			'default'  => 0,
			'label'    => __( '404 Page', 'alpha' ),
		),
		'carelib_breadcrumb_attachment' => array(
			'default'  => 0,
			'label'    => __( 'Attachment/Media Pages', 'alpha' ),
		),
	) );
}

/**
 * Display our breadcrumbs based on selections made in the WordPress customizer.
 *
 * @since  1.0.0
 * @access public
 * @return bool true if both our template tag and theme mod return true.
 */
function carelib_display_breadcrumbs() {
	// Grab our available breadcrumb display options.
	$options = array_keys( carelib_get_breadcrumb_options() );
	// Set up an array of template tags to map to our breadcrumb display options.
	$tags = apply_filters( 'carelib_breadcrumb_tags',
		array(
			is_singular() && ! is_attachment() && ! is_page(),
			is_page(),
			is_home() && ! is_front_page(),
			is_archive(),
			is_404(),
			is_attachment(),
		)
	);

	// Loop through our theme mods to see if we have a match.
	foreach ( array_combine( $options, $tags ) as $mod => $tag ) {
		// Return true if we find an enabled theme mod within the correct section.
		if ( 1 === absint( get_theme_mod( $mod, 0 ) ) && true === $tag ) {
			return true;
		}
	}
	return false;
}

/**
 * Check to see if a supported breadcrumbs plugin is active.
 *
 * @since  1.0.0
 * @access public
 * @return mixed false if no plugin is active, callback function name if one is
 */
function carelib_breadcrumb_plugin_is_active() {
	$callbacks = apply_filters( 'carelib_breadcrumbs_plugins', array(
		'yoast_breadcrumb',
		'breadcrumb_trail',
		'bcn_display',
		'breadcrumbs',
		'crumbs',
	) );

	foreach ( (array) $callbacks as $callback ) {
		if ( function_exists( $callback ) ) {
			return $callback;
		}
	}
	return false;
}
