<?php
/**
 * Template helper functions used within archives.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2018, Cipher Development, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

/**
 * Determine if we're viewing a "plural" page.
 *
 * Note that this is similar to, but not quite the same as `!is_singular()`,
 * which wouldn't account for the 404 page.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function carelib_is_plural() {
	return apply_filters( 'carelib_is_plural', is_home() || is_archive() || is_search() );
}

/**
 * Determine if we're within a blog section archive.
 *
 * @since  1.0.0
 * @access public
 * @return bool true if we're on a blog archive page.
 */
function carelib_is_blog_archive() {
	return apply_filters( 'carelib_is_blog_archive', ( is_home() || is_archive() ) && ! ( is_post_type_archive() || is_tax() ) );
}

/**
 * Determine if we're viewing anything within the blog section.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_is_blog_archive
 * @return bool true if we're on a blog archive page or a singular post.
 */
function carelib_is_blog() {
	return carelib_is_blog_archive() || is_singular( 'post' );
}

/**
 * Determine whether or not to display an archive header.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function carelib_has_archive_header() {
	return (bool) apply_filters( 'carelib_has_archive_header', is_archive() || is_search() );
}

/**
 * Retrieve the general archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_archive_title() {
	return esc_html__( 'Archives', 'alpha' );
}

/**
 * Retrieve the author archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_author_title() {
	return get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
}

/**
 * Retrieve the year archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_year_title() {
	return get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'alpha' ) );
}

/**
 * Retrieve the week archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_week_title() {
	// Translators: 1 is the week number and 2 is the year.
	return sprintf(
		esc_html__( 'Week %1$s of %2$s', 'alpha' ),
		get_the_time( esc_html_x( 'W', 'weekly archives date format', 'alpha' ) ),
		get_the_time( esc_html_x( 'Y', 'yearly archives date format', 'alpha' ) )
	);
}

/**
 * Retrieve the day archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_day_title() {
	return get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'alpha' ) );
}

/**
 * Retrieve the hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_hour_title() {
	return get_the_time( esc_html_x( 'g a', 'hour archives time format', 'alpha' ) );
}

/**
 * Retrieve the minute archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_minute_title() {

	// Translators: Minute archive title. %s is the minute time format.
	return sprintf( esc_html__( 'Minute %s', 'alpha' ), get_the_time( esc_html_x( 'i', 'minute archives time format', 'alpha' ) ) );
}

/**
 * Retrieve the minute + hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_single_minute_hour_title() {
	return get_the_time( esc_html_x( 'g:i a', 'minute and hour archives time format', 'alpha' ) );
}

/**
 * Retrieve the search results title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_search_title() {

	// Translators: %s is the search query. The HTML entities are opening and closing curly quotes.
	return sprintf( esc_html__( 'Search results for &#8220;%s&#8221;', 'alpha' ), get_search_query() );
}

/**
 * Filters `get_the_archive_title` to add better archive titles than core.
 *
 * @since  1.0.0
 * @access public
 * @param  string $title
 * @return string
 */
function carelib_archive_title( $title ) {
	if ( is_home() && ! is_front_page() ) {
		$title = get_post_field( 'post_title', get_queried_object_id() );
	} elseif ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_author() ) {
		$title = carelib_get_single_author_title();
	} elseif ( is_search() ) {
		$title = carelib_get_search_title();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( get_query_var( 'minute' ) && get_query_var( 'hour' ) ) {
		$title = carelib_get_single_minute_hour_title();
	} elseif ( get_query_var( 'minute' ) ) {
		$title = carelib_get_single_minute_title();
	} elseif ( get_query_var( 'hour' ) ) {
		$title = carelib_get_single_hour_title();
	} elseif ( is_day() ) {
		$title = carelib_get_single_day_title();
	} elseif ( get_query_var( 'w' ) ) {
		$title = carelib_get_single_week_title();
	} elseif ( is_month() ) {
		$title = single_month_title( ' ', false );
	} elseif ( is_year() ) {
		$title = carelib_get_single_year_title();
	} elseif ( is_archive() ) {
		$title = carelib_get_single_archive_title();
	}

	return apply_filters( 'carelib_archive_title', $title );
}

/**
 * Filters `get_the_archive_description` to add better archive descriptions
 * than core.
 *
 * @since  1.0.0
 * @access public
 * @param  string $desc
 * @return string
 */
function carelib_archive_description( $desc ) {
	if ( is_home() && ! is_front_page() ) {
		$desc = get_post_field( 'post_content', get_queried_object_id(), 'raw' );
	} elseif ( is_category() ) {
		$desc = get_term_field( 'description', get_queried_object_id(), 'category', 'raw' );
	} elseif ( is_tag() ) {
		$desc = get_term_field( 'description', get_queried_object_id(), 'post_tag', 'raw' );
	} elseif ( is_tax() ) {
		$desc = get_term_field( 'description', get_queried_object_id(), get_query_var( 'taxonomy' ), 'raw' );
	} elseif ( is_author() ) {
		$desc = get_the_author_meta( 'description', get_query_var( 'author' ) );
	} elseif ( is_post_type_archive() ) {
		$desc = get_post_type_object( get_query_var( 'post_type' ) )->description;
	}

	return apply_filters( 'carelib_archive_description', $desc );
}

/**
 * Helper function to build a newer/older or paginated navigation element within
 * a loop of multiple entries. This takes care of all the annoying formatting
 * which usually would need to be done within a template.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args An optional list of options.
 * @return string
 */
function carelib_get_posts_navigation( $args = array() ) {
	global $wp_query;
	// Return early if we're on a singular post or we only have one page.
	if ( is_singular() || 1 === $wp_query->max_num_pages ) {
		return;
	}

	$defaults = apply_filters( 'carelib_posts_navigation_defaults',
		array(
			'nav_type'       => 'pagination',
			'prev_link_text' => __( 'Newer Posts', 'alpha' ),
			'next_link_text' => __( 'Older Posts', 'alpha' ),
			'prev_text'      => sprintf(
				'<span class="screen-reader-text">%s</span>' ,
				__( 'Previous Page', 'alpha' )
			),
			'next_text'      => sprintf(
				'<span class="screen-reader-text">%s</span>',
				__( 'Next Page', 'alpha' )
			),
		)
	);

	$args = wp_parse_args( $args, $defaults );

	if ( 'pagination' === $args['nav_type'] ) {
		$output = get_the_posts_pagination( $args );
	} else {
		$output  = '<nav ' . carelib_get_attr( 'nav', 'archive' ) . '>';
		$output .= sprintf(
			'<span class="nav-previous">%s</span>',
			get_previous_posts_link( $args['prev_link_text'] )
		);

		$output .= sprintf(
			'<span class="nav-next">%s</span>',
			get_next_posts_link( $args['next_link_text'] )
		);

		$output .= '</nav><!-- .nav-archive -->';
	}

	return apply_filters( 'carelib_posts_navigation', $output, $args );
}

/**
 * Helper function to build a newer/older or paginated navigation element within
 * a loop of multiple entries.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_posts_navigation
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_posts_navigation( $args = array() ) {
	echo carelib_get_posts_navigation( $args );
}

/**
 * Gets the "blog" (posts page) page URL. `home_url()` will not always work for
 * this because it returns the front page URL. Sometimes the blog page URL is
 * set to a different page. This function handles both scenarios.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_blog_url() {
	if ( 'posts' === get_option( 'show_on_front' ) ) {
		return home_url();
	}

	$blog_url = '';
	$page_for_posts = (int) get_option( 'page_for_posts' );

	if ( 0 !== $page_for_posts ) {
		$blog_url = get_permalink( $page_for_posts );
	}

	return esc_url( $blog_url );
}
