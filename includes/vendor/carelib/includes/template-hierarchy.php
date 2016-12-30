<?php
/**
 * The library has its own template hierarchy that can be used instead of the
 * default WordPress template hierarchy.
 *
 * It was built to extend the default by making it smarter and more flexible.
 * The goal is to give theme developers and end users an easy-to-override system
 * that doesn't involve massive amounts of conditional tags within files.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Override WP's default index.php template.
 *
 * Because we don't really use index.php, this prevents searching for
 * templates multiple times when trying to load the default template.
 *
 * @since  1.0.0
 * @access public
 * @param  string $template
 * @return string $template
 */
function carelib_index_include( $template ) {
	if ( get_index_template() === $template ) {
		return carelib_framework( apply_filters( 'carelib_index_template', null ) );
	}
	return $template;
}

/**
 * Fix for the front page template handling in WordPress core.
 *
 * This overwrites "front-page.php" template if posts are to be shown on
 * the front page. This way, the "front-page.php" template will only ever
 * be used if an actual page is supposed to be shown on the front.
 *
 * @link   http://www.chipbennett.net/2013/09/14/home-page-and-front-page-and-templates-oh-my/
 * @since  1.0.0
 * @access public
 * @param  string $template
 * @return string
 */
function carelib_front_page_template( $template ) {
	return is_home() ? '' : $template;
}

/**
 * Override the default comments template.
 *
 * This filter allows for a "comments-{$post_type}.php" template based on
 * the post type of the current single post view. If this template is not
 * found, it falls back to the default "comments.php" template.
 *
 * @since  1.0.0
 * @access public
 * @param  string $template The comments template file name.
 * @return string $template The theme comments template after all templates have been checked for.
 */
function carelib_comments_template( $template ) {
	$templates = array();
	$post_type = get_post_type();

	// Allow for custom templates entered into comments_template( $file ).
	$template = str_replace( carelib_get_parent_dir(), '', $template );

	if ( 'comments.php' !== $template ) {
		$templates[] = $template;
	}

	$templates[] = "template-parts/comments-{$post_type}.php";
	$templates[] = 'template-parts/comments.php';
	$templates[] = 'comments.php';

	// Return the found template.
	return locate_template( $templates );
}
