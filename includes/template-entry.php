<?php
/**
 * Template helper functions related to entries.
 *
 * @package    Alpha\Fucntions\TemplateHelpers
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Display a formatted markup block with information about the entry's terms.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_terms
 * @param  array $args a list of arguments to pass to the entry terms method
 * @return void
 */
function alpha_entry_terms( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_terms( $args );
}

/**
 * Display either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_content
 * @return void
 */
function alpha_content() {
	echo carelib_get( 'template-entry' )->get_content();
}

/**
 * Remove all actions from THA entry hooks and filter the WordPress post
 * content to return null.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::null_entry
 * @return void
 */
function alpha_null_entry() {
	carelib_get( 'template-entry' )->null_entry();
}

/**
 * Filter the WordPress content to null between the entry_content_before
 * and entry_content_after hook locations.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::null_entry_content
 * @return void
 */
function alpha_null_entry_content() {
	carelib_get( 'template-entry' )->null_entry_content();
}

/**
 * Hookable wrapper around a filter to null the WordPress core post content.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::null_the_content
 * @return void
 */
function alpha_null_the_content() {
	carelib_get( 'template-entry' )->null_the_content();
}

/**
 * A custom comment callback to use with WordPress' `comments_template` function.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Comments::comments_callback
 * @param  $comment object the comment object.
 * @param  $args array list of arguments passed from wp_list_comments().
 * @param  $depth integer What level the particular comment is.
 * @return void
 */
function alpha_comments_callback( $comment, $args, $depth ) {
	carelib_get( 'template-comments' )->comments_callback( $comment, $args, $depth );
}
