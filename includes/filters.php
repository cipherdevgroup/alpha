<?php
/**
 * Functions used to hook global template parts and other markup elements.
 *
 * @package   Alpha\Functions\Hooks
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

defined( 'WPINC' ) || die;

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see alpha_get_parent_textdomain
 */
add_filter( 'alpha_parent_textdomain', 'alpha_get_parent_textdomain' );

/**
 * Callback defined in includes/plugins.php
 *
 * @see alpha_get_related_posts_image_size
 */
add_filter( 'rp4wp_thumbnail_size', 'alpha_get_related_posts_image_size' );
