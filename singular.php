<?php
/**
 * The template for displaying singular posts of all types.
 *
 * @package   Alpha\CoreTemplates
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */

if ( carelib_is_beaver_enabled() ) {
	/**
	 * Callback defined in includes/template-layout.php
	 *
	 * @see alpha_force_full_width_layout
	 */
	add_filter( 'carelib_get_theme_layout', 'alpha_force_full_width_layout', 15 );

	/**
	 * Callback defined in includes/attributes.php
	 *
	 * @see carelib_attr_full_width_inner
	 */
	add_filter( 'carelib_attr_site-inner', 'carelib_attr_full_width_inner', 10 );

	/**
	 * Callback defined in includes/template-entry.php
	 *
	 * @see carelib_null_entry_containers
	 */
	add_action( 'carelib_content_while_before', 'carelib_null_entry_containers', 10 );
}

carelib_framework();
