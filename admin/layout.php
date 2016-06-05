<?php
/**
 * Functions for controlling layout options within the admin.
 *
 * @package   Alpha\Admin\Layout
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

/**
 * Add forced layout post IDs.
 *
 * @since  0.1.0
 * @access public
 * @param  array $post_ids The currently forced post types.
 * @return array $post_ids The modified forced post types.
 */
function alpha_get_forced_post_ids( $post_ids ) {
	if ( alpha_is_beaver_enabled() ) {
		$post_ids[] = get_the_ID();
	}

	return $post_ids;
}
