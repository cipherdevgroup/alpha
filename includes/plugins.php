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
