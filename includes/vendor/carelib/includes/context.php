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
 * CareLib's main contextual function.
 *
 * This allows code to be used more than once without running hundreds of
 * conditional checks within the theme. It returns an array of contexts
 * based on what page a visitor is currently viewing on the site.
 *
 * @since  1.0.0
 * @access protected
 * @return array
 */
function _carelib_get_context() {
	$context   = array();
	$object    = get_queried_object();
	$object_id = get_queried_object_id();

	if ( is_front_page() ) {
		$context[] = 'home';

		if ( ! is_home() ) {
			$context[] = 'static-home';
		}
	} elseif ( is_home() ) {
		$context[] = 'blog';
	}

	if ( carelib_is_plural() ) {
		$context[] = 'plural';

		if ( is_search() ) {
			$context[] = 'search';
		} elseif ( is_archive() ) {
			$context[] = 'archive';

			if ( is_post_type_archive() ) {
				$post_type = get_query_var( 'post_type' );

				if ( is_array( $post_type ) ) {
					reset( $post_type );
				}

				$context[] = "archive-{$post_type}";
			} elseif ( is_tax() || is_category() || is_tag() ) {
				$context[] = 'taxonomy';
				$context[] = "taxonomy-{$object->taxonomy}";
				$context[] = "taxonomy-{$object->taxonomy}-" . sanitize_html_class( $object->slug, $object->term_id );
			} elseif ( is_author() ) {
				$context[] = 'user';
			} elseif ( is_date() ) {
				$context[] = 'date';
			} elseif ( is_time() ) {
				$context[] = 'time';
			}
		}
	} else {
		if ( is_singular() ) {
			$context[] = 'singular';
			$context[] = "singular-{$object->post_type}";
			$context[] = "singular-{$object->post_type}-{$object_id}";
		} elseif ( is_404() ) {
			$context[] = 'error-404';
		}
	}

	$context = (array) apply_filters( 'carelib_context', $context );

	return array_map( 'esc_attr', array_unique( $context ) );
}

/**
 * Filter the WordPress body class with a better set of default classes.
 *
 * The goal of this is to create classes which are more consistently handled
 * and are backwards compatible with the original body class functionality
 * that existed prior to WordPress core adopting this feature.
 *
 * @since  1.0.0
 * @access public
 * @param  array        $classes
 * @param  string|array $class
 * @return array
 */
function carelib_body_class_filter( $classes, $class ) {
	// WordPress class for uses when WordPress isn't always the only system on the site.
	$classes = array( 'wordpress' );

	// Text direction.
	$classes[] = is_rtl() ? 'rtl' : 'ltr';

	// Locale and language.
	$locale = get_locale();
	$lang   = carelib_get_language( $locale );

	if ( $locale !== $lang ) {
		$classes[] = $lang;
	}

	$classes[] = strtolower( str_replace( '_', '-', $locale ) );

	// Check if the current theme is a parent or child theme.
	$classes[] = is_child_theme() ? 'child-theme' : 'parent-theme';

	// Multisite check adds the 'multisite' class and the blog ID.
	if ( is_multisite() ) {
		$classes[] = 'multisite';
		$classes[] = 'blog-' . get_current_blog_id();
	}

	// Is the current user logged in.
	$classes[] = is_user_logged_in() ? 'logged-in' : 'logged-out';

	// WP admin bar.
	if ( is_admin_bar_showing() ) {
		$classes[] = 'admin-bar';
	}

	$context = _carelib_get_context();

	if ( in_array( 'singular', $context, true ) ) {

		// Get the queried post object.
		$post = get_queried_object();

		// Checks for custom template.
		$template = str_replace(
			array(
				"{$post->post_type}-template-",
				"{$post->post_type}-",
			),
			'',
			basename( get_page_template_slug( $post ), '.php' )
		);
		if ( $template ) {
			$classes[] = "{$post->post_type}-template-{$template}";
		} else {
			$classes[] = "{$post->post_type}-template-default";
		}
	}

	// Merge base contextual classes with $classes.
	$classes = array_merge( $classes, $context );

	// Theme layouts.
	if ( carelib_has_layouts() ) {
		$classes[] = sanitize_html_class( 'layout-' . carelib_get_theme_layout() );
	}

	// Input class.
	if ( ! empty( $class ) ) {
		$class   = is_array( $class ) ? $class : preg_split( '#\s+#', $class );
		$classes = array_merge( $classes, $class );
	}

	return array_map( 'esc_attr', $classes );
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
