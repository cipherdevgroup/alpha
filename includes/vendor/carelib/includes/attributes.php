<?php
/**
 * HTML attribute functions and filters.
 *
 * The purposes of this is to provide a way for theme/plugin devs to hook into
 * the attributes for specific HTML elements and create new or modify existing
 * attributes.
 *
 * This is sort of like `body_class()`, `post_class()`, and `comment_class()` on
 * steroids. Plus, it handles attributes for many more elements. The biggest
 * benefit of using this is to provide richer microdata while being forward
 * compatible with the ever-changing Web. Currently, the default microdata
 * vocabulary supported is Schema.org.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Get an HTML element's attributes.
 *
 * This function is actually meant to be filtered by theme authors, plugins,
 * or advanced child theme users. The purpose is to allow folks to modify,
 * remove, or add any attributes they want without having to edit every
 * template file in the theme. So, one could support microformats instead
 * of microdata, if desired.
 *
 * @since  1.0.0
 * @access public
 * @param  string $slug The slug/ID of the element (e.g., 'sidebar').
 * @param  string $context A specific context (e.g., 'primary').
 * @param  array  $attr A list of attributes passed-in directly.
 * @return string
 */
function carelib_get_attr( $slug, $context = '', $attr = array() ) {
	$out   = '';
	$class = sanitize_html_class( $slug );

	if ( ! empty( $context ) ) {
		$class = "{$class} {$class}-" . sanitize_html_class( $context );
	}

	$attr = array_merge(
		array(
			'class' => $class,
		),
		(array) $attr
	);

	$attr = array_merge(
		$attr,
		(array) apply_filters( "carelib_attr_{$slug}", $attr, $context )
	);

	foreach ( $attr as $name => $value ) {
		$out .= ! empty( $value ) ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
	}

	return trim( $out );
}

/**
 * Output an HTML element's attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  string $slug the slug/ID of the element (e.g., 'sidebar').
 * @param  string $context a specific context (e.g., 'primary').
 * @param  array  $attr A list of attributes to be merged.
 * @return void
 */
function carelib_attr( $slug, $context = '', $attr = array() ) {
	echo carelib_get_attr( $slug, $context, $attr );
}

/**
 * <body> element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_body( $attr ) {
	$attr['class'] = join( ' ', get_body_class() );
	$attr['dir']   = is_rtl() ? 'rtl' : 'ltr';

	return $attr;
}

/**
 * Page <header> element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_header( $attr ) {
	$attr['id'] = 'site-header';

	return $attr;
}

/**
 * Page site container element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_container( $attr ) {
	$attr['id'] = 'site-container';

	return $attr;
}

/**
 * Page site inner element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_inner( $attr ) {
	$attr['id'] = 'site-inner';

	return $attr;
}

/**
 * Modify the site inner attributes to allow for full-width pages..
 *
 * @since  0.1.0
 * @access public
 * @param  array $attr The current attributes.
 * @return array
 */
function carelib_attr_full_width_inner( $attr ) {
	$attr['class'] = 'full-width-inner';

	return $attr;
}

/**
 * Page <footer> element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_footer( $attr ) {
	$attr['id'] = 'site-footer';

	return $attr;
}

/**
 * Main content container of the page attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_content( $attr ) {
	$attr['id'] = 'content';

	return $attr;
}

/**
 * Skip link element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_skip_link( $attr, $context ) {
	if ( ! empty( $context ) ) {
		$attr['id'] = 'skip-link-' . sanitize_html_class( $context );
	}

	return $attr;
}

/**
 * Sidebar attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_sidebar( $attr, $context ) {
	if ( ! empty( $context ) ) {

		$attr['class'] .= " sidebar-{$context}";
		$attr['id']     = "sidebar-{$context}";

		if ( $name = carelib_get_sidebar_name( $context ) ) {
			// Translators: The %s is the sidebar name. This is used for the 'aria-label' attribute.
			$attr['aria-label'] = esc_attr( sprintf( _x( '%s Sidebar', 'sidebar aria label', 'alpha' ), $name ) );
		}
	}

	return $attr;
}

/**
 * Button attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_button( $attr, $context ) {
	$attr['aria-expanded'] = 'false';
	$attr['aria-pressed']  = 'false';

	if ( ! empty( $context ) ) {
		$attr['id'] = "button-{$context}";
	}

	return $attr;
}

/**
 * Menu toggle attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_menu_toggle( $attr, $context ) {
	$attr = carelib_attr_button( $attr, $context );

	if ( ! empty( $context ) ) {
		$attr['id'] = "menu-toggle-{$context}";
	}

	return $attr;
}

/**
 * Nav menu attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_menu( $attr, $context ) {
	if ( ! empty( $context ) ) {
		$attr['id'] = "menu-{$context}";

		if ( ! $menu_name = carelib_get_menu_location_name( $context ) ) {
			// Translators: The %s is the menu name. This is used for the 'aria-label' attribute.
			$attr['aria-label'] = esc_attr( sprintf( _x( '%s Menu', 'nav menu aria label', 'alpha' ), $menu_name ) );
		}
	}

	return $attr;
}

/**
 * Attributes for nav elements which aren't necessarily site navigation menus.
 * One example use case for this would be pagination and page link blocks.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array
 */
function carelib_attr_nav( $attr, $context ) {
	if ( ! empty( $context ) ) {
		$attr['id'] = "nav-{$context}";
	}

	return $attr;
}

/**
 * Branding (usually a wrapper for title and tagline) attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_branding( $attr ) {
	$attr['id'] = 'site-branding';

	return $attr;
}

/**
 * Site title attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_title( $attr ) {
	$attr['id'] = 'site-title';

	return $attr;
}

/**
 * Site description attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_site_description( $attr ) {
	$attr['id'] = 'site-description';

	return $attr;
}

/**
 * Post <article> element attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_post( $attr ) {
	$attr['id']    = 'post-0';
	$attr['class'] = 'entry';

	$post = get_post();

	if ( $post instanceof WP_Post ) {
		$attr['id']    = 'post-' . get_the_ID();
		$attr['class'] = join( ' ', get_post_class() );
	}

	return $attr;
}

/**
 * Post time/published attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_entry_published( $attr ) {
	$attr['class']    = 'entry-published updated';
	$attr['datetime'] = get_the_time( 'Y-m-d\TH:i:sP' );

	// Translators: Post date/time "title" attribute.
	$attr['title'] = get_the_time( _x( 'l, F j, Y, g:i a', 'post time format', 'alpha' ) );

	return $attr;
}

/**
 * Post summary/excerpt attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_entry_summary( $attr ) {
	$attr['class'] = 'entry-content summary';

	return $attr;
}

/**
 * Comment wrapper attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_comment( $attr ) {
	$attr['id']    = 'comment-' . get_comment_ID();
	$attr['class'] = join( ' ', get_comment_class() );

	return $attr;
}

/**
 * Comment time/published attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_comment_published( $attr ) {
	// Translators: Comment date/time "title" attribute.
	$attr['title'] = get_comment_time( _x( 'l, F j, Y, g:i a', 'comment time format', 'alpha' ) );

	return $attr;
}

/**
 * Comment permalink attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr Existing attributes.
 * @return array
 */
function carelib_attr_comment_permalink( $attr ) {
	$attr['href'] = get_comment_link();

	return $attr;
}

/**
 * Filter attributes for the footer widgets widget area.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr Existing attributes.
 * @param  string $context A specific context (e.g., 'primary').
 * @return array $attr Amended attributes.
 */
function carelib_attr_footer_widgets( $attr, $context ) {
	if ( empty( $context ) ) {
		$attr['id'] = 'footer-widgets';
	}

	return $attr;
}
