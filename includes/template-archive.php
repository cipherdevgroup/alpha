<?php
/**
 * Template helper functions and hooks used within the blog section.
 *
 * @package    Alpha\Fucntions\TemplateHelpers
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Wrapper for is_archive which also includes search results.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::is_archive
 * @return bool true if we're on an archive page.
 */
function alpha_is_archive() {
	return carelib_get( 'template-archive' )->is_archive();
}

/**
 * Determine if we're viewing a page which lists multiple entries.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::is_plural
 * @return bool true if we're on a plural page.
 */
function alpha_is_plural() {
	return carelib_get( 'template-archive' )->is_plural();
}

/**
 * Determine if we're viewing a blog section archive.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::is_blog_archive
 * @return bool true if we're on a blog archive page.
 */
function alpha_is_blog_archive() {
	return carelib_get( 'template-archive' )->is_blog_archive();
}

/**
 * Determine if we're viewing anything within the blog section.
 *
 * @since  1.0.0
 * @access public
 * @return bool true if we're on a blog archive page or a singular post.
 */
function alpha_is_blog() {
	return alpha_is_blog_archive() || is_singular( 'post' );
}

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
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_posts_navigation( $args = array() ) {
	echo carelib_get( 'template-archive' )->get_posts_navigation( $args );
}
