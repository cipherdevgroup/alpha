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

add_action( 'tha_content_top',         'alpha_archive_header',        12 );
add_action( 'alpha_archive_header',    'alpha_archive_header_open',    5 );
add_action( 'alpha_archive_header',    'alpha_wrap_open',             10 );
add_action( 'alpha_archive_header',    'alpha_archive_title',         15 );
add_action( 'alpha_archive_header',    'alpha_breadcrumbs',           20 );
add_action( 'alpha_archive_header',    'alpha_archive_sub_terms',     25 );
add_action( 'alpha_archive_header',    'alpha_archive_description',   30 );
add_action( 'alpha_archive_header',    'alpha_wrap_close',            95 );
add_action( 'alpha_archive_header',    'alpha_archive_header_close', 100 );
add_action( 'tha_content_while_after', 'alpha_posts_navigation',      10 );

/**
 * Add a custom action for the archive header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_header() {
	if ( alpha_is_archive() ) {
		do_action( 'alpha_archive_header' );
	}
}

/**
 * Output the opening markup for the archive header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_header_open() {
	echo '<div ' . alpha_get_attr( 'archive-header' ) . '>';
}

/**
 * Output the archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_title() {
	echo '<h1 ' . alpha_get_attr( 'archive-title' ) . '>' . get_the_archive_title() . '</h1>';
}

/**
 * Load the archive sub-terms menu template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_sub_terms() {
	if ( is_category() || is_tax() ) {
		get_template_part( 'template-parts/menu/sub-terms' );
	}
}

/**
 * Output the archive description.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_description() {
	if ( ! is_paged() && $desc = get_the_archive_description() ) {
		printf( '<div %s>%s</div><!-- .archive-description -->',
			alpha_get_attr( 'archive-description' ),
			$desc
		);
	}
}

/**
 * Output the closing markup for the archive header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_header_close() {
	echo '</div><!-- .archive-header -->';
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
