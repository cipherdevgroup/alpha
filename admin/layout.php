<?php
/**
 * Functions for controlling layout options within the admin.
 *
 * @package   Alpha\Admin\Layout
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Add forced layout post IDs.
 *
 * @since  1.0.0
 * @access public
 * @param  array $post_ids The currently forced post types.
 * @return array $post_ids The modified forced post types.
 */
function alpha_get_forced_post_ids( $post_ids ) {
	if ( carelib_is_beaver_enabled() ) {
		$post_ids[] = get_the_ID();
	}

	return $post_ids;
}
