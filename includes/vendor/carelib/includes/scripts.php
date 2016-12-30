<?php
/**
 * Methods for handling JavaScript in the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Enqueue front-end scripts for the library.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_enqueue_scripts() {
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Helper function for getting the script/style `.min` suffix for minified files.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_suffix() {
	$debug   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	$enabled = (bool) apply_filters( 'carelib_enable_suffix', ! $debug );

	return $enabled ? '.min' : '';
}
