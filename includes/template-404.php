<?php
/**
 * Template helper functions related to entries.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Output opening markup for the 404 article element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_404_entry_open() {
	echo '<article id="error-404" class="entry error-404 not-found">';
}

/**
 * Output the 404 entry title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_404_entry_title() {
	carelib_404_entry_title();
}

/**
 * Output closing markup for the 404 article element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_404_entry_close() {
	echo '</article><!-- #error-404 -->';
}
