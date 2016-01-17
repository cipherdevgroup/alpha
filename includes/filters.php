<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/plugins.php
 *
 * @see alpha_related_posts_image
 */
add_filter( 'rp4wp_thumbnail_size', 'alpha_related_posts_image' );
