<?php
/**
 * Load all global admin theme filters.
 *
 * @package   Alpha\Admin\Hooks
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in admin/layout.php
 *
 * @see alpha_get_forced_post_ids
 */
add_filter( 'alpha_forced_post_ids', 'alpha_get_forced_post_ids', 10 );
