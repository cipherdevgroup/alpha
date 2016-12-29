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
add_filter( 'carelib_parent_textdomain', 'alpha_get_parent_textdomain' );
