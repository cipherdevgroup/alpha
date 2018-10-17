<?php
/**
 * Template helper functions and hooks used within the blog section.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Output the opening markup for the archive header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_header_open() {
	echo '<div ' . carelib_get_attr( 'archive-header' ) . '>';
}

/**
 * Output the archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_archive_title() {
	echo '<h1 ' . carelib_get_attr( 'archive-title' ) . '>' . get_the_archive_title() . '</h1>';
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
			carelib_get_attr( 'archive-description' ),
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
 * @uses   carelib_get_posts_navigation
 * @return void
 */
function alpha_posts_navigation() {
	carelib_posts_navigation();
}
