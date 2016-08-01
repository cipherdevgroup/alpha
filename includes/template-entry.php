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
	echo '<article ' . alpha_get_attr( 'post' ) . '>';
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
			alpha_get_attr( 'corner-ribbon', 'sticky' ),
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

	alpha_image( apply_filters( 'alpha_featured_image',
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
	echo carelib_get_entry_title( $args );
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
	echo '<header ' . alpha_get_attr( 'entry-header' ) . '>';
}

/**
 * Output the opening markup for the entry meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_open() {
	echo '<p ' . alpha_get_attr( 'entry-meta' ) . '>';
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
	echo carelib_get_entry_author( $args );
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
	echo carelib_get_entry_published( $args );
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
	echo carelib_get_entry_comments_link( $args );
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
	echo '<div ' . alpha_get_attr( "entry-{$attr}" ) . '>';
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
	echo carelib_get_content();
}

/**
 * Remove all actions from THA entry hooks.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_null_entry_containers()
 * @return void
 */
function alpha_null_entry_containers() {
	carelib_null_entry_containers();
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
 * Determine if the current view should contain an entry footer.
 *
 * @since  0.1.0
 * @access public
 * @return bool
 */
function alpha_has_entry_footer_meta() {
	return carelib_has_entry_footer_meta();
}

/**
 * Determine if the current view should contain an entry footer.
 *
 * @since  0.1.0
 * @access public
 * @return bool
 */
function alpha_has_entry_footer() {
	return carelib_has_entry_footer();
}

/**
 * Output the opening markup for the entry footer element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_open() {
	echo '<footer ' . alpha_get_attr( 'entry-footer' ) . '>';
}

/**
 * Display a formatted markup block with information about the entry's terms.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_get_entry_terms
 * @param  array $args a list of arguments to pass to the entry terms method.
 * @return void
 */
function alpha_entry_terms( $args = array() ) {
	echo carelib_get_entry_terms( $args );
}

/**
 * Output formatted data about the current entry's post tag taxonomy terms.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_tags() {
	alpha_entry_terms(
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
	alpha_entry_terms(
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
	echo carelib_get_post_navigation( $args );
}

/**
 * A custom comment callback to use with WordPress' `comments_template` function.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_comments_callback
 * @param  object  $comment the comment object.
 * @param  array   $args list of arguments passed from wp_list_comments().
 * @param  integer $depth What level the particular comment is.
 * @return void
 */
function alpha_comments_callback( $comment, $args, $depth ) {
	carelib_comments_callback( $comment, $args, $depth );
}

/**
 * Output the comments template.
 *
 * @since  0.1.0
 * @access public
 * @uses   carelib_comments_load_template
 * @return void
 */
function alpha_comments() {
	carelib_comments_load_template();
}
