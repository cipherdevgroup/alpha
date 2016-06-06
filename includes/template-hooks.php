<?php
/**
 * Template helper functions for custom theme hooks.
 *
 * @package   Alpha\Functions\Hooks
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

/**
 * Add a custom action for the archive header.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_archive_header() {
	carelib_archive_header();
}

/**
 * Add a custom hook for the entry header.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header() {
	carelib_entry_header();
}

/**
 * Add a custom hook for the entry meta.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header_meta() {
	carelib_entry_header_meta();
}

/**
 * Add a custom hook for the entry content.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_content() {
	carelib_entry_content();
}

/**
 * Add a custom hook for the entry footer if the current view has an entry footer.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer() {
	carelib_entry_footer();
}

/**
 * Add a custom hook for the entry footer if the current view has an entry footer.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_meta() {
	carelib_entry_footer_meta();
}
