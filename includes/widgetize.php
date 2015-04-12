<?php
/**
 * Register and Display Widget Areas.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

add_action( 'widgets_init', 'alpha_register_sidebars', 5 );
/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_sidebars() {
	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary Sidebar', 'sidebar', 'alpha' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'alpha' ),
		)
	);
}
