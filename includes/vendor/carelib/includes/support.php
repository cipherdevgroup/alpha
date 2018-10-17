<?php
/**
 * Adds theme and post type support for features included in the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Sets up default theme support.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_theme_support() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	) );
}

/**
 * Adds extra support for features not default to the core post types.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_post_type_support() {
	// Add support for excerpts to the 'page' post type.
	add_post_type_support( 'page', array( 'excerpt' ) );

	// Add thumbnail support for audio and video attachments.
	add_post_type_support( 'attachment:audio', 'thumbnail' );
	add_post_type_support( 'attachment:video', 'thumbnail' );
}
