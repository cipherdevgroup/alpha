<?php
/**
 * Helper functions for working with the WordPress sidebar system.
 *
 * Currently, the library creates a simple method for registering
 * HTML5-ready sidebars instead of the default WordPress unordered lists.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Wrapper function for WordPress' register_sidebar() function.
 *
 * This function exists so that theme authors can more quickly register
 * sidebars with an HTML5 structure instead of having to write the same code
 * over and over. Theme authors are also expected to pass in the ID, name,
 * and description of the sidebar.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Options used to register a sidebar.
 * @return string Sidebar ID.
 */
function carelib_register_sidebar( $args ) {
	$defaults = apply_filters( 'carelib_sidebar_defaults', array(
		'id'            => '',
		'name'          => '',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$args = wp_parse_args( $args, $defaults );

	remove_action( 'widgets_init', '__return_false', 95 );

	// Register the sidebar.
	return register_sidebar( apply_filters( 'carelib_sidebar_args', $args ) );
}

/**
 * Return the name of a given dynamic sidebar.
 *
 * @since  1.0.0
 * @access public
 * @global array $wp_registered_sidebars
 * @param  string $sidebar_id The ID of the sidebar to check.
 * @return string
 */
function carelib_get_sidebar_name( $sidebar_id ) {
	global $wp_registered_sidebars;
	$name = false;
	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $name;
}

/**
 * Get a specified sidebar template.
 *
 * @since  1.0.0
 * @access public
 * @param  string $name The name of the sidebar to load.
 * @return void
 */
function carelib_get_sidebar( $name = null ) {
	// Core WordPress hook.
	do_action( 'get_sidebar', $name );

	$templates = array();
	if ( ! empty( $name ) ) {
		$templates[] = "template-parts/sidebar/{$name}.php";
		$templates[] = "template-parts/sidebar-{$name}.php";
		$templates[] = "sidebar-{$name}.php";
	}
	$templates[] = 'sidebar.php';

	locate_template( $templates, true );
}

/**
 * Return the id of the primary sidebar.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_primary_sidebar_id() {
	return sanitize_key( (string) apply_filters( 'carelib_primary_sidebar_id', 'primary' ) );
}
