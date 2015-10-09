<?php
/**
 * Template helper functions and hooks used within the blog section.
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
 * Wrapper for is_archive which also includes search results.
 *
 * @since  0.2.0
 * @access public
 * @uses   CareLib_Template_Archive::is_archive
 * @return bool true if we're on an archive page.
 */
function alpha_is_archive() {
	return carelib_get( 'template-archive' )->is_archive();
}

/**
 * Determine if we're viewing a page which lists multiple entries.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::is_plural
 * @return bool true if we're on a plural page.
 */
function alpha_is_plural() {
	return carelib_get( 'template-archive' )->is_plural();
}

/**
 * Determine if we're viewing a blog section archive.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Archive::is_blog_archive
 * @return bool true if we're on a blog archive page.
 */
function alpha_is_blog_archive() {
	return carelib_get( 'template-archive' )->is_blog_archive();
}

/**
 * Determine if we're viewing anything within the blog section.
 *
 * @since  1.0.0
 * @access public
 * @return bool true if we're on a blog archive page or a singular post.
 */
function alpha_is_blog() {
	return alpha_is_blog_archive() || is_singular( 'post' );
}
