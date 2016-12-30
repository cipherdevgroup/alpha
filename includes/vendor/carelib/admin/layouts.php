<?php
/**
 * Methods for interacting with `CareLib_Layout` objects within the admin panel.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Check if the current layout has a metabox of any kind.
 *
 * @since  1.0.0
 * @access public
 * @param  CareLib_Layout $layout The layout object to check.
 * @param  string         $post_type The post type of the current post.
 * @return bool True if the layout has a metabox, false otherwise.
 */
function carelib_layout_has_meta_box( $layout, $post_type ) {
	if ( ! $layout['image'] ) {
		return false;
	}

	if ( ! carelib_post_type_has_layout( $post_type, $layout ) ) {
		return false;
	}

	return true;
}

/**
 * Check if the current layout has a post metabox.
 *
 * @since  1.0.0
 * @access public
 * @param  CareLib_Layout $layout The layout object to check.
 * @param  string         $post_type The post type of the current post.
 * @return bool True if the layout has a post metabox, false otherwise.
 */
function carelib_layout_has_post_metabox( $layout, $post_type ) {
	if ( true !== $layout['is_post_layout'] ) {
		return false;
	}

	return carelib_layout_has_meta_box( $layout, $post_type );
}

/**
 * Disable the layout meta box if the current page uses a forced layout.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $post_type The post type of the current post.
 * @param  WP_Post $post The post type object of the current post.
 * @return void
 */
function carelib_maybe_disable_post_layout_metabox( $post_type, $post ) {
	if ( $post instanceof WP_Post && _carelib_admin_is_layout_forced( $post_type, $post->ID ) ) {
		add_filter( 'carelib_allow_layout_control', '__return_false' );
	}
}

/**
 * Determine whether the layout is forced on the current page.
 *
 * @since  1.0.0
 * @access public
 * @param  string $post_type The post type of the current post.
 * @return bool true if the current post type layout is forced, false otherwise
 */
function _carelib_is_post_type_layout_forced( $post_type = '' ) {
	$post_types = (array) apply_filters( 'carelib_forced_post_types', array() );

	if ( empty( $post_type ) ) {
		$post_type = get_post_type();
	}

	foreach ( $post_types as $type ) {
		if ( $post_type === $type ) {
			return true;
		}
	}

	return false;
}

/**
 * Determine whether the layout is forced on the current page.
 *
 * @since  1.0.0
 * @access public
 * @param  int $post_id The post ID for the post to be checked.
 * @return bool true if the current post layout is forced, false otherwise
 */
function _carelib_is_post_layout_forced( $post_id = '' ) {
	$post_ids = (array) apply_filters( 'carelib_forced_post_ids', array() );

	if ( empty( $post_id ) ) {
		$post_id = get_the_ID();
	}

	foreach ( $post_ids as $id ) {
		if ( (int) $id === (int) $post_id ) {
			return true;
		}
	}

	return false;
}

/**
 * Determine whether the layout is forced on the current page.
 *
 * @since  1.0.0
 * @access public
 * @param  int $post_id The post ID for the post to be checked.
 * @return bool true if the current page template layout is forced, false otherwise
 */
function _carelib_is_template_layout_forced( $post_id = '' ) {
	$templates = (array) apply_filters( 'carelib_forced_templates', array() );

	if ( empty( $post_id ) ) {
		$post_id = get_the_ID();
	}

	foreach ( $templates as $template ) {
		if ( get_page_template_slug( $post_id ) === $template ) {
			return true;
		}
	}

	return false;
}

/**
 * Disable the layout meta box if the current page uses a forced layout.
 *
 * @since  1.0.0
 * @access public
 * @param  string $post_type The post type of the current post.
 * @param  int    $post_id The post ID of the current postt.
 * @return bool
 */
function _carelib_admin_is_layout_forced( $post_type, $post_id ) {
	if ( _carelib_is_post_type_layout_forced( $post_type ) ) {
		return true;
	}

	if ( _carelib_is_post_layout_forced( $post_id ) ) {
		return true;
	}

	if ( _carelib_is_template_layout_forced( $post_id ) ) {
		return true;
	}

	return carelib_is_layout_forced();
}
