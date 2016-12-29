<?php
/**
 * Template helper functions related to entries.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

/**
 * Output opening markup for the entry article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_open() {
	echo '<article ' . carelib_get_attr( 'post' ) . '>';
}

/**
 * Output markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_sticky_banner() {
	if ( ! is_singular() && is_sticky() ) {
		printf( '<div %s><p class="ribbon-content">%s<p></div>',
			carelib_get_attr( 'corner-ribbon', 'sticky' ),
			esc_html__( 'Featured', 'alpha' )
		);
	}
}

/**
 * Output the featured image for all post types except pages and attachments.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_featured_image() {
	if ( in_array( get_post_type(), array( 'page', 'attachment' ), true ) ) {
		return;
	}

	carelib_image( apply_filters( 'alpha_featured_image',
		array(
			'size'         => 'alpha-featured',
			'before'       => '<div class="featured-media image">',
			'after'        => '</div>',
			'link_to_post' => ! is_singular(),
		)
	) );
}

/**
 * Output a formatted entry title.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_entry_title
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_title( $args = array() ) {
	carelib_entry_title( $args );
}

/**
 * Determine if the current view should contain an entry header.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_has_entry_header
 * @return bool
 */
function alpha_has_entry_header() {
	return carelib_has_entry_header();
}

/**
 * Determine if the current view should contain entry header meta.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_has_entry_header_meta
 * @return bool
 */
function alpha_has_entry_header_meta() {
	return carelib_has_entry_header_meta();
}

/**
 * Output the opening markup for the entry header element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header_open() {
	echo '<header ' . carelib_get_attr( 'entry-header' ) . '>';
}

/**
 * Output the opening markup for the entry meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_open() {
	echo '<p ' . carelib_get_attr( 'entry-meta' ) . '>';
}

/**
 * Output formatted information about an entry's author.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_entry_author
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_author( $args = array() ) {
	carelib_entry_author( $args );
}

/**
 * Output a post's formatted published date.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_entry_published
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_published( $args = array() ) {
	carelib_entry_published( $args );
}

/**
 * Output a formatted link to the current entry comments.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_entry_comments_link
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_comments_link( $args = array() ) {
	carelib_entry_comments_link( $args );
}

/**
 * Output the closing markup for the entry meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_close() {
	echo '</p><!-- .entry-meta -->';
}

/**
 * Output the closing markup for the entry header element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header_close() {
	echo '</header><!-- .entry-header -->';
}

/**
 * Output the opening markup for the entry content element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_content_open() {
	$attr = is_singular() ? 'content' : 'summary';
	echo '<div ' . carelib_get_attr( "entry-{$attr}" ) . '>';
}

/**
 * Display either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_content
 * @return void
 */
function alpha_content() {
	carelib_content();
}

/**
 * Output singular entry pagination links.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_link_pages() {
	if ( is_singular() ) {
		wp_link_pages();
	}
}

/**
 * Output the closing markup for the entry content element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_content_close() {
	echo '</div><!-- .entry-content -->';
}

/**
 * Output the opening markup for the entry footer element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_open() {
	echo '<footer ' . carelib_get_attr( 'entry-footer' ) . '>';
}

/**
 * Output formatted data about the current entry's post tag taxonomy terms.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_tags() {
	carelib_entry_terms(
		array(
			'taxonomy' => 'post_tag',
			'before'   => '<p class="entry-meta tags">',
			'after'    => '</p>',
		)
	);
}

/**
 * Output formatted data about the current entry's category taxonomy terms.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_categories() {
	carelib_entry_terms(
		array(
			'taxonomy' => 'category',
			'before'   => '<p class="entry-meta categories">',
			'after'    => '</p>',
		)
	);
}

/**
 * Output the closing markup for the entry footer element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_close() {
	echo '</footer><!-- .entry-footer -->';
}

/**
 * Output closing markup for the entry article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_close() {
	echo '</article><!-- .entry -->';
}

/**
 * Output a next and previous post navigation element on single entries.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_post_navigation
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_post_navigation( $args = array() ) {
	carelib_post_navigation( $args );
}
