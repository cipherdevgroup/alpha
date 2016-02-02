<?php
/**
 * Template helper functions related to entries.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\TemplateHelpers
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Output opening markup for the 404 article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_open() {
	echo '<article id="error-404" class="entry error-404 not-found">';
}

/**
 * Output the 404 entry title.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_title() {
	echo carelib_get_404_entry_title();
}

/**
 * Output the 404 entry title.
 *
 * @since  0.1.0
 * @access public
 * @param  string $content The existing content.
 * @return string $content The modified content.
 */
function alpha_404_content( $content ) {
	return carelib_get_404_content();
}

/**
 * Output closing markup for the 404 article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_close() {
	echo '</article><!-- #error-404 -->';
}
