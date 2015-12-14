<?php
/**
 * Theme functions which must be run on the WordPress core 'widgets_init' hook.
 *
 * @package    Alpha\Functions
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'widgets_init', 'alpha_register_sidebars', 5 );

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_sidebars() {
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'alpha' ),
		'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'alpha' ),
	) );
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'footer-widgets',
		'name'        => _x( 'Footer Widgets', 'sidebar', 'alpha' ),
		'description' => __( 'A widgeted area which displays just before the main site footer on all pages.', 'alpha' ),
	) );
}
