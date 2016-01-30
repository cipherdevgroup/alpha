<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\Hooks
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/plugins.php
 *
 * @see alpha_related_posts_image
 */
add_filter( 'rp4wp_thumbnail_size', 'alpha_related_posts_image' );
