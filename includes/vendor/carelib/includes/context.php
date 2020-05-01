<?php
/**
 * Contextual functions and filters, particularly dealing with the body, post,
 * and comment classes.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Filter the WordPress body class with extra default classes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $classes
 * @return array
 */
function carelib_body_class_filter( $classes ) {
	if ( is_front_page() && ! is_home() ) {
		$classes[] = 'static-home';
	}

	if ( carelib_is_plural() ) {
		$classes[] = 'plural';

		if ( is_tax() || is_category() || is_tag() ) {
			$classes[] = 'taxonomy';
		}
	} elseif ( is_singular() ) {
		$classes[] = 'singular';
	}

	if ( carelib_has_layouts() ) {
		$classes[] = sanitize_html_class( 'layout-' . carelib_get_theme_layout() );
	}

	return $classes;
}

/**
 * Filter the WordPress post class with a better set of default classes.
 *
 * @since  1.0.0
 * @access public
 * @param  array        $classes
 * @param  string|array $class
 * @param  int          $post_id
 * @return array
 */
function carelib_post_class_filter( $classes, $class, $post_id ) {
	$_classes    = array();
	$post        = get_post( $post_id );
	$post_type   = get_post_type();
	$post_status = get_post_status();

	$remove = array( 'hentry', "type-{$post_type}", "status-{$post_status}" );

	foreach ( $classes as $key => $class ) {

		if ( in_array( $class, $remove, true ) ) {
			unset( $classes[ $key ] );
		} else {
			$classes[ $key ] = str_replace( 'tag-', 'post_tag-', $class );
		}
	}

	$_classes[] = 'entry';
	$_classes[] = $post_type;
	$_classes[] = $post_status;

	$_classes = array_map( 'esc_attr', $_classes );

	return array_unique( array_merge( $_classes, $classes ) );
}

/**
 * Adds custom classes to the WordPress comment class.
 *
 * @since  1.0.0
 * @access public
 * @param  array        $classes
 * @param  string|array $class
 * @param  int          $comment_id
 * @return array
 */
function carelib_comment_class_filter( $classes, $class, $comment_id ) {

	$comment = get_comment( $comment_id );

	// If the comment type is 'pingback' or 'trackback', add the 'ping' comment class.
	if ( in_array( $comment->comment_type, array( 'pingback', 'trackback' ), true ) ) {
		$classes[] = 'ping';
	}

	// User classes to match user role and user.
	if ( 0 < $comment->user_id ) {

		// Create new user object.
		$user = new WP_User( $comment->user_id );

		// Set a class with the user's role(s).
		if ( is_array( $user->roles ) ) {
			foreach ( $user->roles as $role ) {
				$classes[] = sanitize_html_class( "role-{$role}" );
			}
		}
	}

	// Get comment types that are allowed to have an avatar.
	$avatar_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );

	// If avatars are enabled and the comment types can display avatars, add the 'has-avatar' class.
	if ( get_option( 'show_avatars' ) && in_array( $comment->comment_type, $avatar_types, true ) ) {
		$classes[] = 'has-avatar';
	}

	return array_map( 'esc_attr', array_unique( $classes ) );
}
