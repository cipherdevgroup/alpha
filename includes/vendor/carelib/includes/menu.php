<?php
/**
 * Helper functions for working with the WordPress menu system.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Function for grabbing a WP nav menu theme location name.
 *
 * @since  1.0.0
 * @access public
 * @param  string $location The ID of the menu location to look up.
 * @return string
 */
function carelib_get_menu_location_name( $location ) {
	$locations = get_registered_nav_menus();
	return isset( $locations[ $location ] ) ? $locations[ $location ] : false;
}

/**
 * Get a specified menu template.
 *
 * @since  1.0.0
 * @access public
 * @param  string $name
 * @return void
 */
function carelib_get_menu( $name = null ) {
	$templates = array();
	if ( '' !== $name ) {
		$templates[] = "template-parts/menu-{$name}.php";
		$templates[] = "template-parts/menu/{$name}.php";
	}
	$templates[] = 'template-parts/menu.php';
	$templates[] = 'template-parts/menu/menu.php';

	locate_template( $templates, true );
}
