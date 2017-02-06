<?php
/**
 * Helper functions used for loading templates.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
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
 * Load a template part and inject WP's default template variables as well as
 * custom template data passed in by the user.
 *
 * @since  1.0.0
 * @access public
 * @param  string $_template_file The path to the template file.
 * @param  array  $data The data to be passed into the template scope.
 * @param  bool   $require_once Whether or not to require the template file once.
 * @return void
 */
function carelib_load_template( $_template_file, $data, $require_once = true ) {
	global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

	if ( is_array( $wp_query->query_vars ) ) {
		extract( $wp_query->query_vars, EXTR_SKIP );
	}

	if ( isset( $s ) ) {
		$s = esc_attr( $s );
	}

	extract( $data, EXTR_SKIP );

	if ( $require_once ) {
		require_once $_template_file;
	} else {
		require $_template_file;
	}
}

/**
 * Locate a template part and inject an array of template data into it.
 *
 * This will only get a template when the injected data array actually contains
 * data to display. If you don't need to pass data, use `get_template_part`.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $data The data to be passed into the template scope.
 * @param  string $slug The slug name for the generic template.
 * @param  string $name The name of the specialized template.
 * @return bool True if the template has been loaded.
 */
function carelib_get_template_part( $data, $slug, $name = null ) {
	/**
	 * Fires before the specified template part file is loaded.
	 *
	 * The dynamic portion of the hook name, `$slug`, refers to the slug name
	 * for the generic template part.
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialized template.
	 * @param array  $data The data to be passed into the template scope.
	 */
	do_action( "carelib_get_template_part_{$slug}", $data, $slug, $name );

	$data = (array) $data;

	if ( ! array_filter( $data ) ) {
		return false;
	}

	$templates = array();
	$name = (string) $name;
	if ( '' !== $name ) {
		$templates[] = "{$slug}-{$name}.php";
	}

	$templates[] = "{$slug}.php";

	if ( $template = locate_template( $templates ) ) {
		carelib_load_template( $template, $data, false );

		return true;
	}

	return false;
}

/**
 * Load the base theme framework template.
 *
 * This works similarly to WP core's `get_template_part` except it imposes
 * some restrictions on the template's name and location.
 *
 * It also uses `require_once` as there should only be a single framework
 * template loaded on any given page.
 *
 * For the $name parameter, if the file is called `framework-special.php`
 * then specify "special".
 *
 * @since  1.0.0
 * @param  string $name The name of the specialized template.
 * @return void
 */
function carelib_framework( $name = '' ) {
	$templates = array();
	/**
	 * Fires before the default framework template file is loaded.
	 *
	 * @since 1.0.0
	 * @param string $name The name of the specialized framework template.
	 */
	do_action( 'carelib_framework', $name, $templates );

	$name      = (string) $name;
	$templates = (array) $templates;

	if ( ! empty( $name ) ) {
		$templates[] = "templates/framework-{$name}.php";
	}
	$templates[] = 'templates/framework.php';

	locate_template( $templates, true );
}
