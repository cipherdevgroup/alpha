<?php
/**
 * Provides compatibility with various WordPress plugins.
 *
 * @package   Alpha\Functions\Plugins
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

/**
 * Change the default related posts image size.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function alpha_get_related_posts_image_size() {
	return 'alpha-related-posts';
}

/**
 * Determine if Beaver Builder is active within the current loop.
 *
 * @since  0.1.0
 * @access public
 * @return bool True if Beaver Builder is active.
 */
function alpha_is_beaver_enabled() {
	if ( ! is_callable( array( 'FLBuilderModel', 'is_builder_enabled' ) ) ) {
		return false;
	}

	return FLBuilderModel::is_builder_enabled();
}
