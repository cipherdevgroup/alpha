<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'tha_content_top',         'alpha_archive_header',    12 );
add_action( 'tha_content_while_after', 'alpha_posts_navigation',  10 );

/**
 * Load the loop meta template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_header() {
	if ( is_archive() || is_search() ) {
		get_template_part( 'template-parts/hooked/archive', 'header' );
	}
}

/**
 * Helper function to build a newer/older or paginated navigation element within
 * a loop of multiple entries.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::get_posts_navigation
 * @param  $args array
 * @return string
 */
function alpha_posts_navigation( $args = array() ) {
	echo carelib_get( 'template-archive' )->get_posts_navigation( $args );
}
