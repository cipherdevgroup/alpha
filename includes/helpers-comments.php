<?php
/**
 * Template helper functions related to comments.
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
function alpha_comments_callback( $comment, $args, $depth  ) {
	carelib_class( 'template-comments' )->comments_callback( $comment, $args, $depth );
}

/**
 * Return the comment reply link.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Comments::get_reply_link
 * @param  array  $args
 * @return string
 */
function alpha_get_comment_reply_link( $args = array() ) {
	carelib_class( 'template-comments' )->get_reply_link( $args );
}

/**
 * Output the comment reply link.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args
 * @return void
 */
function alpha_comment_reply_link( $args = array() ) {
	echo alpha_get_comment_reply_link( $args );
}
