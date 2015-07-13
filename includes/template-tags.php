<?php
/**
 * Template Helper Functions.
 *
 * @package     Exposure
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

function alpha_is_plural() {
	return carelib_class( 'template-general' )->is_plural();
}

function alpha_get_image( $args = array() ) {
	return carelib_class( 'image-grabber' )->grab_the_image( $args );
}

function alpha_image( $args = array() ) {
	carelib_class( 'image-grabber' )->grab_the_image( $args, true );
}

function alpha_site_title() {
	echo carelib_class( 'template-general' )->get_site_title();
}

function alpha_site_description() {
	echo carelib_class( 'template-general' )->get_site_description();
}

function alpha_entry_terms( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_entry_terms( $args );
}

function alpha_get_sidebar( $id ) {
	carelib_class( 'sidebar' )->template( $id );
}

function alpha_get_sidebar_name( $id ) {
	carelib_class( 'sidebar' )->get_name( $id );
}

function alpha_comments_callback( $comment, $args, $depth  ) {
	carelib_class( 'template-comments' )->comments_callback( $comment, $args, $depth );
}

function alpha_get_comment_reply_link( $args = array() ) {
	carelib_class( 'template-comments' )->get_reply_link( $args );
}

function alpha_comment_reply_link( $args = array() ) {
	echo alpha_get_comment_reply_link( $args );
}

/**
 * Helper function to determine if we're within a blog section archive.
 *
 * @since  2.0.0
 * @access public
 * @return bool true if we're on a blog archive page.
 */
function alpha_is_blog_archive() {
	return carelib_class( 'template-general' )->is_blog_archive();
}

/**
 * Helper function to determine if we're anywhere within the blog section.
 *
 * @since  2.0.0
 * @access public
 * @return bool true if we're on a blog archive page or a singular post.
 */
function alpha_is_blog() {
	return alpha_is_blog_archive() || is_singular( 'post' );
}

/**
 * Output an <img> tag of the site logo, at the size specified
 * in the theme's add_theme_support() declaration.
 *
 * @since  2.0.0
 * @uses   CareLib_Template_Tags::the_logo
 */
function alpha_logo() {
	carelib_class( 'template-general' )->the_logo();
}

/**
 * Display our breadcrumbs based on selections made in the WordPress customizer.
 *
 * @since  2.0.0
 * @access public
 * @return bool true if both our template tag and theme mod return true.
 */
function alpha_display_breadcrumbs() {
	return carelib_class( 'template-general' )->display_breadcrumbs();
}

/**
 * Returns either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  2.0.0
 * @access public
 * @param  $args array
 * @return void
 */
function alpha_content() {
	echo carelib_class( 'template-entry' )->get_content();
}

/**
 * Format a link to the customizer panel.
 *
 * @since  2.0.0
 * @access public
 * @param  $args array options for how the link will be formatted
 * @return string an escaped link to the WordPress customizer panel.
 */
function alpha_get_customizer_link( $args = array() ) {
	return carelib_class( 'template-general' )->get_customizer_link( $args );
}

/**
 * Returns a formatted theme credit link.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
function alpha_get_credit_link() {
	return carelib_class( 'template-general' )->get_credit_link();
}

/**
 * Returns formatted theme information.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function alpha_get_theme_info() {
	return carelib_class( 'template-general' )->get_theme_info();
}
