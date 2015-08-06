<?php
/**
 * Admin Script and Style Loaders and Related Functions.
 *
 * @package    Alpha\Admin\Functions\Scripts
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', 'alpha_add_editor_styles' );
/**
 * Add custom styles to the WordPress editor to give a better representation of
 * what the front of the site will look like.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_add_editor_styles() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$editor_styles = array(
		'//fonts.googleapis.com/css?family=Raleway:400,600|Lato:400,400italic,700',
		"css/editor-style{$suffix}.css",
	);

	add_editor_style( $editor_styles );
}
