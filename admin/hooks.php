<?php
/**
 * Load all global admin theme filters.
 *
 * @package   Alpha\Admin\Hooks
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

defined( 'WPINC' ) || die;

/**
 * Callback defined in admin/layout.php
 *
 * @see carelib_forced_post_ids
 */
add_filter( 'carelib_forced_post_ids', 'alpha_get_forced_post_ids', 10 );
