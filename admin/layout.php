<?php
/**
 * Functions for controlling layout options within the admin.
 *
 * @package    Alpha\Admin\Layout
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'add_meta_boxes', 'alpha_disable_layout_metabox', 5, 2 );
/**
 * Disable the layout meta box if the current page uses a forced layout.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $post_type The post type of the current post.
 * @param  WP_Post $post The post type object of the current post.
 * @return void
 */
function alpha_disable_layout_metabox( $post_type, $post ) {
	if ( $post instanceof WP_Post && alpha_is_page_layout_forced( $post->ID ) ) {
		add_filter( 'alpha_allow_layout_control', '__return_false' );
	}
}

/**
 * Determine whether the layout is forced on the current page.
 *
 * @since  1.0.0
 * @access public
 * @param  int $post_id The post ID for the post to be checked.
 * @return bool true if the current layout is forced, false otherwise
 */
function alpha_is_page_layout_forced( $post_id ) {
	if ( get_option( 'page_on_front' ) === $post_id ) {
		return true;
	}
	$forced_templates = array();
	foreach ( $forced_templates as $template ) {
		if ( get_page_template_slug( $post_id ) ) {
			return true;
		}
	}
	return false;
}
